@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{asset('css/_Responsive.css')}}">
@endsection
@section('content')
<link href="{{ asset('css/_vote-detail.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <div class="container mt-5 ">
        <a class="btn _secondary-btn btn-lg btn-block col-md-3 mt-3 mb-3 d-none d-md-block" href="/gallery"> <i class="fas fa-angle-left pr-4"></i>กลับไปหน้ารวมผลงาน</a>
        <div class="shadow-sm  bg-white ">
            <div class="container content-profile ">
                <div class="row">
                    <div class=" col-4 col-md-2 m-auto">
                        <div class="">
                            @php
                            $designerid = \App\Designer::find($jobs->designer_id);
    
    
    
                        @endphp
                            
                           
                            <figure class="img-fluid float-right m-auto">
                                <img class="rounded-circle img-fluid" src="/{{$designerid->profilepic}}" style="width:100px; height:100px;  object-fit: cover;">
                            </figure>
                        </div>
                    </div>
                    <div class="col-8 col-md-7 p-md-5 text-left ">
                        {{-- <h3 class="_hilight ">Package  Coralist</h3> --}}
                      
                        <a style="text-decoration:none;" href="{{route('startjob.show',$designerid->token)}}">
                            <h3  class="d-none d-md-block">ออกแบบโดย&nbsp;<label class="font-weight-bold _hilight"> {{$designerid->name}}</label></h3>
                            <p  class="d-md-none">ออกแบบโดย&nbsp;<label class="font-weight-bold _hilight"> {{$designerid->name}}</label></p>
                        </a>
                        <h5 class="_gray">ออกแบบบรรจุภัณฑ์ประเภท {{$jobs->categories}}</h5>
                    </div>
                    <div class="col-12 col-md-3 pr-3 pt-3  p-md-5">
                        <div class="float-none float-md-right">
                            @guest
                            <a href="javascript:void(0);" >
                                <button onclick="toastr.info('คุณต้องทำการ สมัครสมาชิกหรือเข้าสู่ระบบก่อน จึงสามารถกดถูกใจได้.','ข้อมูล',{
                                    closeButton:true,
                                    progressBar: true,
                                })" class="love btn btn-light text-center rounded float-right border" style="width:70px; height:70px;">
                                   <p style="font-size:30px;"><i class="fas fa-heart"></i></p>
                                    {{-- {{$job->favorite_to_users->count()}}                                 --}}
                                </button>
                            </a>
                            @else
                            <a href="javascript:void(0);" >
                                <button onclick="document.getElementById('vote-form-{{$jobs->id}}').submit();" class="d-none d-md-block love text-center rounded float-right border {{ !Auth::user()->favorite_jobs->where('pivot.jobs_id',$jobs->id)->count() == 0 ?'favorite_jobs' : ''}}" style="width:70px; height:70px;">
                                    <p style="font-size:30px;"><i class="fas fa-heart"></i></p>
                                    {{-- {{$job->favorite_to_users->count()}}   --}}
                                </button>
                            
                                        <button onclick="document.getElementById('vote-form-{{$jobs->id}}').submit();" class="d-md-none love text-center rounded float-right border w-100 {{ !Auth::user()->favorite_jobs->where('pivot.jobs_id',$jobs->id)->count() == 0 ?'favorite_jobs' : ''}}" style="width:70px; height:70px;">
                                         <p style="font-size:30px;"><i class="fas fa-heart mr-2"></i>ชื่นชอบผลงาน</p>
                                            {{-- {{$job->favorite_to_users->count()}}   --}}
                                        </button>
                            </a>
                                 <form id="vote-form-{{$jobs->id}}" method="POST" action="{{route('job.vote',$jobs->id)}}"
                                    style="display:none;">
                                @csrf
                                </form>
                            @endguest                     
                        </div>
                    </div>



                    <div class="container-fluid" style="    padding-right: 0px !important;
                    padding-left: 0px !important;     margin-top: -60px;">
                
                        <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
                            {{-- <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                            </ol> --}}
                            {{-- <ol class="carousel-indicators d-none d-md-flex">
                                <div data-target="#carouselExampleCaptions" data-slide-to="0" class="active rounded mr-2 ml-2">
                                    <img class="rounded" src="https://picsum.photos/160/120" alt="">
                                </div>
                                <div data-target="#carouselExampleCaptions" data-slide-to="1" class="active rounded mr-2 ml-2">
                                    <img class="rounded" src="https://picsum.photos/160/120" alt="">
                                </div>
                                <div data-target="#carouselExampleCaptions" data-slide-to="2" class="active rounded mr-2 ml-2">
                                    <img class="rounded" src="https://picsum.photos/160/120" alt="">
                                </div>
                            </ol> --}}
                            <div class="carousel-inner  mt-5">
                                <div class="carousel-item active">

                                @foreach ($jobfile as $jobf)
                                @php
                                $filename = \App\Jobfiles::find($jobf);
    
                                @endphp
                                @if ($filename->fileartworkname == NULL)

                                <img src="/{{$filename->fileimgname}}" class="d-block w-100" height="100px" alt="...">

                                {{-- @else 
                                <img src="/{{$filename->fileimgname}}" class="d-block w-100" height="100px" alt="..."> --}}

                                @endif
                               
                               
                            @endforeach
                            {{-- <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div> --}}
                                </div>

                                {{-- <div class="carousel-item">
                                    <img src="https://sv1.picz.in.th/images/2019/12/17/i2azOP.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                       
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="https://sv1.picz.in.th/images/2019/12/17/i2azOP.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                      
                                    </div>
                                </div> --}}
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
                    <div class="col-12 col-md-12 ">
                        <div class="row p-3  mt-5">
                            <div class="col-12 col-md-7">
                            <h5 class="font-weight-bold">คำอธิบายงาน </h5>
                            </div>
                        </div>
                        <p class="text-justify pl-3 pb-5 over-wrap">
                            {{$jobs->requirement}}
                        </p>
                    <hr>
                    <div class="row p-3  ">
                        <div class="col-12 col-md-7">
                        <h5 class="font-weight-bold">ความคิดเห็น ({{$jobs->comments()->count()}})</h5>
                                @guest
                                <div class="row mt-5">
                                    <p class="mx-auto text-secondary mt-3" style="opacity:0.5;">กรุณาเข้าสู่ระบบก่อน จึงจะสามารถแสดงความคิดเห็นได้.
                                    </p>
                                </div>
                                    {{-- <a href="{{route('login')}}">Login </a> --}}
                                   
                                @else 
                                <form action="{{ route('comment.store',$jobs->id)}}" method="POST">
                                    @csrf
                                <div class=" container-fluid" >
                                <div class="row mt-4">
                                    <div class="col-12 col-md-3">
                                        <figure class="img-fluid  ">
                                            @if (auth()->user()->designer())
                                                
                                            <img class="rounded-circle" style="width:100px;height:100px; object-fit:cover;" src="/{{auth()->user()->designer()->profilepic}}">
                                            @elseif(!auth()->user()->designer() && auth()->user()->profile() && auth()->user()->profile()->profilepic !== NULL)
                                                <img class="rounded-circle" style="width:100px;height:100px; object-fit:cover;" src="/{{auth()->user()->profile()->profilepic}}">

                                            @else
                                                <img class="rounded-circle" style="width:100px;height:100px; object-fit:cover;" src="{{auth()->user()->avatar}}">

                                            @endif

                                        </figure>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="comment" rows="4" class="form-control" id="validationTextarea" placeholder="แสดงความคิดเห็นของคุณ" required></textarea>
    
                                    </div>
                                </div>
                                        <button class="mt-3 btn _primary-black float-right btn-lg d-none d-md-block" style="    display: block;
                                        width: 30%;
                                    " type="submit" >โพสต์</button>
                                     <button class="mt-3 btn _primary-black float-right btn-lg d-md-none" style="    display: block;
                                     width:100%;
                                 " type="submit" >โพสต์</button>
                                </div>
                            </form>
                            @endguest
                        </div>    
                    <div class="col-12 col-md-5 mt-5">
                            <div class="form-tags ">
                               <ul class="d-flex">
                            <i class="fas fa-tag icons m-1 _hilight"></i>
                            @foreach ($jobtag as $jobt)
                            @php
                            $tagname = \App\Tags::find($jobt)->tagName;

                            @endphp
                            <p>

                                
                                <li class="ml-1">
                                    <div class="box-tags ">
                                       <small>{{$tagname}}</small>
                                    </div>
                                 </li>
                            </p>
                        @endforeach
                                 

                               </ul>
                            </div>
                            <div class="d-flex">
                                <i class=" fas fa-heart m-1 _hilight"></i>
                                <span class="ml-1">{{$jobs->favorite_to_users->count()}}</span>
                                <p class="ml-1">Likes</p>
                            </div>
                            <div class="d-flex  mt-2">
                                <i class="far fa-eye m-1 _hilight"></i>
                            <span class="ml-1">{{$jobs->view_count}}</span>
                                <p class="ml-1">Views</p>
                                
                            </div>
                            <div class="d-flex  mt-2">
                                <i class="fas fa-calendar-week m-1 _hilight"></i>
                                <p class="ml-1">{{date('F d,Y',strtotime($jobs->created_at))}}</p>
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
                                        @php
                                            $user = $comment->user_id;
                                            $designer = \App\Designer::where('user_id',$user)->first();
                                            $users = \App\User::find($user);
                                        @endphp
                                        <figure class=" img-fluid">
                                            @if ($designer && $designer->profilepic !== NULL)
                                                
                                            <img class="rounded-circle" style="width:50px;height:50px; object-fit:cover;" src="/{{$designer->profilepic}}">
                                            @elseif($users->profile() && $users->profile()->profilepic !== NULL )
                                                <img class="rounded-circle" style="width:50px;height:50px; object-fit:cover;" src="/{{$users->profile()->profilepic}}">

                                            @else
                                                <img class="rounded-circle" style="width:50px;height:50px; object-fit:cover;" src="{{$users->avatar}}">

                                            @endif
                                        </figure>
                                    </div>
                                    <div class="col-7">
                                        <label for="name">{{$comment->user->name}}</label> <br>
                                        <p class="over-wrap">{{$comment->comment}}</p>
                                    </div>
                                    <div class="col-3 ">
                                        <small>{{$comment->created_at->diffForHumans()}}</small>
                                    </div>
                                </div>
                                <hr>
                                @endforeach

                                @else
                                <h1>''</h1><p class="_gray">ยังไม่มีใครแสดงความคิดเห็นเลย. บอกอะไรสักอย่างเกี่ยวกับงานที่ได้ดูสักหน่อย.</p><h1 class="float-right">''</h1>

                                @endif
                                    

                                
                            </div>
                        </div> 
                        
    
            
                </div>
                <div class="container" >
                        <div class="row">
                            <h5 class="pl-3 font-weight-bold">ผลงานอื่นๆของ </h5> &nbsp;<h5 class="font-weight-bold _hilight">{{$designerid->name}}</h5>

                        </div>
                        <div class="row">
                            @forelse($jobsde as $job)

                                @php
                                    $designerid = \App\Designer::find($job->designer_id);

                                    $jobfilee = DB::table('jobfiles')->where('job_id',$job->id)->first();

                                    // foreach ($jobs as $job){
            // $object->title 
                                    $jobtags = json_decode($job->tags,true);


                                    // }

                                @endphp

                                <article class="col-12 col-md-4 mt-5">
                                    <div class="card shadow-sm" data-id="{{ $job->id }}">

                                    <a href="{{ route('galleryDetail', $job->id) }}">
                                        <img class="card-img-top" src="/{{$jobfilee->fileimgname}}"  alt="..." style="height: 267px;">
                                    </a>

                                        <div class="card-body" style="width:auto;">
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
                                            @foreach ($jobtags as $jobt)
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
                                                <button onclick="toastr.info('คุณต้องทำการ สมัครสมาชิกหรือเข้าสู่ระบบก่อน จึงสามารถกดถูกใจได้.','ข้อมูล',{
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
                        @empty 
                                                <div class="container">

                        <div class="row pl-3">
                                                <p class="text-secondary" style="opacity:0.5;">ไม่มีงานอื่นๆของนักออกแบบคนนี้</p>

                        </div>
                                                </div>

                        @endforelse

                            
                       
                        </div>


                        {{-- ผลงานของนักออกแบบคนอื่นๆ --}}
                        <div class="row mt-5">
                            <h5 class="pl-3 font-weight-bold">ผลงานของ </h5> &nbsp;<h5 class="font-weight-bold _hilight">นักออกแบบคนอื่นๆ</h5>

                        </div>
                        <div class="row mb-5">
                            @forelse($jobsotherde as $job)

                                @php
                                    $designerid = \App\Designer::find($job->designer_id);

                                    $jobfilee = DB::table('jobfiles')->where('job_id',$job->id)->first();

                                    // foreach ($jobs as $job){
            // $object->title 
                                    $jobtags = json_decode($job->tags,true);


                                    // }

                                @endphp

                                <article class="col-12 col-md-4 mt-5">
                                    <div class="card shadow-sm" data-id="{{ $job->id }}">

                                    <a href="{{ route('galleryDetail', $job->id) }}">
                                        <img class="card-img-top" src="/{{$jobfilee->fileimgname}}"  alt="..." style="height: 267px;">
                                    </a>

                                        <div class="card-body" style="width:auto;">
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
                                            @foreach ($jobtags as $jobt)
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
                                                <button onclick="toastr.info('คุณต้องทำการ สมัครสมาชิกหรือเข้าสู่ระบบก่อน จึงสามารถกดถูกใจได้.','ข้อมูล',{
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
                        @empty 
                                                <div class="container">

                        <div class="row pl-3">
                                                <p class="text-secondary" style="opacity:0.5;">ไม่มีงานอื่นๆของนักออกแบบ</p>

                        </div>
                                                </div>

                        @endforelse

                            
                       
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
