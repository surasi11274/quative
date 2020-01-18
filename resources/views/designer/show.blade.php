@extends('layouts.app')
@section('assets')
        <link rel="stylesheet" href="{{asset('css/style_match.css')}}">
@endsection
@section('content')
<section class="content mt_ex">
<div class="row">
    <div class="alert alert-success col-md-3 offset-md-8 alert-dissmissable position-absolute fade show" style="z-index: 1; transition: 0.6s;" role="alert">
    <button class="close" type="button" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
    กรอกข้อมูลเรียบร้อย
    </div>
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
new one
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
review
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
<div class="row mt-3 mb-5">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body ">
          <h1 class="card-title mt-5 text-center">ให้คะแนนนักออกแบบ</h1>
          <h3 class="mt-5 text-center"><i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i></h3>
          <h6 class="text-center">ภูมิใจนำเสนอ งานดีมาก</h6>
          <br>
         
          <!--Accordion wrapper-->
          <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

            <div class="card-body">
          
          <form>
                <div class="form-group mt-3">
                    <div id="result">
                  <label for="exampleFormControlTextarea1">หัวข้อรีวิว </label>
                  <span id="totalChars" style="float: right;">0</span>
                  <textarea class="form-control track" id="textcount" rows="3"></textarea>
                  </div>
                   <br/> 

                  
              </div>

              <div class="row">

                  <div class="col">
                      <label >ความพึงพอใจ</label>
                      <select class="track form-control">
                        <option value="">Choose One</option>
                        <option value="1">มากที่สุด</option>
                        <option value="2">มาก</option>
                        <option value="3">ปานกลาง</option>
                        <option value="4">น้อย</option>
                        <option value="5">น้อยมาก</option>
                      </select>
                  </div>

                  <div class="col">
                      <label >ความพึงพอใจ</label>
                      <select class="track form-control">
                        <option value="">Choose One</option>
                        <option value="1">มากที่สุด</option>
                        <option value="2">มาก</option>
                        <option value="3">ปานกลาง</option>
                        <option value="4">น้อย</option>
                        <option value="5">น้อยมาก</option>
                      </select>				    
                  </div>

                   <div class="col">
                      <label >ความพึงพอใจ</label>
                      <select class="track form-control">
                        <option value="">Choose One</option>
                        <option value="1">มากที่สุด</option>
                        <option value="2">มาก</option>
                        <option value="3">ปานกลาง</option>
                        <option value="4">น้อย</option>
                        <option value="5">น้อยมาก</option>
                      </select>				    
                  </div>

              </div> <!-- end row -->
              
                              

                </form>

                 <a href="prodesign.html"><button type="button " class="btn btn-dark btn-lg mt-5 mb-5 text-center" style="float: right;" >บันทึกรีวิว</button></a> 

                  </div>

               

              </div>
              <!-- Accordion wrapper -->
                </div>

                
              
              
          
      </div>
    </div>



        
        
    
</div>
</div>
</section>
@endsection