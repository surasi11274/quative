@extends('layouts.app')

@section('content')
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
        <div class="container">
            <div class="row ">
                <div class="col-12 col-sm-6 mt_ex">
                    <h1 class="header">ออกแบบ
                        <span class="_hilight">บรรจุภัณฑ์</span><br>ด้วยดีไซน์เนอร์ที่ใช่</h1>
                    <p class="detail_1">ออกแบบบรรจุภัณฑ์ แพคเกจจิ้งด้วยดีไซน์เนอร์ ทีมมืออาชีพ ประสบการณ์สูงเพื่อให้สินค้าของคุณตามเป้าหมายที่ต้องการ</p>
                    <div class="buttons">
                        <div class="row">
                            <div class="col">
                                <a class="btn _secondary-btn btn-lg btn-block ">ค้นหานักออกแบบ</a>
                            </div>
                            <div class="col">
                                <a class="btn _primary-btn btn-lg btn-block">สมัครสมาชิก</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 mt_ex">
                    <figure class="img-fluid ">
                        <picture>
                            <img src="photo/Frame.png" alt="">
                        </picture>
                    </figure>
                </div>
            </div>
            <div class=" text-center mt-5 mb-5 p-5 _curve">

            </div>

        </div>

    </div>
    <div class=" _box-1 text-center p-5">
        <div class="container">
            <h1 class="p-5">ทำไมต้อง <span class="_hilight">QUATIVE</span> </h1>
            <div class="row ">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="photo/_badge.png" alt="..." class="mt-5 mb-5">
                            <h3 class="mt-2 mb-2">มีคุณภาพ</h3>
                            <p >สินค้าดีไซน์โดยดีไซน์เนอร์มืออาชีพ <br>
                                ทำให้มีคุณภาพ ใช้งานได้ดี สวย <br>
                                โดนใจตามแบบที่เราต้องการ</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="photo/_light.png"alt="..." class="mt-5 mb-5">
                            <h3 class="mt-2 mb-2">นักออกแบบมืออาชีพ</h3>
                            <p >นักออกแบบเฉพาะทาง <br>
                                มาช่วยให้งานของคุณดูดีขึ้น <br>
                                สร้างประสบการณ์ที่ดีต่อใจคุณ</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 ">
                    <div class="card">
                        <div class="card-body">
                            <img src="photo/_vertify.png" alt="..." class="mt-5 mb-5">
                            <h3 class="mt-2 mb-2">ความปลอดภัย</h3>
                            <p >มีการตรวจสอบความปลอดภัย <br>
                                น่าเชื่อถือสำหรับผู้ใช้งาน <br>
                                และนักออกแบบ
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="_box-2 bg-white mt_ex">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-md-6 ">
                                            <figure class="img-fluid">
                                                <img src="photo/preview.png">
                                            </figure>
                                        </div>
                                        <div class="col-12 col-md-6 p-5 text-right">
                                            <h1><span class="_hilight" >พรีวิว</span>บรรจุภัณฑ์<br>
                                                ลองสินค้าในแบบของคุณ
                                            </h1>
                                            <p>ลองออกแบบบรรจุภัณฑ์ในรูปแบบหลายๆแบบ โดยใช้โลโก้<br>
                                                ของคุณระบบจะทำการสร้างบรรจุภัณฑ์ให้คุณทดลองพรีวิวก่อนค้นหาดีไซน์เนอร์
                                            </p>
                                            <button class="btn _primary-btn btn-lg btn-block">พรีวิว</button>

                                        </div>
                                    </div>

                                </div>
                            </div>
    <div class="_box-3 bg-white mt-ex mb-5">
        <div class="container">
            <div class="bgc rounded-ex">

            </div>
        </div>
    </div>
                            <div class="_box-4 bg-white">
                                <div class="text-center">
                                    <h1>นักออกแบบ ดีเด่นประจำสัปดาห์</h1>
                                    <p>ต้องการค้นหานักออกแบบใช่มั้ย ? สมัครสมาชิกแล้วลองใช้งาน
                                        การค้นหานักออกแบบอย่างที่คุณต้องการดูก่อนสิ</p>

                                    <div class="flex">
                                        <div class="container">

                                            <div class="row">
                                            @foreach ($designers as $designer)

                                                <div class="col-3 mt-5 mb-5">
                                                    <img src="{{$designer->profilepic}}" class="rounded" alt="...">
                                                </div>
                                                @endforeach

                                                <div class="col-3 mt-5 mb-5">
                                                    <img src="https://picsum.photos/320" class="rounded" alt="...">
                                                </div>
                                                <div class="col-3 mt-5 mb-5">
                                                    <img src="https://picsum.photos/320" class="rounded" alt="...">
                                                </div>
                                                <div class="col-3 mt-5 mb-5">
                                                    <img src="https://picsum.photos/320" class="rounded" alt="...">
                                                </div>

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
