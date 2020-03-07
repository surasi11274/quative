@extends('layouts.app')
@section('assets')
<section class="includecourse">
  <form action="/designer/coursestore" method="post">
    {{ csrf_field() }}

    <div class="container bg-white mt_ex shadow-sm ">
        <div class="text-center pt-5  ">
            <h1 class="_hilight">เรทและราคางานของฉัน</h1>
            <h4 class="_gray">ขอบเขตการจ้างงาน</h4>
            {{-- <h4>ใบรหัสการจ้างงาน No. W0{{$jobs->id}}</h4> --}}
        </div>
       <div class="container">
        <div class="form-row pl-pr-lg-_ex  mt-5">
          <div class="form-group col-md-12">
            <h5 class="font-weight-bold">ขอบเขตการจ้างงาน</h5>
           
            <div class="row text-center text-md-left">
              {{-- @foreach ($courses as $course) --}}
                  
                <div class="col-12 col-md-4 ">
                  <div class="show-payment bg-white">
                    <div class="form-group">
                        <p class="font-weight-bold">งานออกแบบฉลากติดสินค้าหน้าเดียว</p>
                        <small>ฉลากหน้าเดียวสำหรับติด หรือ แปะบนผลิตภัณฑ์ (Design a single-page product label)</small>
                        <small class="_gray">แก้ไขราคา</small>
                        <input type="hidden"  name="course_id[]" value="">

                        <input type="num" class="form-control _hilight font-weight-bold" id="editprice" name="course_rate[]" value="{{$courses->course_rate['0']}}">
                    </div>
                  </div>
                </div>
                {{-- @endforeach --}}

                <div class="col-12 col-md-4 bg-white">
                    <div class="show-payment bg-white">
                        <div class="form-group">
                            <p class="font-weight-bold">ออกแบบกล่องแพคเกจ </p>
                            <small>ขึ้นรูปกล่อง, ซองหรือบรรจุภัณฑ์ (Design for forming boxes, Packaging, sachets or packaging) <br></small>
                            <small class="_gray">แก้ไขราคา</small>
                            <input type="num" class="form-control _hilight font-weight-bold" id="editprice" name="course_rate[]" value="{{$courses->course_rate['1']}}">
                        </div>
                      </div>
                </div>
                <div class="col-12 col-md-4   bg-white">
                    <div class="show-payment bg-white">
                        <div class="form-group">
                            <p class="font-weight-bold">ออกแบบฉลากติดสินค้า พร้อมกล่องแพคเกจ</p>
                            <small>ฉลากหน้าเดียวสำหรับติด หรือ แปะ บนผลิตภัณฑ์ และขึ้นรูป กล่อง, ซองหรือบรรจุภัณฑ์</small>
                            <small class="_gray">แก้ไขราคา</small>
                            <input type="num" class="form-control _hilight font-weight-bold" id="editprice" name="course_rate[]" value="{{$courses->course_rate['2']}}">
                        </div>
                      </div>
                </div>
              </div>
             
            </div>
            <h5 class="font-weight-bold">ระยะเวลาการทำงาน</h5>
           
            <div class="row text-center text-md-left  mb-5">
                <div class="col-12 col-md-4 ">
                    <div class="show-payment bg-purple">
                        <p class="font-weight-bold">ธรรมดา</p>
                        
                        <small class="_gray">ระยะเวลา</small>
                        <div class="input-group">
                       
                        <input type="text" class="form-control font-weight-bold _hilight" aria-label="Amount (to the nearest dollar)" name="course_duration[]" value="{{$courses->course_duration['0']}}">
                        <div class="input-group-append">
                          <input type="hidden" class="form-control _hilight font-weight-bold" id="editprice" name="course_duration_rate[]" value="null">

                          <span class="input-group-text bg-white font-weight-bold _hilight">วัน</span>
                        </div>
                      </div>
                    </div>
                </div>
                {{-- @foreach ($coursesdurations as $coursesduration) --}}

                <div class="col-12 col-md-4 bg-white">
                    <div class="show-payment bg-purple">
                        <p class="font-weight-bold">ด่วน</p>
                        <input type="hidden"  name="course_duration_id[]" value="">

                        <small class="_gray">ระยะเวลา</small>
                        <div class="input-group">                
                        <input type="text" class="form-control font-weight-bold _hilight" aria-label="Amount (to the nearest dollar)" name="course_duration[]" value="{{$courses->course_duration['1']}}">
                        <div class="input-group-append">
                          <span class="input-group-text bg-white font-weight-bold _hilight">วัน</span>
                        </div>
                        <div class="form-group">
                            <small class="_gray">แก้ไขราคา</small>
                        <input type="num" class="form-control _hilight font-weight-bold" id="editprice" name="course_duration_rate[]" value="{{$courses->course_duration_rate['1']}}">
                        </div>
                      </div>
                    </div>
                </div>
                {{-- @endforeach --}}
                <div class="col-12 col-md-4">
                    <div class="show-payment bg-purple">
                        <p class="font-weight-bold">ด่วนมาก</p>
                        
                        <small class="_gray">ระยะเวลา</small>
                        <div class="input-group">
                       
                        <input type="text" class="form-control font-weight-bold _hilight" aria-label="Amount (to the nearest dollar)" name="course_duration[]" value="{{$courses->course_duration['2']}}">
                        <div class="input-group-append">
                          <span class="input-group-text bg-white font-weight-bold _hilight">วัน</span>
                        </div>
                        <div class="form-group">
                            <small class="_gray">แก้ไขราคา</small>
                            <input type="num" class="form-control _hilight font-weight-bold" id="editprice" name="course_duration_rate[]" value="{{$courses->course_duration_rate['2']}}">
                        </div>
                      </div>
                    </div>
                </div>
                
              </div>
              <div class="col-12 text-right mb-5">
                <div class="flex-nowrap">
                <a href="{{route('designer.course', $designer->token)}}" class="btn _secondary-btn m-1">ย้อนกลับ

                    </a>
                    <button type="submit" class="btn _primary-black ">บันทึกข้อมูล</button>
                  </div>
              </div>
              
              
             
            </div>
            </div>
            
          </div>
        </div>
       </div>
    </div>

  <input type="hidden" name="id" value="{{$courses->id}}">
  <input type="hidden" name="designer_id" value="{{$courses->designer_id}}">

  </form>
</section>
@endsection
@section('content')
    
@endsection