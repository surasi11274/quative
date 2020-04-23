@extends('layouts.app')
@section('assets')
   <link rel="stylesheet" href="../css/_showjob.css">
@endsection
<body style="background: url('https://s3-ap-southeast-1.amazonaws.com/img-in-th/37fc1223d177e68ff940f20754b659af.jpg') no-repeat center center fixed; -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;">
    <style>
      .bradius{
        border-radius:5px;
        /* border:solid px #000000; */
        transition: 1s;
       
      }
   
    .bradius:hover{
      opacity: 0.3;
      /* border:solid 1px #000000; */
      transform: translate3d(0px, -10px, 0px);
      filter: alpha(opacity=30);
      transition: 1s;
    }
    
    </style>
</body>
@section('content')
<div class="container">

<div class="card mt-5 shadow-sm" style="width:100%; height:auto; margin-top: 150px !important;">		  
  <div class="card-body" >
    <h1 class="card-title _hilight text-center mt-5 d-none d-md-block" >ลองพรีวิวบรรจุภัณฑ์แบบต่างๆในรูปแบบ 3D</h1>
    <h3 class="card-title _hilight text-center mt-5 d-md-none" >ลองพรีวิวบรรจุภัณฑ์แบบต่างๆในรูปแบบ 3D</h3>
    {{-- <p class="card-text text-center">อัพโหลดรูปโลโก้ของคุณเพื่อดูบรรจุภัณฑ์ไฟล์ <br>.jpg, .png, .svg</p> --}}
    
    <div class="boxup mb-5" >
    {{-- <form action="/" class="dropzone dz-clickable mt-5" id="my-dropzone">
      <div class="dz-message d-flex flex-column mt-5 mb-4 text-center">	           
       <p>ลากไฟล์เพื่ออัพโหลด หรือ เลือก</p>
      </div>
    </form> --}}
    <div class="container">
      <div >
        <div class="row">
          <div class="col mt-5 mb-5">
            <h1 class="text-success">อัพโหลดเสร็จแล้วลองเข้าไปดูแพ็คเกจกับโลโก้ของคุณดูสิ</h1>
          </div>
        </div>
      </div>
      {{-- <div class="row">
        <div class="mx-auto">
          <button class="btn btn-outline-dark mt-1 font-weight-bold" style="background-color:white;">แพ็คเกจเครื่องสำอาง</button>
          <button class="btn btn-outline-dark mt-1 font-weight-bold" style="background-color:white;">แพ็คเกจประเภทถุง</button>
          <button class="btn btn-outline-dark mt-1 font-weight-bold" style="background-color:white;">แพ็คเกจประเภทแก้ว</button>
          <button class="btn btn-outline-dark mt-1 font-weight-bold" style="background-color:white;">แพ็คเกจประเภทกระป๋อง</button>
          <button class="btn btn-outline-dark mt-1 font-weight-bold" style="background-color:white;">แพ็คเกจประเภทขวด</button>
  
        </div> --}}
       
        <div class="row mt-3">
          <div class="col-12 col-md-4 ">
            <div class="text-center mt-3">
              <h5 class="_primary  ">แพ็คเกจเครื่องสำอาง</h5 >
            </div>
            <div class="row mt-3 mb-3">
              <div class="col-6">
                <a class="text-decoration" href="{{route('mock.cosmetic',$mockup->token)}}" >
                  <img class="shadow-sm bradius obj-img-preview" src="/photo/model_pic/creamkapook.png" />
                  


                </a>
                
              </div>
              <div class="col-6">
                <a class="text-decoration" href="{{route('mock.cosmetic2',$mockup->token)}}" >
                  <img class="shadow-sm bradius obj-img-preview" src="/photo/model_pic/lotion.jpg" />
                </a>
              </div>

                
               
            </div>
          </div>
          <div class="col-12 col-md-4 ">
            <div class="text-center mt-3">
              <h5 class="_primary  ">แพ็คเกจประเภทถุง</h5 >
            </div>
            <div class="row mt-3 mb-3">
              <div class="col-6">
                <a class="text-decoration" href="{{route('mock.bag',$mockup->token)}}" >
                  <img class="shadow-sm bradius obj-img-preview" src="/photo/model_pic/bag.jpg" />
                </a>
              </div>
              <div class="col-6">
                <a class="text-decoration" href="{{route('mock.bag2',$mockup->token)}}" >
                  <img class="shadow-sm bradius obj-img-preview" src="/photo/model_pic/chipbag.jpg" />
                </a>
              </div>

                
               
            </div>
          </div>

          <div class="col-12 col-md-4 ">
            <div class="text-center mt-3">
              <h5 class="_primary  ">แพ็คเกจประเภทแก้ว</h5 >
            </div>
            <div class="row mt-3 mb-3">
              <div class="col-6">
                <a class="text-decoration" href="{{route('mock.cup',$mockup->token)}}" >
                  <img class="shadow-sm bradius obj-img-preview" src="/photo/model_pic/cup.jpg" />
                </a>
                
              </div>
              <div class="col-6">
                <a class="text-decoration" href="{{route('mock.cup2',$mockup->token)}}" >
                  <img class="shadow-sm bradius obj-img-preview" src="/photo/model_pic/coffeecup.jpg" />
                </a>
              </div>

                
               
            </div>
          </div>


          
        </div>
        <div class="row mt-3">
          <div class="col-12 col-md-4">
            <div class="text-center mt-3">
              <h5 class="_primary  ">แพ็คเกจประเภทกระป๋อง</h5 >
            </div>
            <div class="row mt-3 mb-3">
              <div class="col-6">
                <a class="text-decoration" href="{{route('mock.can',$mockup->token)}}" >
                  <img class="shadow-sm bradius obj-img-preview" src="/photo/model_pic/sodacan.jpg" />
                </a>
                
              </div>
              <div class="col-6">
                <a class="text-decoration" href="{{route('mock.can2',$mockup->token)}}" >
                  <img class="shadow-sm bradius obj-img-preview" src="/photo/model_pic/foodcan.jpg" />
                </a>
              </div>

                
               
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="text-center mt-3">
              <h5 class="_primary  ">แพ็คเกจประเภทขวด</h5 >
            </div>
            <div class="row mt-3 mb-3">
              <div class="col-6">
                  
                <a class="text-decoration" href="{{route('mock.bottle',$mockup->token)}}" >
                  <img class="shadow-sm bradius obj-img-preview"  src="/photo/model_pic/bottle1.jpg" />
                </a>
                
              </div>
              <div class="col-6">
                <a class="text-decoration" href="{{route('mock.bottle2',$mockup->token)}}" >
                  <img class="shadow-sm bradius obj-img-preview"  src="/photo/model_pic/waterbottle.jpg" />
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
<script>
  updateList = function() {
    var input = document.getElementById('file');
    var output = document.getElementById('fileList');
  
    output.innerHTML = '<ul>';
    for (var i = 0; i < input.files.length; ++i) {
      output.innerHTML += '<li class="nav-link over-wrap"><i class="fas fa-file-import icon mr-5 _gray"></i>' + input.files.item(i).name + '</li>';
    }
    output.innerHTML += '</ul>';
  }
  
  </script>
  <script src="{{asset('js/file-upload-with-preview.js')}}"></script>