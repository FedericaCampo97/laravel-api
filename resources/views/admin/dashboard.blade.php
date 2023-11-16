@extends('layouts.admin')

@section('content')

<body class="bg-img">
    <div class="container">
        <h1 class="text-secondary mt-5 title_welcome text-center text-white">
            {{ __('Welcome') }} {{Auth::user()->name}}!
        </h1>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
        </div>
        @endif
        <div class="row justify-content-center block_card">
            <div class="col">
                <div class="card demo rounded-4">
                    <div class="card-body text-center">
                        <h3>Projects</h3>
                        <strong class="fs-3">{{$total_project}}</strong>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card demo rounded-4">
                    <div class="card-body text-center">
                        <h3>User</h3>
                        <strong class="fs-3">{{$total_users}}</strong>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card demo rounded-4">
                    <div class="card-body text-center">
                        <h3>Technologies</h3>
                        <strong class="fs-3">{{$total_technologies}}</strong>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

@endsection