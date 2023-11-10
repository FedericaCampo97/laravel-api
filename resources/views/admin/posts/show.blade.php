@extends('layouts.admin')

@section('content')

<div class="card mt-5 mb-3">
    @if ($post->cover_image)
    <div style="height:300px" class="text-center my-3">
        <img src="{{asset('storage/' . $post->cover_image)}}" alt="" class="h-100">
    </div>
    @else
    <div class="text-center mt-3">
        NO IMAGE
    </div>


    @endif

    <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{$post->content}}</p>
    </div>
</div>


@endsection