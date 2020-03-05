@extends('layouts.app')

{{-- @section('assets')
    <link rel="stylesheet" href="css/_vote-detail.css">
@endsection --}}
<body style="font-family: prompt;">

</body>

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}" />


<link href="{{ asset('css/_vote-detail.css') }}" rel="stylesheet">
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
    <h2 class="font-weight-bold mt-5">ผลงานนักออกแบบทั้งหมด</h2>
    <div class="row">

                    @if($jobs->count())
                        @foreach($jobs as $job)

                            @php
                                $designerid = \App\Designer::find($job->designer_id);

                                $jobfilee = DB::table('jobfiles')->where('job_id',$job->id)->first();


                            @endphp

                            <article class="col-4 mt-5">
                                <div class="card shadow-sm" data-id="{{ $job->id }}">
                                    
                                <a href="{{ route('galleryDetail', $job->id) }}">
                                    <img class="card-img-top" src="{{$jobfilee->fileimgname}}"  alt="..." style="height: 267px;">
                                </a>
 
                                    <div class="card-body">
                                        <div class="text-left position-absolute">
                                            <div class="row pl-3">
                                                <p class="font-weight-bold">ออกแบบโดย
                                                    {{$designerid->name}}
                                                </p>
                                            </div>

                                        {{-- @foreach($job->tags as $tagn)


                                            <p>
                                                {{$tagname}},
                                            </p>

                                        @endforeach --}}
                                        <div class="row pl-3">
                                    @foreach ($jobtag as $jobt)
                                        @php
                                        $tagname = \App\Tags::find($jobt)->tagName;

                                        @endphp
                                        <p>

                                            {{$tagname}},
                                        </p>
                                    @endforeach
                                     </div>
                                     <div class="row pl-3 color-grey">
                                            <span>                                                    
                                                <i class="fas fa-heart"></i> 
                                                {{$job->favorite_to_users->count()}}  
                                            </span>
                                            <span class="pl-3">
                                                <i class="far fa-eye"></i>
                                                {{$job->view_count}}
                                            </span>





                                    </div>



                                        </div>
                                        <h4><a href="#" title="Nature Portfolio">{{ $job->title }}</a></h4>
                                        <span class="pull-right">

                                                @guest

                                                <a href="javascript:void(0);" >
                                                <button onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                                    closeButton:true,
                                                    progressBar: true,
                                                })" class="love btn btn-light text-center rounded float-right border">
                                                    <i class="fas fa-heart"></i>
                                                    {{-- {{$job->favorite_to_users->count()}}                                 --}}
                                                </button>
                                                </a>

                                                @else
                                                <a href="javascript:void(0);" >
                                                    <button onclick="document.getElementById('vote-form-{{$job->id}}').submit();" class="love text-center rounded float-right border {{ !Auth::user()->favorite_jobs->where('pivot.jobs_id',$job->id)->count() == 0 ?'favorite_jobs' : ''}}">
                                                        <i class="fas fa-heart"></i>
                                                        {{-- {{$job->favorite_to_users->count()}}   --}}
                                                    </button>
                                                </a>
                                                     <form id="vote-form-{{$job->id}}" method="POST" action="{{route('job.vote',$job->id)}}"
                                                        style="display:none;">
                                                    @csrf
                                                    </form>

                                                @endguest
                                                {{-- <i id="like{{$job->id}}" class="far fa-heart{{ auth()->user()->isFavorited($job) ? 'like-post' : '' }}"></i>
                                                <div id="like{{$job->id}}-bs3">{{ $job->favoritesCount }}</div> --}}
                                        </span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @endif

</div>


{{-- <script type="text/javascript">
    $(document).ready(function() {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('i.fa-heart, i.fa-heart').click(function(){
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



    });
</script> --}}
@endsection
