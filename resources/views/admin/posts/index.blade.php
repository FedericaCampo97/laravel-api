@extends('layouts.admin')

@section('content')

@if (session('message'))
<div class="alert alert-success alert-dismissible fade show mt-3 mb-0" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>Message:</strong> {{session('message')}}
</div>
@endif

<h1 class="my-5">My Project</h1>

<a href="/admin/posts/create"><button class="btn btn-primary mb-3"> Create new post </button></a>

<div class="table-responsive">
    <table class="table table-striped
    table-hover	
    table-borderless
    table-dark
    align-middle">
        <thead class="table-light">
            <caption>Posts</caption>
            <tr>
                <th>ID</th>
                <th>COVER IMAGE</th>
                <th>TITLE</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">

            @forelse($posts as $post)
            <tr class="table-primary">
                <td scope="row">{{$post->id}}</td>
                <td>
                    @if($post->cover_image)
                    <img width="100" src="{{asset('storage/' . $post->cover_image)}}" alt=" {{$post->title}} image">
                    @else
                    No image
                    @endif
                </td>
                <td>{{$post->title}}</td>
                <td>View/edit/delite</td>
            </tr>
            @empty
            <tr class="table-primary">
                <td scope="row">No posts here! </td>
            </tr>
            @endforelse

            {{$posts->links('pagination::bootstrap-5')}}
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>

@endsection