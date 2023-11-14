<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Type;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderByDesc('id')->with('type')->with('technologies')->paginate(12);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::get();
        $technologies = Technology::get();
        return view('admin.posts.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($request->title, '-');

        if ($request->has('cover_image')) {
            $path = Storage::put('posts_images', $request->cover_image);
            $val_data['cover_image'] = $path;
        }

        $post = Post::create($val_data);
        if (!empty($request->technologies)) {
            foreach ($request->technologies as $t) {
                $post->technologies()->attach($t);
            }
        }
        return to_route('admin.posts.index')->with('message', 'Post Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $types = Type::get();
        $technologies = Technology::get();
        return view('admin.posts.edit', compact('post', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $val_data = $request->validated();
        if ($request->has('cover_image')) {
            $path = Storage::put('posts_images', $request->cover_image);
            $val_data['cover_image'] = $path;
        }
        foreach ($post->technologies as $t) {
            $post->technologies()->detach($t);
        }
        foreach ($request->technologies as $t) {
            $post->technologies()->attach($t);
        }

        $post->update($val_data);

        return to_route('admin.posts.index')->with('message', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->cover_image) {
            Storage::delete($post->cover_image);
        }
        $post->delete();
        return to_route('admin.posts.index')->with('message', 'Post deleted!');
    }
}
