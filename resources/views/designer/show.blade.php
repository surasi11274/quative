@extends('layouts.app')

@section('assets')
        <link rel="stylesheet" href="{{asset('css/style_match.css')}}">

@endsection
<body style="font-family: prompt;">
    
</body>
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
                        <!-- <image id="profileImage" class="rounded-circle" src="https://picsum.photos/140" /> -->
                        <image id="profileImage" style=" object-fit: cover; width: 150px; height:150px;" class="rounded-circle" src="/{{$designer->profilepic}}" />
                        <input id="imageUpload" type="file"
                               name="profile_photo" placeholder="Photo" required="" capture hidden>
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
               
                <div class="row">
                    <div class="col-6">
                    <h3 class="selectfillter" style="color:#904ae8
;">ข้อมูลส่วนตัว</h3>
                    <div class="row col">
                    <h5 for="">ชื่อ : {{$designer->name}} </h5>

                    </div>
                    <div class="row col">
                    <h5 for="">นามสกุล : {{$designer->surname}}</h5>

                    </div>
                    
                    </div>
                    <div class="col-6">
                    <h3 class="selectfillter" style="color:#904ae8
;">สไตล์งานที่ต้องการ</h3>
                       
                                <h5 for="">
                                @foreach($designer->tag as $tagn)

@php
                $tagname = \App\Tags::find($tagn)->tagName;
            @endphp
                                    {{$tagname}},
                                @endforeach

                                </h5>


                    </div>
                </div>
                <div class="row col mt-5">
                    <h3 class="selectfillter" style="color:#904ae8
    ;">ข้อมูลบัตรประชาชน</h3>
                        
                    </div>
                    <div class="row col">
                        <h5 for="">
                        เลขประจำตัวประชาชน : {{$designer->personalID}} 
                            </h5>
                    </div>
                    <div class="row col">
                        <h5 for="">
                        ชื่อ-นามสกุล : {{$designer->titleName}} {{$designer->name}} {{$designer->surname}}
                            </h5>
                    </div>
                    <div class="row col">
                        <h5 for="">
                        วันเดือนปีเกิด : {{$designer->birthdate}}
                            </h5>
                    </div>
                    <div class="row col">
                        <h5 for="">
                    ที่อยู่ : {{$designer->address}} {{$designer->zipcode}}
                            </h5>
                    </div>

                    <div class="row col mt-5">
                    <h3 class="selectfillter" style="color:#904ae8
    ;">ข้อมูลการเงิน</h3>
                        
                    </div>
                   
                    <div class="row col">
                    <h5 for="">
                    ชื่อธนาคาร : {{$designer->bankname}} 
                        </h5>
                    </div>
                    <div class="row col">
                    <h5 for="">
                    เลขบัญชี : {{$designer->bankaccount}}
                        </h5>
                    </div>
               
               
            </div>
               
            </div>
          
            <a  style="color:white;" href="/" ><button type="button" class="btn btn-lg btn-block"   style="color:white; background-color: #904ae8
;margin-top: 20px; "  >
            เสร็จสิ้น
            </button></a>
                
            </div>

           

        </form>
    </div>
</div>
</section>
@endsection