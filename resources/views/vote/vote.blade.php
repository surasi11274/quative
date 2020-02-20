@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="css/_vote-detail.css">
@endsection
<body style="font-family: prompt;">
    
</body>
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />


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
            @if($jobs->count())

            @foreach ($jobs as $job)
            {{-- @foreach ($jobfiles as $jobfile) --}}

            @php
                $designerid = \App\Designer::find($job->designer_id);

                // $jobfiles = json_decode($job->file);
                $jobdilee = DB::table('jobfiles')->where('job_id',$job->id)->first();


             @endphp
                <div class="col-4 mt-5">

                        <div class="card" data-id="{{ $job->id }}">
                            {{-- @foreach($job->file as $files)
                            @php

                            $fileimg = \App\Jobfiles::find($files)->fileimgname;
                            @endphp

                            @endforeach --}}
                            {{-- @if ($job->id == $jobfiles->job_id) --}}

                            <img class="card-img-top" src="{{$jobdilee->fileimgname}}"  alt="..." style="height: 267px;">

                            {{-- @endif --}}
                                <div class="card-body border">
                                        <div class="text-left position-absolute">
                                            <h4 class="_hilight" hidden >Package</h4>
                                        {{-- <p class="card-text">Design by {{$designerid->name}} {{$designerid->surname}}</p> --}}
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
                                    {{-- <a hidden href="#" class="like btn btn-sm btn-warning text-decoration-none"> --}}
                                        {{-- {{ Auth::user()->likes()->where('job_id', $job->id)->first() ? Auth::user()->likes()->where('job_id', $job->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}  --}}
                                        {{-- <button class="love text-center rounded float-right" type="button" name="button">
                                            </i><i class="far fa-heart"></i>
                                        </button> --}}
                                        
                                    {{-- </a> --}}
                                    {{-- <a href="#" class="like btn text-center rounded float-right border" > --}}
                                        {{-- <button class="love text-center rounded float-right" type="button" name="button"> --}}
                                        {{-- {!! Auth::user()->likes()->where('job_id', $job->id)->first() ? Auth::user()->likes()->where('job_id', $job->id)->first()->like == 0 ? "<div class='heartclose'><i class='fas fa-heart'></i></div>" : "<div class='heartopen'><i class='far fa-heart'></i></div>" : "<div class='heartopen'><i class='far fa-heart'></i></div>" !!} --}}

                                            {{-- </i><i class="far fa-heart"></i> --}}
                                        {{-- </button> --}}
                                    {{-- </a> --}}
                                    <span class="btn btn-dark">
                                        <i id="like{{$job->id}}" class="far fa-heart {{ auth()->user()->hasLiked($job) ? 'like-post' : '' }}"></i> 
                                        <div id="like{{$job->id}}-bs3">{{ $job->likers()->get()->count() }}</div>
                                    </span>
                                    {{-- <button class="love text-center rounded float-right" type="button" name="button">
                                        <i class="fas fa-heart">
                                    </button> --}}
                                    @endif
                                {{-- <a href="{{ route('galleryDetail', $job->id) }}" class="stretched-link"></a> --}}

                                </div>

                        </div>


                </div>
                {{-- @endforeach --}}

            @endforeach
            @endif


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
    
    {{-- <script src="{{asset('js/like.js')}}"></script>
    <script type="text/javascript">
        var token = '{{ Session::token() }}';
        var urlLike = '{{ route('like') }}';

    </script> --}}

<script type="text/javascript">
    $(document).ready(function() {     

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('i.far fa-heart, i.fas fa-heart').click(function(){    
            var id = $(this).parents(".card").data('id');
            var c = $('#'+this.id+'-bs3').html();
            var cObjId = this.id;
            var cObj = $(this);

            $.ajax({
               type:'POST',
               url:'/ajaxRequest',
               data:{id:id},
               success:function(data){
                  if(jQuery.isEmptyObject(data.success.attached)){
                    $('#'+cObjId+'-bs3').html(parseInt(c)-1);
                    $(cObj).removeClass("like-post");
                  }else{
                    $('#'+cObjId+'-bs3').html(parseInt(c)+1);
                    $(cObj).addClass("like-post");
                  }
               }
            });

        });      

        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });                                        
    }); 
</script>
    @endsection
