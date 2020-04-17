@extends('layouts.app')
@section('assets')
        <link rel="stylesheet" href="{{asset('css/style_match.css')}}">
        <link rel="stylesheet" href="{{asset('css/_rating.css')}}">
@endsection
@section('content')
<section class="content mt-5">
{{-- <div class="row">
    <div class="alert alert-success col-md-3 offset-md-8 alert-dissmissable position-absolute fade show" style="z-index: 1; transition: 0.6s;" role="alert">
    <button class="close" type="button" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
    กรอกข้อมูลเรียบร้อย
    </div>
</div> --}}
<div class="container ">
    {{-- <div class="text-center p-5">
        <h1><span class="_hilight">โปรไฟล์ของคุณ</span></h1>
        <p>
            กรอกข้อมูลเสร็จแล้วกรุณาตรวจข้อมูลให้ครบถ้วนเพื่อที่เราจะได้หาผู้ประกอบการที่<br>
            ใช่ที่สุดสำหรับคุณ
        </p>
    </div>
    Review         --}}
{{-- @foreach ($designer as $designers)

<div class="container">		
    <div class="row mt-3">

      <div class="col-4">
          <div class="card" style="padding-bottom: 45px; background-color: #000;" >
              <div class="profile-img text-center mt-5" >
                <img id="profileImage" class="rounded-circle" src="/{{$designers->profilepic}}" style="width:120px;height:120px;margin:auto;"/>
            </div>
              <h5 class="titlename text-center text-white mt-5">{{$designers->name}} {{$designers->surname}}</h5>
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
                @foreach($designers->tag as $tagn)

                        @php
                        $tagname = \App\Tags::find($tagn)->tagName;
                        @endphp
                                    <h5 class="btn text-white" style="background-color: #523EE8;" for="">

                    {{$tagname}}
                </h5>
                @endforeach
            </h5>
          </div>
        </div>				  	
      

    </div>
</div>
@endforeach --}}


