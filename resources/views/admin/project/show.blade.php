@extends('layouts.admin')

@section('content')

<div class="card mt-5 mb-3">
    @if ($project->cover_image)
    <div style="height:300px" class="text-center my-3">
        <img src="{{asset('storage/' . $project->cover_image)}}" alt="" class="h-100">
    </div>
    @else
    <div class="text-center mt-3">
        NO IMAGE
    </div>


    @endif

    <div class="card-body">
        <h5 class="card-title">{{$project->title}}</h5>
        <p class="card-text">{{$project->content}}</p>
    </div>
</div>


@endsection