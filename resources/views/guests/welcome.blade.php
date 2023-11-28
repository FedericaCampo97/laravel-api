@extends('layouts.app')
@section('content')

<div class="block_home text-white text-center p-5">
    <h1>CODE AND CREATIVITY</h1>
    <h4>My gallery of creations</h4>
    <div class="container block_home_card">
        <div class="row">
            <div class="col-4">
                <div class="card demo" style="width: 20rem;">
                    <img src="https://cdn.sanity.io/images/tlr8oxjg/production/d2f16531bde974464ad7ab74dc335790dbdebffa-1192x668.png?w=3840&q=80&fit=clip&auto=format" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="text-white">PROJECTS</h5>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card demo" style="width: 18rem;">
                    <img src="https://flatironschool.com/legacy-assets/images.ctfassets.net/hkpf2qd2vxgx/5d3mga1jmH2nPsZABvsorW/4120bd9ec0b76e02503ba639a17978b4/front_end_back_end_blog-01-1024x640.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="text-white">NEW SKILLS ACQUIRED</h5>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card demo" style="width: 18rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQORf338OiwZwQVWm2RYtGghUAYy-EukLAmDEj4SjRdyrb-aCoRphtDXL_gffqgVlYkmmM&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="text-white">A WORLD TO EXPLORE</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection