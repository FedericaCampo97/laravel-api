<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Type;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
// use SebastianBergmann\CodeCoverage\Report\Xml\Project as XmlProject;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderByDesc('id')->with('type')->with('technologies')->paginate(12);
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::get();
        $technologies = Technology::get();
        return view('admin.project.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($request->title, '-');

        if ($request->has('cover_image')) {
            $path = Storage::put('project_images', $request->cover_image);
            $val_data['cover_image'] = $path;
        }

        $post = Project::create($val_data);
        if (!empty($request->technologies)) {
            foreach ($request->technologies as $t) {
                $post->technologies()->attach($t);
            }
        }
        return to_route('admin.projects.index')->with('message', 'Project Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::get();
        $technologies = Technology::get();
        return view('admin.project.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();
        if ($request->has('cover_image')) {
            $path = Storage::put('project_images', $request->cover_image);
            $val_data['cover_image'] = $path;
        }
        foreach ($project->technologies as $t) {
            $project->technologies()->detach($t);
        }
        foreach ($request->technologies as $t) {
            $project->technologies()->attach($t);
        }

        $project->update($val_data);
        return to_route('admin.projects.index')->with('message', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->cover_image) {
            Storage::delete($project->cover_image);
        }
        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Project deleted!');
    }
}
