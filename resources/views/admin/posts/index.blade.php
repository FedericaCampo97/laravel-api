@extends('layouts.admin')

@section('content')
<h1 class="my-5">All Posts here</h1>

<div class="table-responsive">
    <table class="table table-striped
    table-hover	
    table-borderless
    table-secondary
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