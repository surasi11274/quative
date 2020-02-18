@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="css/_vote-detail.css">
@endsection
<body style="font-family: prompt;">
    
</body>
@section('content')


    <div class="bd-example shadow-ex">
        <div id="carouselExampleCaptions3" class="carousel slide" data-ride="pause">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions3" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions3" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions3" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://sv1.picz.in.th/images/2019/12/17/i2azOP.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption1 d-none d-md-block">
                        <a href="/votedetail" class="site-link"></a>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 text-left p-5">
                                    <div class="site-header">
                                        {{-- <h1 class=" d-flex float-left mt-5">ผลงานที่ได้รับการโหวตมากที่สุด</h1> --}}
                                    </div>
                                    <div class="site-below">
                                        <h1 class=" d-flex float-left mt-5" style="color:black;">ผลงานที่ได้รับการโหวตมากที่สุด</h1>
                                        <h3 class="mt-5">Package colorlista</h3>
                                        <span class="mt-5">Design by&nbsp;<label> กิตติพร บุญดี</label></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://sv1.picz.in.th/images/2019/12/17/i2azOP.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption1 d-none d-md-block">
                        <a href="/votedetail" class="site-link"></a>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 text-left p-5">
                                    <div class="site-header">
                                        <h1 class=" d-flex float-left mt-5">ผลงานที่ได้รับการโหวตมากที่สุด</h1>
                                    </div>
                                    <div class="site-below">
                                        <h3 class="mt-5">Package colorlista</h3>
                                        <span class="mt-5">Design by&nbsp;<label> กิตติพร บุญดี</label></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://sv1.picz.in.th/images/2019/12/17/i2azOP.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption1 d-none d-md-block">
                        <a href="/votedetail" class="site-link"></a>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 text-left p-5">
                                    <div class="site-header">
                                        <h1 class=" d-flex float-left mt-5">ผลงานที่ได้รับการโหวตมากที่สุด</h1>
                                    </div>
                                    <div class="site-below">
                                        <h3 class="mt-5">Package colorlista</h3>
                                        <span class="mt-5">Design by&nbsp;<label> กิตติพร บุญดี</label></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">


        <h1 class="mt-5">ผลงานนักออกแบบ<span class="_hilight">ทั้งหมด</span></h1>
        <div class="row">
            @foreach ($jobs as $job)
            @php
                $designerid = \App\Designer::find($job->designer_id);
             @endphp
                <div class="col-3 mt-5">

                        <div class="card" data-jobid="{{ $job->id }}">

                            <img src="https://image.freepik.com/free-photo/zero-waste-concept-with-paper-cups_1220-4494.jpg" class="card-img-top" alt="..." style="height: 50%;">
                            <a href="#" class="text-decoration-none">

                                <div class="card-body">
                                        <div class="text-left position-absolute">
                                            <h4 class="_hilight" hidden >Package</h4>
                                        <p class="card-text">Design by {{$designerid->name}} {{$designerid->surname}}</p>
                                            {{-- <p>{{$job->id}}</p> --}}
                                        </div>
                                    @php
                                    $isuser = Auth::user(); 
                                    @endphp    
                                    @if(!$isuser)
                                    <a href="/login" >
                                        <button class="love text-center rounded float-right" type="button" name="button">
                                            </i><i class="far fa-heart"></i>
                                        </button>
                                    </a>
                                    {{-- <a href="/login" class="like btn btn-xs btn-danger text-decoration-none" > --}}
                                        {{-- {{ ::user()->likes()->where('job_id', $job->id)->first() ? Auth::user()->likes()->where('job_id', $job->id)->first()->like == 0 ? 'You dont like this post' : 'Dislike' : 'Dislike'  }} --}}
                                        {{-- <button class="love text-center rounded float-right" type="button" name="button">
                                            </i><i class="far fa-heart"></i>
                                        </button> --}}
                                    {{-- </a> --}}
                                    {{-- <button class="love text-center rounded float-right" type="button" name="button">
                                        <i class="fas fa-heart">
                                    </button> --}}
                                    @else
                                    <a hidden href="#" class="like btn btn-sm btn-warning text-decoration-none">
                                        {{ Auth::user()->likes()->where('job_id', $job->id)->first() ? Auth::user()->likes()->where('job_id', $job->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }} 
                                        {{-- <button class="love text-center rounded float-right" type="button" name="button">
                                            </i><i class="far fa-heart"></i>
                                        </button> --}}
                                        
                                    </a>
                                    <a href="#" class="like btn text-center rounded float-right border" >
                                        {{-- <button class="love text-center rounded float-right" type="button" name="button"> --}}
                                        {{ Auth::user()->likes()->where('job_id', $job->id)->first() ? Auth::user()->likes()->where('job_id', $job->id)->first()->like == 0 ? 'Unlike' : 'Like' : 'Like'  }}

                                            {{-- </i><i class="far fa-heart"></i> --}}
                                        {{-- </button> --}}
                                    </a>
                                    {{-- <button class="love text-center rounded float-right" type="button" name="button">
                                        <i class="fas fa-heart">
                                    </button> --}}
                                    @endif
                                </div>
                            </a>

                        </div>

                </div>
            @endforeach


            {{-- <div class="col mt-5">

                <div class="card" >
                    <img src="https://image.freepik.com/free-photo/zero-waste-concept-with-paper-cups_1220-4494.jpg" class="card-img-top" alt="..." style="height: 50%;">
                    <div class="card-body">
                        <div class="text-left position-absolute">
                            <h4 class="_hilight">Package</h4>
                            <p class="card-text">Design by Surasi  Chorjong</p>
                        </div>
                        <button class="love text-center rounded float-right" type="button" name="button"><i class="fas fa-heart"></i></button>

                    </div>
                </div>

            </div>

            <div class="col mt-5">

                <div class="card" >
                    <img src="https://image.freepik.com/free-photo/zero-waste-concept-with-paper-cups_1220-4494.jpg" class="card-img-top" alt="..." style="height: 50%;">
                    <div class="card-body">
                               <div class="text-left position-absolute">
                                   <h4 class="_hilight">Package</h4>
                                   <p class="card-text">Design by Surasi  Chorjong</p>
                               </div>
                        <button class="love text-center rounded float-right" type="button" name="button"><i class="fas fa-heart"></i></button>

                    </div>
                </div>

            </div>

            <div class="col mt-5">

                <div class="card" >
                    <img src="https://image.freepik.com/free-photo/zero-waste-concept-with-paper-cups_1220-4494.jpg" class="card-img-top" alt="..." style="height: 50%;">
                    <div class="card-body">
                               <div class="text-left position-absolute">
                                   <h4 class="_hilight">Package</h4>
                                   <p class="card-text">Design by Surasi  Chorjong</p>
                               </div>
                        <button class="love text-center rounded float-right" type="button" name="button"><i class="fas fa-heart"></i></button>

                    </div>
                </div>

            </div> --}}

        </div> <!-- END ROw -->


        <center >
            <a href="previewmock.html"><button type="button" class="btn btn-lg mt-5 text-center bg-dark" style="color: #fff; width: 500px;">ดูเพิ่มเติม</button></a>
        </center>


        <div class="a" style="padding-bottom: 100px;">

        </div>




    </div>    
    
    <script src="{{asset('js/like.js')}}"></script>
    <script type="text/javascript">
        var token = '{{ Session::token() }}';
        var urlLike = '{{ route('like') }}';

    </script>

    @endsection
