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
                            <img src="photo/Frame.png" alt="">
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
                        <h1 class="header">ออกแบบ
                            <span class="_hilight font-weight-bold">บรรจุภัณฑ์</span><br>ด้วยดีไซน์เนอร์ที่ใช่</h1>
                        <p class="detail_1">ออกแบบบรรจุภัณฑ์ แพคเกจจิ้งด้วยดีไซน์เนอร์ ทีมมืออาชีพ ประสบการณ์สูงเพื่อให้สินค้าของคุณตามเป้าหมายที่ต้องการ</p>
                        <div class="buttons">
                            <div class="row mt-md-5">
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
                <div class="col-12 col-sm-6 "style="margin-top: 110px">
                    <div class="mt-ex" style="margin-top: 10rem">
                        <h1 class="header">ออกแบบ
                            <span class="_hilight font-weight-bold">บรรจุภัณฑ์</span><br>ด้วยดีไซน์เนอร์ที่ใช่</h1>
                        <p class="detail_1">ออกแบบบรรจุภัณฑ์ แพคเกจจิ้งด้วยดีไซน์เนอร์ ทีมมืออาชีพ ประสบการณ์สูงเพื่อให้สินค้าของคุณตามเป้าหมายที่ต้องการ</p>
                        <div class="buttons">
                            <div class="row">
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
                <div class="col-12 col-sm-6 mt_ex">
                    {{--<div data-aos="fade-up" data-aos-duration="300">--}}
                        {{--<figure class="img-fluid ">--}}
                            {{--<picture>--}}
                                {{--<img src="photo/Frame.png" alt="">--}}
                            {{--</picture>--}}
                        {{--</figure>--}}
                    {{--</div>--}}

                </div>
            </div>
            <div class=" text-center mt-5 mb-5 p-5 _curve">

            </div>

        </div>
        @endif



    </div>
    <div class=" _box-1 text-center _p-md-5 ">
        <div class="container">
            <div class="fadeInDown">
                <span class=" icon pl-md-2 pr-md-2 angle-double-down">
                    {{-- <i class="fas icon fa-angle-double-down"></i> --}}
            </div>

            <h1 class="p-5 text-center">ทำไมต้อง<span class="_hilight font-weight-bold">QUATIVE</span> </h1>
            <div class="row ">

                <div class="col-12 col-md-4" data-aos="fade-up" data-aos-duration="500">
                    <div class="card _card border shadow-sm" style="cursor: pointer;">
                        <div class="card-body ">
                            <img src="photo/badge.png" alt="..." class="mt-5 mb-3">
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
                            <img src="photo/lightpop.png"alt="..." class="mt-5 mb-3">
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
                            <img src="photo/verify.png" alt="..." class="mt-5 mb-3">
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
    <div class="container-fluid totorial ">
            <div class="container  _p-md-5 ">
                    <div class="text-center">
                            <h1 class="content-dark pb-5">Quative <span class="_hilight font-weight-bold">ใช้ยังไง?</span></h1>

                        <div class="row">
                            <div class="col-12 col-md-3">
                                    <img src="photo/@progess_1.png" alt="">
                                    <h5 class="content-dark mt-5">ขั้นตอนที่ 1</h5>
                                    <small class="content-dark mt-3">เลือกผลิตภัณฑ์ <br>
                                         ที่คุณต้องการใช้
                                    </small>
                            </div>
                            <div class="col-12 col-md-3">
                                    <img src="photo/@progess_2.png" alt="">
                                    <h5 class="content-dark mt-5">ขั้นตอนที่ 2</h5>
                                    <small class="content-dark mt-3">เลือกนักออกแบบ <br>
                                            จากระบบที่คัดเลือกมาให้
                                    </small>
                            </div>
                            <div class="col-12 col-md-3">
                                    <img src="photo/@progess_3.png" alt="">
                                    <h5 class="content-dark mt-5">ขั้นตอนที่ 3</h5>
                                    <small class="content-dark mt-3">ชำระเงินโดยโอนผ่านธนาคาร <br>
                                            และเเจ้งใบเสร็จ
                                    </small>
                            </div>
                            <div class="col-12 col-md-3">
                                    <img src="photo/@progess_4.png" alt="">
                                    <h5 class="content-dark mt-5">ขั้นตอนที่ 4</h5>
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
                                                    <img src="photo/Packaging-3.png">
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 p-5 text-right">
                                            <h1><span class="_hilight font-weight-bold" >พรีวิว</span>บรรจุภัณฑ์<br>
                                                ลองสินค้าในแบบของคุณ
                                            </h1>
                                            <p>ลองออกแบบบรรจุภัณฑ์ในรูปแบบหลายๆแบบ โดยใช้โลโก้ของคุณระบบจะทำการสร้างบรรจุภัณฑ์ให้คุณทดลองพรีวิวก่อนค้นหาดีไซน์เนอร์
                                            </p>
                                            <div class="row">
                                                <div class="col">

                                                </div>
                                                <div class="col">
                                                    <button class="btn _primary-btn btn-lg btn-block mt-5">พรีวิวโลโก้</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
    <div class="_box-3 bg-white _p-md-5  mb-5">
                <div class="container">
                    <h1 class="p-5 text-center"> รีวิว<span class="_hilight font-weight-bold">จากผู้ใช้งาน</span> </h1>

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
                                <div class="text-center">
                                    <h1><span class="_hilight font-weight-bold">ผลงาน</span>นักออกแบบ </h1>
                                    <p>ต้องการค้นหานักออกแบบใช่มั้ย ? สมัครสมาชิกแล้วลองใช้งาน <br>
                                        การค้นหานักออกแบบอย่างที่คุณต้องการดูก่อนสิ</p>

                                    <div class="flex">
                                        <div class="container">

                                            <div class="row mt-5">
                                            {{-- @foreach ($designers as $designer) --}}

                                                <div class="col-12 col-md-6 mb-5">

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
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 mt-5">
                                                            <img src="https://picsum.photos/320" class="rounded" alt="...">
                                                        </div>
                                                        <div class="col-12 col-md-6 mt-5">
                                                            <img src="https://picsum.photos/320" class="rounded" alt="...">
                                                        </div>

                                                    </div>

                                                </div>
                                                    <div class="col-12 col-md-6  mb-5">
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
                                                        </div>
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
