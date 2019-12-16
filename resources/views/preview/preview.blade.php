@extends('layouts.app')
<body style="background: url('https://www.img.in.th/images/b30bc2bbaaf4d53f139fb99248fac1ec.jpg') no-repeat center center fixed; -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;">
    
</body>
@section('content')
<div class="container">

<div class="card mt-5" style="width:100%;margin-top: 150px !important;">		  
  <div class="card-body" >
    <h1 class="card-title text-center mt-5" style="color: #904AE8;">พรีวิวบรรจุภัณฑ์ดูสินค้าในแบบของคุณ</h1>
    <p class="card-text text-center">อัพโหลดรูปโลโก้ของคุณเพื่อดูบรรจุภัณฑ์ไฟล์ <br>.jpg, .png, .svg</p>
    
    <div class="boxup" style="margin-top: 100px;">
    <form action="/" class="dropzone dz-clickable mt-5" id="my-dropzone">
      <div class="dz-message d-flex flex-column mt-5 mb-4 text-center">	           
       <p>ลากไฟล์เพื่ออัพโหลด หรือ เลือก</p>
      </div>
    </form>
    </div>			   
  </div>
</div>

<center>
<a href="/previewmock"><button type="button" class="btn btn-lg mt-5 text-center" style="background-color:#904AE8; color: #fff; width: 500px;">อัพโหลดโลโก้ของคุณ</button></a>
</center>





    







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
