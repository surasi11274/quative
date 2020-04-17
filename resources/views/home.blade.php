@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="css/_vote-detail.css">
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                </div>

            </div>
        </div>
    </div>
</div> -->

<section class="content ">
    <div class="shape">

    @if (Auth::guest())

        <div class="container">
            <div class="row " >
                <div class="col-12 col-sm-6 "style="margin-top: 110px">
                    <div class="mt-ex" style="margin-top: 10rem">
                        <h1 class="header">ออกแบบ
                            <span class="_hilight font-weight-bold">บรรจุภัณฑ์</span><br>ด้วยดีไซน์เนอร์ที่ใช่</h1>
                        <p class="detail_1">ออกแบบบรรจุภัณฑ์ แพคเกจจิ้งด้วยดีไซน์เนอร์ ทีมมืออาชีพ ประสบการณ์สูงเพื่อให้สินค้าของคุณตามเป้าหมายที่ต้องการ</p>
                        <div class="buttons">
                            <div class="row mt-md-5">
                                <div class="col">
                                    <a href="/preview" class="btn _secondary-btn btn-lg btn-block ">พรีวิวงานออกแบบ</a>
                                </div>
                                <div class="col">
                                    <a href="{{ route('register') }}" class="btn _primary-btn btn-lg btn-block">สมัครสมาชิก</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 mt_ex">
                    <figure class="img-fluid ">
                        <picture>
                            {{-- <img src="photo/Frame.png" alt=""> --}}
                        </picture>
                    </figure>
                </div>
            </div>
            <div class=" text-center mt-5 mb-5 p-5 _curve">

            </div>

        </div>
        @elseif (Auth::user()->role=='1')
        <div class="container">
            <div class="row " >
                <div class="col-12 col-sm-6 "style="margin-top: 110px">
                    <div class="mt-ex" style="margin-top: 10rem">
                        
                        <h1 class="header d-none d-md-block">ออกแบบ
                            <span class="_hilight font-weight-bold">บรรจุภัณฑ์</span><br>ด้วยดีไซน์เนอร์ที่ใช่</h1>
                            <h3 class="header d-md-none">ออกแบบ
                                <span class="_hilight font-weight-bold">บรรจุภัณฑ์</span><br>ด้วยดีไซน์เนอร์ที่ใช่</h3>
                        <p class="detail_1">ออกแบบบรรจุภัณฑ์ แพคเกจจิ้งด้วยดีไซน์เนอร์ ทีมมืออาชีพ ประสบการณ์สูงเพื่อให้สินค้าของคุณตามเป้าหมายที่ต้องการ</p>
                        <div class="buttons">
                            <div class="row mt-3 mt-md-5">
                                <div class="col">
                                    <a href="/preview" class="btn _secondary-btn btn-lg btn-block ">พรีวิวงานออกแบบ</a>
                                </div>
                                <div class="col">
                                    <a href="/vote" class="btn _primary-btn btn-lg btn-block">ผลงานนักออกแบบ</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 mt_ex">
                    {{--<figure class="img-fluid ">--}}
                        {{--<picture>--}}
                            {{--<img src="photo/Frame.png" alt="">--}}
                        {{--</picture>--}}
                    {{--</figure>--}}
                </div>
            </div>
            <div class=" text-center mt-5 mb-5 p-5 _curve">

            </div>

        </div>
        @else
        <div class="container">
            <div class="row " >
                <div class="col-12 col-md-6"style="margin-top: 110px">
                    <div class="mt-ex" style="margin-top: 10rem">
                        <h1 class="header d-none d-md-block">ออกแบบ
                            <span class="_hilight font-weight-bold">บรรจุภัณฑ์</span><br>ด้วยดีไซน์เนอร์ที่ใช่</h1>
                            <h3 class="header d-md-none">ออกแบบ
                            <span class="_hilight font-weight-bold">บรรจุภัณฑ์</span><br>ด้วยดีไซน์เนอร์ที่ใช่</h3>
                        <p class="detail_1">ออกแบบบรรจุภัณฑ์ แพคเกจจิ้งด้วยดีไซน์เนอร์ ทีมมืออาชีพ ประสบการณ์สูงเพื่อให้สินค้าของคุณตามเป้าหมายที่ต้องการ</p>
                        <div class="buttons">
                            <div class="row mt-3 mt-md-5">
                                <div class="col">
                                    <a href="/preview" class="btn _secondary-btn btn-lg btn-block ">พรีวิวงานออกแบบ</a>
                                </div>
                                <div class="col">
                                    <a href="/search"  class="btn _primary-btn btn-lg btn-block">ค้นหานักออกแบบ</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" text-center mt-5 mb-5 p-5 _curve">

            </div>

        </div>
        @endif



    </div>
    <div class=" _box-1 text-center _p-md-5 ">
        <div class="container">
            <div class="animated infinite slideInDown">
                <span class=" icon pl-md-2 pr-md-2 angle-double-down">
                    {{-- <i class="fas icon fa-angle-double-down"></i> --}}
            </div>

            <h1 class="p-md-5 text-center d-none d-md-block">ทำไมต้อง <span class="_hilight font-weight-bold">QUATIVE</span> </h1>
            <h3 class="p-3 text-center d-md-none">ทำไมต้อง <span class="_hilight font-weight-bold">QUATIVE</span> </h3>
            <div class="row mb-5">

                <div class="col-12 col-md-4" data-aos="fade-up" data-aos-duration="500">
                    <div class="card _card border shadow-sm" style="cursor: pointer;">
                        <div class="card-body ">
                            <img src="../photo/badge.png" alt="..." class="mt-5 mb-3">
                            <h5 class="mt-3 mb-3 font-weight-bold">มีคุณภาพ</h5>
                            <p >สินค้าดีไซน์โดยดีไซน์เนอร์มืออาชีพ <br>
                                ทำให้มีคุณภาพ ใช้งานได้ดี สวย <br>
                                โดนใจตามแบบที่เราต้องการ</p>

                        </div>
                        <div class="pallete"></div>
                    </div>
                </div>
                <div class="col-12 col-md-4" data-aos="fade-up" data-aos-duration="500">
                    <div class="card _card border shadow-sm"  style="cursor: pointer;">
                        <div class="card-body">
                            <img src="../photo/lightpop.png"alt="..." class="mt-5 mb-3">
                            <h5 class="mt-3 mb-3 font-weight-bold">นักออกแบบมืออาชีพ</h5>
                            <p >นักออกแบบเฉพาะทาง <br>
                                มาช่วยให้งานของคุณดูดีขึ้น <br>
                                สร้างประสบการณ์ที่ดีต่อใจคุณ</p>
                        </div>
                        <div class="pallete"></div>
                    </div>
                </div>
                <div class="col-12 col-md-4" data-aos="fade-up" data-aos-duration="500">
                    <div class="card _card border shadow-sm"  style="cursor: pointer;">
                        <div class="card-body">
                            <img src="../photo/verify.png" alt="..." class="mt-5 mb-3">
                            <h5 class="mt-3 mb-3 font-weight-bold">ความปลอดภัย</h5>
                            <p >มีการตรวจสอบความปลอดภัย <br>
                                น่าเชื่อถือสำหรับผู้ใช้งาน <br>
                                และนักออกแบบ
                            </p>
                        </div>
                        <div class="pallete"></div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid totorial  pb-5 pb-md-1">
            <div class="container  _p-md-5 ">
                    <div class="text-center">
                            <h1 class="content-dark pb-5 d-none d-md-block">QUATIVE <span class="_hilight font-weight-bold">ใช้ยังไง?</span></h1>
                            <h3 class="content-dark pt-5 pb-5 d-md-none">QUATIVE <span class="_hilight font-weight-bold">ใช้ยังไง?</span></h3>

                        <div class="row">
                            <div class="col-12 col-md-3">
                                    <img src="../photo/@progess_1.png" alt="">
                                    <h5 class="content-dark mt-5 font-weight-bold">ขั้นตอนที่ 1</h5>
                                    <small class="content-dark mt-3">เลือกผลิตภัณฑ์ <br>
                                         ที่คุณต้องการใช้
                                    </small>
                            </div>
                            <div class="col-12 col-md-3">
                                    <img src="../photo/@progess_2.png" alt="">
                                    <h5 class="content-dark mt-5 font-weight-bold">ขั้นตอนที่ 2</h5>
                                    <small class="content-dark mt-3">เลือกนักออกแบบ <br>
                                            จากระบบที่คัดเลือกมาให้
                                    </small>
                            </div>
                            <div class="col-12 col-md-3">
                                    <img src="../photo/@progess_3.png" alt="">
                                    <h5 class="content-dark mt-5 font-weight-bold">ขั้นตอนที่ 3</h5>
                                    <small class="content-dark mt-3">ชำระเงินโดยโอนผ่านธนาคาร <br>
                                            และเเจ้งใบเสร็จ
                                    </small>
                            </div>
                            <div class="col-12 col-md-3">
                                    <img src="../photo/@progess_4.png" alt="">
                                    <h5 class="content-dark mt-5 font-weight-bold">ขั้นตอนที่ 4</h5>
                                    <small class="content-dark mt-3"> รับไฟล์งาน <br>
                                            จากนักออกแบบ
                                    </small>
                            </div>
                        </div>


                            {{-- <div class="d-flex">
                                    <hr class="_dash">
                            </div> --}}

                    </div>
                </div>
    </div>


    <div class="_box-2 _p-md-5">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-md-6 ">
                                            <div data-aos="fade-right" data-aos-duration="1000">
                                                <figure class="img-fluid">
                                                    <img src="../photo/Packaging-3.png">
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 p-md-5 text-center text-md-right">
                                            <h1 class="d-none d-md-block"><span class="_hilight font-weight-bold" >พรีวิว</span>บรรจุภัณฑ์<br>
                                                สินค้าในแบบของคุณ
                                            </h1>
                                            <h3 class=" d-md-none text-center"><span class="_hilight font-weight-bold" >พรีวิว</span>บรรจุภัณฑ์<br>
                                                สินค้าในแบบของคุณ
                                            </h3>
                                            <p>ลองออกแบบบรรจุภัณฑ์ในรูปแบบหลายๆแบบ โดยใช้โลโก้ของคุณระบบจะทำการสร้างบรรจุภัณฑ์ให้คุณทดลองพรีวิวก่อนค้นหาดีไซน์เนอร์
                                            </p>
                                            <div class="row">
                                                
                                                <div class="col-12 col-6">
                                                    <button class="btn _primary-btn btn-lg btn-block mt-5">พรีวิวโลโก้</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
    <div class="_box-3 bg-white _p-md-5  mb-5">
                <div class="container">
                    <h1 class="p-5 text-center d-none d-md-block"> รีวิว<span class="_hilight font-weight-bold">จากผู้ใช้งาน</span> </h1>
                    <h3 class="p-5 text-center d-md-none"> รีวิว<span class="_hilight font-weight-bold">จากผู้ใช้งาน</span> </h3>

                    <div class="row">
                        <div class="col-12 col-md-4 justify-content-center">
                            <div class="card border  text-center p-5 mb-3">
                                <img id="profileImage" class="rounded-circle" src="https://picsum.photos/90" style="width: 90px; height: 90px; margin: 0px auto;">
                                    <h5 class="font-weight-bold mt-3 mb-5">สิทธิชัย อยู่ถาวร</h5>

                                    <p>Quative ดีมากเลย</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 justify-content-center">
                            <div class="card border  text-center p-5 mb-3">
                                <img id="profileImage" class="rounded-circle " src="https://picsum.photos/90" style="width: 90px; height: 90px; margin: 0px auto;">
                                    <h5 class="font-weight-bold mt-3 mb-5">เนตรดวง ตาแก้ว</h5>

                                    <p>นักออกแบบทำงาน
                                        ให้ตรงตามใจมาก
                                        ตามใจมากครับ</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 justify-content-center">
                            <div class="card border text-center p-5 mb-3">
                                <img id="profileImage" class="rounded-circle " src="https://picsum.photos/90" style="width: 90px; height: 90px; margin: 0px auto;">
                                    <h5 class="font-weight-bold mt-3 mb-5">ดวงใจ ดวงนภา</h5>

                                    <p>ตรงต่อเวลา งานขายได้
                                        ต้อง Quative เลย</p>
                            </div>
                        </div>

                    </div>
                    </div>



    </div>
                            <div class="_box-4 _p-md-5">
                                <div class="col-12 text-center">
                                    <h1 class="d-none d-md-block"><span class="_hilight font-weight-bold">ผลงาน</span>นักออกแบบ </h1>
                                    <h3 class="d-md-none"><span class="_hilight font-weight-bold">ผลงาน</span>นักออกแบบ </h3>
                                    <p>ต้องการค้นหานักออกแบบใช่มั้ย ? สมัครสมาชิกแล้วลองใช้งาน
                                        การค้นหานักออกแบบอย่างที่คุณต้องการดูก่อนสิ</p>

                                    <div class="flex">
                                        <div class="container">

                                            <div class="row mt-5">
                                            {{-- @foreach ($designers as $designer) --}}
                                            <div class="row">

                                                @if($jobs->count())
                                                    @foreach($jobs as $job)
                            
                                                        @php
                                                            $designerid = \App\Designer::find($job->designer_id);
                            
                                                            $jobfilee = DB::table('jobfiles')->where('job_id',$job->id)->first();
                            
                            
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
                                                @endforeach
                                            @endif
                            
                                        </div>
                                       
                                                    {{-- <div class="col-12 col-md-6  mb-5">
                                                        <div class="row">
                                                            <div class="col-12 col-md-6  mb-5">
                                                                <img src="https://picsum.photos/320" class="rounded" alt="...">
                                                            </div>
                                                            <div class="col-12 col-md-6  mb-5">
                                                                <img src="https://picsum.photos/320" class="rounded" alt="...">
                                                            </div>

                                                        </div>
                                                        <div class="card">
                                                            <img src="https://picsum.photos/320" class="rounded" alt="...">
                                                            <div class="card-body text-left">
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <img src="https://picsum.photos/90" style=" object-fit: cover; width: 90px;height: 90px;" class="rounded-circle" alt="...">
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <h5>ภาวิณี ดุจดวง</h5>
                                                                        <p class="card-text">บรรจุภัณฑ์ประเภทกล่องวัสดุมาตรฐาน</p>
                                                                        <small>กล่อง,มินิมอล</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                    <div class="row mt-5">
                                                        <div class="col-4"></div>
                                                        <div class="col-4 ">
                                                            <div class="text-center">
                                                                <a href="/gallery" >
                                                                    <button class="btn _primary-black text-center btn-lg" > ดูผลงานเพิ่มเติม</button>
                                                                </a>
                                                            </div>
                                                               
                                                                
                                                            
                                                        </div>
                                                        <div class="col-4"></div>
            
                                                    </div>

                                                {{-- @endforeach --}}



                                            </div>
                                            <!-- <div class="row">
                                                <div class="col-3 mt-5 mb-5">
                                                    <img src="https://picsum.photos/320" class="rounded" alt="...">
                                                </div>
                                                <div class="col-3 mt-5 mb-5">
                                                    <img src="https://picsum.photos/320" class="rounded" alt="...">
                                                </div>
                                                <div class="col-3 mt-5 mb-5">
                                                    <img src="https://picsum.photos/320" class="rounded" alt="...">
                                                </div>
                                                <div class="col-3 mt-5 mb-5">
                                                    <img src="https://picsum.photos/320" class="rounded" alt="...">
                                                </div> -->

                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
