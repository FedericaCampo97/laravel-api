@extends('layouts.admin')

@section('content')

<body class="bg-white">
    <div class="container">
        <h2 class="text-secondary my-5 text-center ">
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
        <div class="text-end">
            <img style="width: 70%; margin-top: 43px" src="https://img.freepik.com/fotos-premium/retrato-de-leopardo-em-pe-no-branco-isolado_191971-12376.jpg" alt="">
        </div>
    </div>

</body>

@endsection