<div class="row mt-3 mb-5">
    

    <div class="col-12 col-lg-12">
      <div class="shadow-sm">
        <div class="card-body bg-white">
            @foreach ($designer as $designers)
        
            <div class="col text-center">
                <h1 class="mt-5">เขียนรีวิวนักออกแบบ</h1>
                <div class="profile-img text-center mt-5" >
                    <img id="profileImage" class="rounded-circle" src="/{{$designers->profilepic}}" style="width:120px;height:120px;margin:auto;"/>
                </div>
                <h5 class="titlename text-center mt-5 pb-5" style="color:black;">{{$designers->name}} {{$designers->surname}}</h5>

            </div>
            @endforeach
            <hr>
          <h2 class="card-title mt-5 text-center">ให้คะแนนนักออกแบบ</h2>
          {{-- <h3 class="mt-5 text-center"><i class="fas fa-star star1" id="">
              </i><i class="fas fa-star star1"></i>
              <i class="fas fa-star star1"></i>
              <i class="fas fa-star star1"></i>
              <i class="fas fa-star star1"></i>
          </h3> --}}          
          <form action="/reviewjob/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
          {{-- <div class="rating"><!--
  --><input name="stars" id="e5" type="radio" value="1"></a><label for="e5">★</label><!--
		--><input name="stars" id="e4" type="radio" value="2"></a><label for="e4">★</label><!--
		--><input name="stars" id="e3" type="radio" value="3"></a><label for="e3">★</label><!--
		--><input name="stars" id="e2" type="radio" value="4"></a><label for="e2">★</label><!--
		--><input name="stars" id="e1" type="radio" value="5"></a><label for="e1">★</label>
    </div> --}}
            <fieldset class="rating">
               
                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"><i class="fas fa-star"></i></label>
                        {{-- <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> --}}
                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"><i class="fas fa-star"></i></label>
                        {{-- <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> --}}
                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"><i class="fas fa-star"></i></label>
                        {{-- <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> --}}
                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"><i class="fas fa-star"></i></label>
                        {{-- <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> --}}
                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"><i class="fas fa-star"></i></label>
                        {{-- <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> --}}
               
            </fieldset>
      
            
          {{-- <h6 class="text-center">ภูมิใจนำเสนอ งานดีมาก</h6> --}}
          <br>
         
          <!--Accordion wrapper-->
          <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

            <div class="card-body">
          
                <div class="form-group mt-3">
                    <div id="result">
                  <label for="exampleFormControlTextarea1">ข้อความเพิ่มเติม </label>
                    {{-- <span id="totalChars" style="float: right;">0</span> --}}
                  <textarea class="form-control track" id="textcount" rows="3" name="reviewdescription"></textarea>
                  </div>
                   <br> 

                  
              </div>

              <div class="row">

                  <div class="col-12 col-md-4">
                      <label >ความพึงพอใจ</label>
                      <select class="track form-control" name="complacency">
                        <option value="">Choose One</option>
                        <option value="1">มากที่สุด</option>
                        <option value="2">มาก</option>
                        <option value="3">ปานกลาง</option>
                        <option value="4">น้อย</option>
                        <option value="5">น้อยมาก</option>
                      </select>
                  </div>

                  <div class="col-12 col-md-4">
                      <label >ราคาเหมาะสมกับคุณภาพ</label>
                      <select class="track form-control" name="reasonableprice">
                        <option value="">Choose One</option>
                        <option value="1">มากที่สุด</option>
                        <option value="2">มาก</option>
                        <option value="3">ปานกลาง</option>
                        <option value="4">น้อย</option>
                        <option value="5">น้อยมาก</option>
                      </select>				    
                  </div>

                   <div class="col-12 col-md-4">
                      <label >ฝีมือและความเชี่ยวชาญ</label>
                      <select class="track form-control" name="skillandexpertise">
                        <option value="">Choose One</option>
                        <option value="1">มากที่สุด</option>
                        <option value="2">มาก</option>
                        <option value="3">ปานกลาง</option>
                        <option value="4">น้อย</option>
                        <option value="5">น้อยมาก</option>
                      </select>				    
                  </div>
                
                      <div class="col"></div>
                      <div class="col-12 col-md-4">
                        <button type="submit  " class="btn _primary-black btn-block btn-lg m-1 mt-5"  >บันทึกรีวิว</button>
                      </div>
                      <div class="col"></div>
                  
                    
                    

                  

              </div>
            </div>
          </div>
          <input hidden  type="text" id="jobs_id" name="jobs_id" value="{{$jobs->id}}">
          <input hidden type="text" id="designer_id" name="designer_id" value="{{$jobs->designer_id}}">
          <input hidden type="text" id="user_id" name="user_id" value="{{$jobs->user_id}}">
          </form>
     
        

                 {{-- <a href="prodesign.html"> --}}
                    {{-- </a>  --}}

                  </div>

                  {{-- <input type="text" id="output" name="jobstatus_id"> --}}
                



              </div>
              <!-- Accordion wrapper -->
                </div>

                
              
              
          
      </div>
    </div>



        
        
    
</div>
</div>
</div>
{{-- new one
@foreach ($designer as $designers)

<div class="container">		
    <div class="row mt-3">
        
      <div class="col-4">
          <div class="card" style="padding-bottom: 45px; background-color: #000;" >
              <div class="profile-img text-center mt-5" style="width:120px;height:120px;margin:auto;">
                <img id="profileImage" class="rounded-circle" src="/{{$designers->profilepic}}" />
            </div>
              <h5 class="text-center mt-5 text-white">ปลายฟ้า เป็นตาธรรม</h5>
              <h5 class="titlename text-center text-white mt-5">{{$designers->name}} {{$designers->surname}}</h5>
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
                @foreach($designers->tag as $tagn)

                        @php
                        $tagname = \App\Tags::find($tagn)->tagName;
                        @endphp
                    <h5 class="btn text-white" style="background-color: #523EE8;" for="">
                        {{$tagname}}
                </h5>
                @endforeach
            </h5>
          </div>
        </div>				  	
      

    </div>
</div>
@endforeach --}}
{{-- 
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

</div> --}}

	
	
	


</section>
@endsection
<script>
    function addCart(v){
        document.getElementById('jobs_id').value = v
        // document.getElementById('output1').value = v
        // document.getElementById('outputCancel').value = v

        document.getElementById('user_id').value = v

        document.getElementById('designer_id').value = v
        console.log(v);
        return false;
    }

 
</script>