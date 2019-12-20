@extends('layouts.app')

@section('assets')
        <link rel="stylesheet" href="{{asset('css/style_match.css')}}">

@endsection
@section('content')
<section class="content mt_ex">

<div class="row">
    <!--<div class="alert alert-success col-md-3 offset-md-8 alert-dissmissable position-absolute fade show" style="z-index: 1; transition: 0.6s;" role="alert">-->
    <!--<button class="close" type="button" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>-->
    <!--กรอกข้อมูลเรียบร้อย-->
    <!--</div>-->
</div>
<div class="container modal-lg">
    <div class="text-center p-5">
        <h1><span class="_hilight">โปรไฟล์ของคุณ</span></h1>
        <p>
            กรอกข้อมูลเสร็จแล้วกรุณาตรวจข้อมูลให้ครบถ้วนเพื่อที่เราจะได้หาผู้ประกอบการที่<br>
            ใช่ที่สุดสำหรับคุณ
        </p>

    </div>

    <div class="col-12 col-sm-12 p-3 mb-5 rounded ">
        <form class="form-match">
            <div class="rec" >
                <div class="row">
                    <div class="col-3" style="margin-left: 50px; margin-top: 20px;">
                        {{--<image id="profileImage" class="rounded-circle" src="https://picsum.photos/140" />--}}
                        <image id="profileImage" class="rounded-circle" src="{{$designer->profilepic}}" />
                        <input id="imageUpload" type="file"
                               name="profile_photo" placeholder="Photo" required="" capture>
                    </div>
                    <div class="col-3 align-items-center" style="margin-top: 40px;">
                        <div class="fill">
                            <h1 class="titlename">{{$designer->name}}</h1>
                            <p style="color: white;">Designer</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container p-5">
                <h2 class="selectfillter" >ข้อมูลทั่วไป</h2>
                <div class="row">
                    <div class="col-6">
                    <label for="">ชื่อ : {{$designer->name}} นามสกุล : {{$designer->surname}}</label>
                    </div>
                    <div class="col-6 text-right">
                     <label for=""></label>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">

                        <div class="modal-content p-5 mb-5 form-match rounded-ex">

                            <form>
                                <div class="tab-content" id="myTabContent">
                                    <button type="button" class="close" style="    font-size: 3.5rem;" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="form-group">
                                        <h1 ><span class="_hilight">เลือกประเภเทการออกแบบ</span></h1>

                                       
                                                <!-- <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
                                                    <h5 class="card-title">Tab Card Three</h5>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                                <div class="tab-pane fade p-3" id="four" role="tabpanel" aria-labelledby="four-tab">
                                                    <h5 class="card-title">Tab Card four</h5>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                                <div class="tab-pane fade p-3" id="five" role="tabpanel" aria-labelledby="five-tab">
                                                    <h5 class="card-title">Tab Card five</h5>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>

                                                </div> -->
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <h2 class="selectfillter  pt-5">สไตล์งานที่ต้องการ</h2>

                <div class="form-group">
                    
                    <div class="row">
                    
                    <div class="form-check">
                        <!-- <li> -->
                        @foreach($designer->tag as $tagn)
                                @php
                                    $tagname = \App\Tags::find($tagn)->tagName;
                                @endphp
                            <label  class="form-check-label" for="tagName">{{$tagname}}</label>
                            @endforeach
                        <!-- </li> -->
                    </div>

                </div>
            </div>
                <h2 class="selectfillter  pt-5">วันที่ต้องการ</h2>
                <div class="row">
                    <div class="col-6">
                        <input type="date" id="basicDate"  placeholder="MM/DD/YY" data-input>
                    </div>
                </div>
                <div class="row  pt-5">
                    <div class="col-6 ">
                        <h2 class="selectfillter ">อีเมล์</h2>
                        <input type="text" class="form-control" placeholder="ex. abc@hotmail.com" aria-label="Username" aria-describedby="basic-addon1">
                        <p>
                            กรอกอีเมล์ที่ต้องการแจ้งเตือน

                        </p>
                    </div>
                    <div class="col-6 ">
                        <h2 class="selectfillter">เบอร์โทรศัพท์</h2>
                        <input type="text" class="form-control" placeholder="ex. 029067726" aria-label="Username" aria-describedby="basic-addon1">
                        <p>
                            กรอกเบอร์โทรศัพท์เพื่อเราแจ้งข่าวสารล่วงหน้า
                        </p>
                    </div>
                </div>
                <h2 class="selectfillter  pt-5">สิ่งที่ต้องการจะบอกเป็นพิเศษ</h2>
                <textarea class="form-control" placeholder="ex. need less is more" aria-label="With textarea"></textarea>
                <h2 class="selectfillter  pt-5">งบประมาณที่ต้องการจ้างงานออกแบบในครั้งนี้</h2>
                <p>
                    *ระบบจะค้นหาจากราคาที่ใกล้มากที่สุดจากกลุ่มนักออกแบบ*
                </p>
                <input style="border-width: 2px;" type="number" class="detaill-select mt-5 mb-5" name="FirstName" plachholder="บรรจุภัณฑ์ประเภทกล่อง">
            </div>

            <button type="button" class="btn btn-lg btn-block"   style="background-color: #904ae8
;margin-top: 20px; "  >
            <a  style="color:white;" href="/select" >ถัดไป</a>
            </button>

        </form>
    </div>
</div>
</section>
@endsection