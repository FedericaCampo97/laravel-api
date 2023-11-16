@extends('layouts.admin')

@section('content')

<body class="bg-img">
    <div class="container">
        <h2 class="text-secondary my-5 text-center text-white">
            {{ __('Welcome') }} {{Auth::user()->name}}!
        </h2>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3>Projects</h3>
                        <strong class="fs-3">{{$total_project}}</strong>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3>User</h3>
                        <strong class="fs-3">{{$total_users}}</strong>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3>Technologies</h3>
                        <strong class="fs-3">{{$total_technologies}}</strong>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

@endsection