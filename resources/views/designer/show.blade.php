@extends('layouts.app')
@section('assets')
        <link rel="stylesheet" href="{{asset('css/style_match.css')}}">
@endsection
@section('content')
<section class="content mt_ex">

<div class="container">		
    <div class="row mt-3">
        
      <div class="col-4">
          <div class="card" style="padding-bottom: 45px; background-color: #000;" >
              <div class="profile-img text-center mt-5" style="width:120px;height:120px;margin:auto;">
                <img id="profileImage" class="rounded-circle" src="/{{$designer->profilepic}}" />
            </div>
              {{-- <h5 class="text-center mt-5 text-white">ปลายฟ้า เป็นตาธรรม</h5> --}}
              <h5 class="titlename text-center text-white mt-5">{{$designer->name}} {{$designer->surname}}</h5>
            <p class="mt text-center"><i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><span class="text-white">  (4.9)</span></p>
            <center><button type="button" class="btn btn-outline-light text-center mb-5">ติดตาม</button></center>
          </div>
          

      </div>

      <div class="col-8">
          			
          <div class="card-body">

              <div class="row">
              <div class="col-3">
            <h5 >ข้อมูลเบื้องต้น</h5>
            <p>เป็นสมาชิกเมื่อ </p>
            <p>ออกแบบงานเมื่อ</p>
            <p>อัตรางานสำเร็จ</p>
            </div>

            <div class="col-3">
            <h5 >  .</h5>
            <p>xxxxxxxx </p>
            <p>xxxxxxxx</p>
            <p>xxxxxxxx</p>
            </div>

            <div class="col">
            <h5>ยืนยันตัวตน</h5>
            <p><i class="fas fa-envelope-square"></i>  อีเมล   <i class="fas fa-check" style="color: #523EE8;"></i></p> 
            <p><i class="fas fa-id-card"></i>  ประชาชน   <i class="fas fa-check" style="color: #523EE8;"></i></p>
            <p><i class="fas fa-phone-square-alt"></i>  เบอร์โทรศัพท์   <i class="fas fa-check" style="color: #523EE8;"></i></p>
            </div>
            </div>

            <hr>

            <h5 >ข้อมูลเบื้องต้น</h5>
            <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            <hr>
            <h5 >Tag</h5>
            <h5 class="btn text-white" style="background-color: #523EE8;" for="">
                @foreach($designer->tag as $tagn)

                    @php
                    $tagname = \App\Tags::find($tagn)->tagName;
                    @endphp
                    {{$tagname}},
                </h5>
                @endforeach
            </h5>
          </div>
        </div>				  	
      

    </div>
</div>
<div class="container">
<div class="row mt-3">
      <div class="col-4">
          
          <div class="card" style="padding-bottom: 45px;">
              <div class="card-body">
                  <h5 class="mt-3">รีวิวจากผู้ประกอบการ</h5>

                      <div class="row">

                      
                      <div class="col-2">
                          <div class="profile-img2 mt-3">
                         <img class="rounded-circle" src="https://i.pinimg.com/originals/73/1c/ed/731ced24d44459831ec166492257fa45.jpg" alt=""/>
                        </div>
                    </div>

                    <div class="col">

                      <h5 class="mt-3">เจตผล <span><i class="fas fa-star star1" style="float: right;"> 
                          <span style="color: #000;">(4.9)</span></i> </span></h5>
                          <p class="text-black-50">วันที่รีวิว 07/12/2019</p>
                    </div>
                    </div>
                    <h5 class="mt-3">ทำงานตรงใจเราเลย</h5>
                    <hr>
                    <!-- comment -->

                    <div class="row">

                      <!-- comment -->
                      <div class="col-2">
                          <div class="profile-img2 mt-3">
                         <img class="rounded-circle" src="https://i.pinimg.com/originals/73/1c/ed/731ced24d44459831ec166492257fa45.jpg" alt=""/>
                        </div>
                    </div>

                    <div class="col">

                      <h5 class="mt-3">ชาช่า <span><i class="fas fa-star star1" style="float: right;"> 
                          <span style="color: #000;">(4.9)</span></i> </span></h5>
                          <p class="text-black-50">วันที่รีวิว 07/12/2019</p>
                    </div>
                    </div>
                    <h5 class="mt-3">ทำงานตรงใจเราเลย</h5>
                    <hr>
                    <!-- comment -->





              </div>
          </div>
</div>

<div class="col-8">
          <div class="card">					
          <div class="card-body">
              <h5 class="mt-3">ผลงานบรรณจุภันฑ์ (8)</h5>
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <h2 class="selectfillter ">  ผลงานบรรณจุภันฑ์ (<small>8</small>)</h2>
                    <div class="overflow-gallery grid-gallery">
                    <div class="row">
                        <div class="col-7 mt-3">
                            <img class="rounded"  style=" object-fit: cover;"src="/photo/@product-8.png" />
                        </div>
                        <div class="col-5 mt-3">
                            <img class="rounded" style=" object-fit: cover;"src="/photo/@product-7.png" />
                        </div>
    
                        <div class="col-5 mt-3">
                            <img class="rounded"  style=" object-fit: cover;"src="/photo/@product-3.png" />
                        </div>
                        <div class="col-7 mt-3">
                            <img class="rounded" style=" object-fit: cover;"src="/photo/@product-4.png" />
                        </div>
                        <div class="col-7 mt-3">
                            <img class="rounded"  style=" object-fit: cover;"src="/photo/@product-6.png" />
                        </div>
                        <div class="col-5 mt-3">
                            <img class="rounded" style=" object-fit: cover;"src="/photo/@product-5.png" />
                        </div>
    
                        <div class="col-5 mt-3">
                            <img class="rounded"  style=" object-fit: cover;"src="/photo/@product-1.png" />
                        </div>
                        <div class="col-7 mt-3">
                            <img class="rounded" style=" object-fit: cover;"src="/photo/@product-2.png" />
                        </div>
    
                    </div>
                    </div>
    
                </div>
              </div>
              
          </div>
        </div>
    </div>

</div>

</section>
@endsection