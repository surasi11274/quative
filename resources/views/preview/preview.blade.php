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
            <div class="row">
              <button type="button" class="mx-auto btn _primary-btn btn-lg" data-toggle="modal" data-target=".bd-example-modal-lg">อัพโหลดโลโก้</button>

            </div>
        <form action="/preview/store" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content p-2 p-md-5">

                      {{-- <div class="modal-header " style="text-align:center;">
                      <h1 class="modal-title "  id="myLargeModalLabel">อัพโหลดไฟล์งาน</h1>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                      </div> --}}
                      <div class="modal-body">
                          {{-- <h2 class="selectfillter pt-5 text-left"  style="font-weight: 800;">แนบรูปภาพผลิตภัณฑ์เดิมของคุณ</h2> --}}
                          <div class="row">
                              <div class="col-12">
                                      <br>
                                      <div class="row">
                                          <h5 class="text-left font-weight-bold ">อัพโหลดภาพ logo เพื่อพรีวิว (1 ภาพ)</h5>
                                      </div>                                                    
                                      <div class="row">
                                          <small class="text-left text-success">*ภาพโลโก้จะทำงานได้เต็มประสิทธิภาพหากเป็นไฟล .jpg </small>
                                          
                                 
                                          <div class="col-12 text-left">
                                              <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                                  <label><a href="javascript:void(0)" class="custom-file-container__image-clear" hidden title="Clear Image">&times;</a></label>
                                                  <label class="custom-file-container__custom-file" >
                                                      <input type="file" class="custom-file-container__custom-file__custom-file-input" name="logo" accept="*" multiple aria-label="Choose File">
                                                      <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                      <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                  </label>
                                                  <div class="custom-file-container__image-preview">
                                                      <div class="col-3">
              
                                                      </div>
                                                  </div>
                                              </div>
                                              </div>    
                                              
                                     

                                         
                                           
                              </div>
                             
 
                              
                              
                            
                          </div>

                         
                      </div>
                      {{-- <input type="text" id="output" name="jobstatus_id"> --}}
                      <div class="modal-footer">
                          <div class="row mt-5 ">
                              <div class="col">
                                  <button type="button" class="btn _secondary-btn btn-lg btn-block" data-dismiss="modal">ยกเลิก</button>
                              </div>
                              <div class="col">
                                  <button type="submit" class="btn _primary-black btn-lg btn-block">อัพโหลด</button>

                              </div>
                         
                      </div>
                      </div>
                       {{-- <input hidden type="text" id="job_id" name="job_id" value="{{$job->id}}">
                      <input hidden type="text" id="designer_id" name="designer_id" value="{{$job->designer_id}}">
                      <input hidden type="text" id="user_id" name="user_id" value="{{$job->user_id}}"> --}}
                    
                         
                       
                  </div>
              </div>
          </div>
      </form>
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
        {{-- <div class="row"> --}}
          <hr >
        {{-- </div> --}}
        <div class="row mt-5">
          
          <div class="col-12 col-md-4 ">
            <div class="text-center mt-3">
              <h5 class="_primary  font-weight-bold">แพ็คเกจเครื่องสำอาง</h5 >
            </div>
            <div class="row mt-3 mb-3">
              <div class="col-6">
                <a class="text-decoration" href="/preview/cosmetic" >
                  <img class="shadow-sm bradius obj-img-preview" src="../photo/model_pic/creamkapook.png" />
                  


                </a>
                
              </div>
              <div class="col-6">
                <a class="text-decoration" href="/preview/cosmetic2" >
                  <img class="shadow-sm bradius obj-img-preview" src="../photo/model_pic/lotion.jpg" />
                </a>
              </div>

                
               
            </div>
          </div>
          <div class="col-12 col-md-4 ">
            <div class="text-center mt-3">
              <h5 class="_primary  font-weight-bold">แพ็คเกจประเภทถุง</h5 >
            </div>
            <div class="row mt-3 mb-3">
              <div class="col-6">
                <a class="text-decoration" href="/preview/bag" >
                  <img class="shadow-sm bradius obj-img-preview" src="../photo/model_pic/bag.jpg" />
                </a>
              </div>
              <div class="col-6">
                <a class="text-decoration" href="/preview/bag2" >
                  <img class="shadow-sm bradius obj-img-preview" src="../photo/model_pic/chipbag.jpg" />
                </a>
              </div>

                
               
            </div>
          </div>

          <div class="col-12 col-md-4 ">
            <div class="text-center mt-3">
              <h5 class="_primary  font-weight-bold">แพ็คเกจประเภทแก้ว</h5 >
            </div>
            <div class="row mt-3 mb-3">
              <div class="col-6">
                <a class="text-decoration" href="/preview/cup" >
                  <img class="shadow-sm bradius obj-img-preview" src="../photo/model_pic/cup.jpg" />
                </a>
                
              </div>
              <div class="col-6">
                <a class="text-decoration" href="/preview/cup2" >
                  <img class="shadow-sm bradius obj-img-preview" src="../photo/model_pic/coffeecup.jpg" />
                </a>
              </div>

                
               
            </div>
          </div>


          
        </div>
        <div class="row mt-3">
          <div class="col-12 col-md-4">
            <div class="text-center mt-3">
              <h5 class="_primary  font-weight-bold">แพ็คเกจประเภทกระป๋อง</h5 >
            </div>
            <div class="row mt-3 mb-3">
              <div class="col-6">
                <a class="text-decoration" href="/preview/can" >
                  <img class="shadow-sm bradius obj-img-preview" src="../photo/model_pic/sodacan.jpg" />
                </a>
                
              </div>
              <div class="col-6">
                <a class="text-decoration" href="/preview/can2" >
                  <img class="shadow-sm bradius obj-img-preview" src="../photo/model_pic/foodcan.jpg" />
                </a>
              </div>

                
               
            </div>
          </div>
          
          <div class="col-12 col-md-4">
            <div class="text-center mt-3">
              <h5 class="_primary  font-weight-bold">แพ็คเกจประเภทขวด</h5 >
            </div>
            <div class="row mt-3 mb-3">
              <div class="col-6">
                  
                <a class="text-decoration" href="/preview/bottle" >
                  <img class="shadow-sm bradius obj-img-preview"  src="../photo/model_pic/bottle1.jpg" />
                </a>
                
              </div>
              <div class="col-6">
                <a class="text-decoration" href="/preview/bottle2" >
                  <img class="shadow-sm bradius obj-img-preview"  src="../photo/model_pic/waterbottle.jpg" />
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