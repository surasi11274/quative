@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{asset('css/_Responsive.css')}}">
@endsection
@section('content')
<link href="{{ asset('css/_vote-detail.css') }}" rel="stylesheet">

    {{-- <div class="bd-example shadow-ex">
        <div id="carouselExampleCaptions3" class="carousel slide" data-ride="pause">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://sv1.picz.in.th/images/2019/12/17/i2azOP.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption1 d-none d-md-block">
                        <a href="#" class="site-link"></a>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 text-left p-5">
                                    <div class="site-header">
                                        <h1 class=" d-flex float-left mt-5">ผลงานที่ได้รับการโหวตมากที่สุด</h1>
                                    </div>
                                    <div class="site-below">
                                        <h1 class="mt-1">ผลงานที่ได้รับการโหวตมากที่สุด</h1>
                                        <h3 class="mt-1">Package colorlista</h3>
                                        <span class="mt-1">Design by&nbsp;<label> กิตติพร บุญดี</label></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://sv1.picz.in.th/images/2019/12/17/i2azOP.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption1 d-none d-md-block">
                        <a href="#" class="site-link"></a>
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
                        <a href="#" class="site-link"></a>
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
    </div> --}}

    <div class="container mt-5 ">
        <div class="shadow-sm  bg-white ">
            <div class="container content-profile" >
                <div class="row">
                    <div class=" col-12 col-md-2 m-auto">
                        <div class="">
                            @php
                            $designerid = \App\Designer::find($jobs->designer_id);
    
    
    
                        @endphp
                            
                            <figure class="img-fluid float-right m-auto">
                                <img class="rounded-circle" src="/{{$designerid->profilepic}}" style="width:70px; height:70px;">
                            </figure>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 p-md-5 text-md-left text-xm-center ">
                        {{-- <h3 class="_hilight ">Package  Coralist</h3> --}}
                      
                        <a href="">
                            <h3 >ออกแบบโดย&nbsp;<label> {{$designerid->name}}</label></h3>
                        </a>
                        <p class="_gray">ออกแบบบรรจุภัณฑ์ประเภท ขวด</p>
                    </div>
                    <div class="col-12 col-md-3 p-5">
                        <div class="float-right">
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
                                <button onclick="document.getElementById('vote-form-{{$jobs->id}}').submit();" class="love text-center rounded float-right border {{ !Auth::user()->favorite_jobs->where('pivot.jobs_id',$jobs->id)->count() == 0 ?'favorite_jobs' : ''}}">
                                    <i class="fas fa-heart"></i>
                                    {{-- {{$job->favorite_to_users->count()}}   --}}
                                </button>
                            </a>
                                 <form id="vote-form-{{$jobs->id}}" method="POST" action="{{route('job.vote',$jobs->id)}}"
                                    style="display:none;">
                                @csrf
                                </form>

                            @endguest                        </div>
                    </div>



                    <div class="container-fluid" style="    padding-right: 0px !important;
                    padding-left: 0px !important;     margin-top: -60px;">
                
                        <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner  mt-5">
                                <div class="carousel-item active">

                                @foreach ($jobfile as $jobf)
                                @php
                                $filename = \App\Jobfiles::find($jobf)->fileimgname;
    
                                @endphp
                               
                                <img src="/{{$filename}}" class="d-block w-100" height="100px" alt="...">
                               
                            @endforeach
                            <div class="carousel-caption d-none d-md-block">
                                {{-- <h5>First slide label</h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> --}}
                            </div>
                        </div>
                                <div class="carousel-item">
                                    <img src="https://sv1.picz.in.th/images/2019/12/17/i2azOP.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        {{-- <h5>Second slide label</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="https://sv1.picz.in.th/images/2019/12/17/i2azOP.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        {{-- <h5>Third slide label</h5>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> --}}
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev sr-only" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next sr-only" href="#carouselExampleCaptions" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-12  carousel-indicators-p-lg">
                        <p class="text-justify p-md-5 p-3">
                            {{$jobs->requirement}}
                        </p>
                    <hr>
                    <div class="row p-5 ">
                        <div class="col-12 col-md-7">
                        <h5 class="font-weight-bold">ความคิดเห็น ({{$jobs->comments()->count()}})</h5>
                                @guest
                                    <p>For a new comment.You need to login first.
                                    <a href="{{route('login')}}">Login </a>
                                    </p>
                                @else 
                                <form action="{{ route('comment.store',$jobs->id)}}" method="POST">
                                    @csrf
                                <div class=" container-fluid" >
                                <div class="row mt-4">
                                    <div class="col-3">
                                        <figure class="img-fluid  mr-3 ml-3">
                                            <img class="rounded-circle" src="https://picsum.photos/70">
                                        </figure>
                                    </div>
                                    <div class="col-9">
                                        <textarea name="comment" rows="5" class="form-control" id="validationTextarea" placeholder="แสดงความคิดเห็น" required></textarea>
        
                                    </div>
                                </div>
                                        <button class="mt-3 btn _primary-black float-right btn-lg" style="    display: block;
                                        width: 30%;
                                    " type="submit" >โพสต์</button>
                                </div>
                            </form>
                            @endguest
                        </div>    
                    <div class="col-12 col-md-5 mt-5">
                            <div class="form-tags ">
                               <ul class=" d-flex">
                            <i class="fas fa-tag icons m-1"></i>
                            @foreach ($jobtag as $jobt)
                            @php
                            $tagname = \App\Tags::find($jobt)->tagName;

                            @endphp
                            <p>

                                
                                <li class="m-1">
                                    <div class="box-tags ">
                                       <small>{{$tagname}}</small>
                                    </div>
                                 </li>
                            </p>
                        @endforeach
                                 

                               </ul>
                            </div>
                            <div class="d-flex">
                                <i class="fas fa-heart m-1"></i>
                                <span class="m-1">{{$jobs->favorite_to_users->count()}}</span>
                                <p class="m-1">Likes</p>
                            </div>
                            <div class="d-flex">
                                <i class="far fa-eye m-1"></i>
                            <span class="m-1">{{$jobs->view_count}}</span>
                                <p class="m-1">Views</p>
                                
                            </div>
                            <div class="d-flex">
                                <i class="fas fa-calendar-week m-1"></i>
                                <p class="m-1">{{date('F d,Y',strtotime($jobs->created_at))}}</p>
                            </div>
                            <hr>
                            
                            
                         </div> 
                         <div class="col-12 col-md-7 ">
                            {{-- <div class="comment-flow mt-5"> --}}
                                <div class="mt-5">
                               
                                @if ($jobs->comments->count() > 0)
                                @foreach ($jobs->comments->sortByDesc('id') as $comment)

                                <div class="row d-flex">
                                    <div class="col-2">
                                        <figure class=" img-fluid">
                                            <img class="rounded-circle" src="https://picsum.photos/60">
                                        </figure>
                                    </div>
                                    <div class="col-7">
                                        <label for="name">{{$comment->user->name}}</label> <br>
                                        <p>{{$comment->comment}}</p>
                                    </div>
                                    <div class="col-3 ">
                                        <small>{{$comment->created_at->diffForHumans()}}</small>
                                    </div>
                                </div>
                                <hr>
                                @endforeach

                                @else
                                <p>No Comment yet. Be the first.</p>

                                @endif
                                    

                                
                            </div>
                        </div> 
                        
    
            
                </div>
                <div class="container" style="padding: 0rem 3rem 3rem!important;">
                    <h5 class="font-weight-bold">ผลงานอื่นๆของ การดา ราทอง</h5>
                        <div class="row">
                            <div class="col-12 col-md-4 ">
                                <div class="caption-inner mt-3 mb-3">
                                    <img src="https://picsum.photos/320/200" alt="Avatar" class="rounded w-100 shadow">
                                    {{-- <div class="overlay  rounded p-3">
                                        <h1>Paper Bag</h1>
                                        <small>Design by Kritpon Klinkomut</small>
                                    </div> --}}
                                </div>
                             </div>
                             <div class="col-12 col-md-4">
                                <div class="caption-inner mt-3 mb-3">
                                    <img src="https://picsum.photos/320/200" alt="Avatar" class="rounded w-100 shadow">
                                    {{-- <div class="overlay  rounded p-3">
                                        <h1>Paper Bag</h1>
                                        <small>Design by Kritpon Klinkomut</small>
                                    </div> --}}
                                </div>
                             </div>
                             <div class="col-12 col-md-4">
                                <div class="caption-inner mt-3 mb-3">
                                    <img src="https://picsum.photos/320/200" alt="Avatar" class="rounded w-100 shadow">
                                    {{-- <div class="overlay  rounded p-3">
                                        <h1>Paper Bag</h1>
                                        <small>Design by Kritpon Klinkomut</small>
                                    </div> --}}
                                </div>
                             </div>
                       
                        </div>
                </div>
                    </div>
               
                   
                    {{-- end container-fluid --}}
                </div>
            </div>
        </div>






    </div>
    {{-- <div class="container mt-5 ">
        <div class="row">
            
            <div class="col-12 col-md-5">
                <div class="card  p-5 shadow-ex overflow-y">
                    <label class="text-right" for="">ผลงานของ Kritpon Klinkomut </label>
                    <hr>
                    <div class="caption-inner mt-3 mb-3">
                        <img src="https://picsum.photos/320" alt="Avatar" class="rounded w-100 shadow">
                        <div class="overlay  rounded p-3">
                            <h1>Paper Bag</h1>
                            <small>Design by Kritpon Klinkomut</small>
                        </div>
                    </div>
                    <div class="caption-inner mt-3 mb-3">
                        <img src="https://picsum.photos/320" alt="Avatar" class="rounded w-100 shadow">
                        <div class="overlay  rounded p-3">
                            <h1>Gift Box</h1>
                            <small>Design by Kritpon Klinkomut</small>
                        </div>
                    </div>
                    <div class="caption-inner mt-3 mb-3">
                        <img src="https://picsum.photos/320" alt="Avatar" class="rounded w-100 shadow">
                        <div class="overlay  rounded p-3">
                            <h1>Gift Box</h1>
                            <small>Design by Kritpon Klinkomut</small>
                        </div>
                    </div>
                    <div class="caption-inner mt-3 mb-3">
                        <img src="https://picsum.photos/320" alt="Avatar" class="rounded w-100 shadow">
                        <div class="overlay  rounded p-3">
                            <h1>Gift Box</h1>
                            <small>Design by Kritpon Klinkomut</small>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div> --}}
    @endsection