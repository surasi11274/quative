@extends('layouts.app')
<body style="background: url('https://s3-ap-southeast-1.amazonaws.com/img-in-th/37fc1223d177e68ff940f20754b659af.jpg') no-repeat center center fixed; -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;">
    <style>
      .bradius{
        border-radius:5px;
        /* border:solid px #000000; */
      }
   
    .bradius:hover
    {
      opacity: 0.3;
              border:solid 1px #000000;

      filter: alpha(opacity=30);
    }
    
    </style>
</body>
@section('content')
<div class="container">

<div class="card mt-5 shadow-sm" style="width:100%; height:auto; margin-top: 150px !important;">		  
  <div class="card-body" >
    <h1 class="card-title _hilight text-center mt-5" >ลองพรีวิวบรรจุภัณฑ์แบบต่างๆในรูปแบบ 3D</h1>
    {{-- <p class="card-text text-center">อัพโหลดรูปโลโก้ของคุณเพื่อดูบรรจุภัณฑ์ไฟล์ <br>.jpg, .png, .svg</p> --}}
    
    <div class="boxup mb-5" >
    {{-- <form action="/" class="dropzone dz-clickable mt-5" id="my-dropzone">
      <div class="dz-message d-flex flex-column mt-5 mb-4 text-center">	           
       <p>ลากไฟล์เพื่ออัพโหลด หรือ เลือก</p>
      </div>
    </form> --}}
    <div class="container">
      {{-- <div class="row">
        <div class="mx-auto">
          <button class="btn btn-outline-dark mt-1 font-weight-bold" style="background-color:white;">แพ็คเกจเครื่องสำอาง</button>
          <button class="btn btn-outline-dark mt-1 font-weight-bold" style="background-color:white;">แพ็คเกจประเภทถุง</button>
          <button class="btn btn-outline-dark mt-1 font-weight-bold" style="background-color:white;">แพ็คเกจประเภทแก้ว</button>
          <button class="btn btn-outline-dark mt-1 font-weight-bold" style="background-color:white;">แพ็คเกจประเภทกระป๋อง</button>
          <button class="btn btn-outline-dark mt-1 font-weight-bold" style="background-color:white;">แพ็คเกจประเภทขวด</button>
  
        </div> --}}
       
        <div class="row mt-5">
          <div class="col-4">
            <div class="text-center">
              <h5 class="_primary  ">แพ็คเกจเครื่องสำอาง</h5 >
            </div>
            <div class="row">
              <div class="col-6">
                <a style="text-decoration:none;" href="/preview/cosmetic" >
                  <img class="shadow-sm bradius" style="width:150px; height:200px; object-fit:cover;" src="../photo/model_pic/creamkapook.png" />
                  


                </a>
                
              </div>
              <div class="col-6">
                <a style="text-decoration:none;" href="/preview/cosmetic2" >
                  <img class="shadow-sm bradius" style="width:150px; height:200px; object-fit:cover;" src="../photo/model_pic/lotion.jpg" />
                </a>
              </div>

                
               
            </div>
          </div>
          <div class="col-4">
            <div class="text-center">
              <h5 class="_primary  ">แพ็คเกจประเภทถุง</h5 >
            </div>
            <div class="row">
              <div class="col-6">
                <a style="text-decoration:none;" href="/preview/bag" >
                  <img class="shadow-sm bradius" style=" width:150px; height:200px; object-fit:cover;" src="../photo/model_pic/bag.jpg" />
                </a>
              </div>
              <div class="col-6">
                <a style="text-decoration:none;" href="/preview/bag2" >
                  <img class="shadow-sm bradius" style=" width:150px; height:200px; object-fit:cover;" src="../photo/model_pic/chipbag.jpg" />
                </a>
              </div>

                
               
            </div>
          </div>

          <div class="col-4">
            <div class="text-center">
              <h5 class="_primary  ">แพ็คเกจประเภทแก้ว</h5 >
            </div>
            <div class="row">
              <div class="col-6">
                <a style="text-decoration:none;" href="/preview/cup" >
                  <img class="shadow-sm bradius" style="width:150px; height:200px; object-fit:cover;" src="../photo/model_pic/cup.jpg" />
                </a>
                
              </div>
              <div class="col-6">
                <a style="text-decoration:none;" href="/preview/cup2" >
                  <img class="shadow-sm bradius" style="width:150px; height:200px; object-fit:cover;" src="../photo/model_pic/coffeecup.jpg" />
                </a>
              </div>

                
               
            </div>
          </div>


          
        </div>
        <div class="row mt-5">
          <div class="col-4">
            <div class="text-center">
              <h5 class="_primary  ">แพ็คเกจประเภทกระป๋อง</h5 >
            </div>
            <div class="row">
              <div class="col-6">
                <a style="text-decoration:none;" href="/preview/can" >
                  <img class="shadow-sm bradius" style="width:150px; height:200px; object-fit:cover;" src="../photo/model_pic/sodacan.jpg" />
                </a>
                
              </div>
              <div class="col-6">
                <a style="text-decoration:none;" href="/preview/can2" >
                  <img class="shadow-sm bradius" style="width:150px; height:200px; object-fit:cover;" src="../photo/model_pic/foodcan.jpg" />
                </a>
              </div>

                
               
            </div>
          </div>
          <div class="col-4">
            <div class="text-center">
              <h5 class="_primary  ">แพ็คเกจประเภทขวด</h5 >
            </div>
            <div class="row">
              <div class="col-6">
                  
                <a style="text-decoration:none;" href="/preview/bottle" >
                  <img class="shadow-sm bradius" style="width:150px; height:200px; object-fit:cover;" src="../photo/model_pic/bottle1.jpg" />
                </a>
                
              </div>
              <div class="col-6">
                <a style="text-decoration:none;" href="/preview/bottle2" >
                  <img class="shadow-sm bradius" style="width:150px; height:200px; object-fit:cover;" src="../photo/model_pic/waterbottle.jpg" />
                </a>
              </div>

                
               
            </div>
          </div>

         


          
        </div>
        
        
     
        
      </div>
    </div>
    
    
    {{-- <button style="background: url('https://s3-ap-southeast-1.amazonaws.com/img-in-th/37fc1223d177e68ff940f20754b659af.jpg')">
      
    </button> --}}

    </div>			   
  </div>
</div>

{{-- <center>
<a href="/preview"><button type="button" class="btn btn-lg mt-5 text-center" style="background-color:#904AE8; color: #fff; width: 500px;">อัพโหลดโลโก้ของคุณ</button></a>
</center> --}}





    







</div>
<!-- END CONTAINER -->
@endsection
<script src="{{asset('js/dropzone.js')}}"></script>


<script type="text/javascript">
			$(function() {
			  $("#my-dropzone").dropzone({
			    // url: "/file/post", // If not using a form element
			  });

			});


		</script>
