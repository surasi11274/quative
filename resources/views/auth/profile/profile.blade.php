@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="css/_designer.css">
    <link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
@endsection
@section('content')
<!-- multistep form -->
<div class="container">
    <form  action="/profile/store" method="post" enctype="multipart/form-data" class="msform " >
        {{ csrf_field() }}
            
            <!-- fieldsets -->
           <div class="bg-white" style="height:110%;">
                    <div class="text-center p-5">
                        <h1 for="" class="_hilight">เกี่ยวกับคุณ</h1>
                        <h5 class="_gray mb-5">ระบุข้อมูลการจ้างงานเกี่ยวกับคุณเพื่อการสื่อสารรับงานที่ง่ายขึ้น</h5>
                       <div class="container ml-md-4">
                           <img id="blah" class="rounded-circle" src="../photo/preprofile.png" alt="your image" style="width: 180px; height: 180px; border: 2px solid #523EE8; object-fit:cover;"/>

                           <div class="upload-btn-wrapper">
                               <button class="_btn-upload rounded-ex"><i class="fas fa-user-edit"></i></button>
                               <input  name="profilepic"  type="file" id="imgInp"/>
                           </div>
                       </div>
                       <p class="mt-md-4 mb-md-5 _hilight">*รูปโปรไฟล์นักออกแบบต้องใช้ภาพถ่ายตัวจริง <br>
                        ที่เห็นใบหน้าของคุณชัดเจน*</p>

                    </div>

            

               
                    
           
                
                <div class="form-row pl-md-5 pr-md-5">
                    <div class="form-group dropdown col-12 col-md-3">
                      <h5 class="font-weight-bold" for="due">   <i class="fas fa-venus-mars icon"></i>  คำนำหน้าชื่อ</h5>
                        <select class="form-control" name="titleName" id="month" >
                                    <option selected="selected" value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                    </div>
                    <div class="form-group col-12 col-md-5">
                        <h5 class="font-weight-bold" for="inputUsername">ชื่อ</h5>
                            <input type="text" class="form-control" placeholder="กรอกชื่อของคุณ" name="name">
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <h5 class="font-weight-bold" for="inputUsername">นามสกุล</h5>
                            <input type="text" class="form-control" placeholder="กรอกนามสกุลของคุณ" name="surname">
                    </div>
                   
                  
                   
                    
                </div>
                <div class="form-row pl-md-5 pr-md-5">
                    <div class="form-group col-md-6">
                        <h5 class="font-weight-bold" for="inputUsername"><i class="fas fa-calendar-week icon"></i> วันเกิดของคุณ</h5> 
                          <input class="form-control" type="date" id="basicDate" name="birthdate"  placeholder="Ex.00/00/0000" data-input>
                    </div>
                 
                    <div class="form-groupcol-md-6 pr-md-5 mb-3">
                      <h5 class="font-weight-bold" for="inputUsername">  <i class="fas fa-phone icon"></i> เบอร์โทรศัพท์</h5>
                          <input type="tel"  class="form-control" placeholder="เบอร์โทรศัพท์" name="phonenumber" max="1234567890"  >
                          <small class="_gray">ex. 092-xxx-xxxx</small>
                    </div>
          
                </div>
              
              
            
           
               
                <!-- <div class="form-group pl-5 pr-5">
                    <label for="inputUsername">ราคาที่ต้องการจะได้รับ 1:ชิ้นงาน </label>
                    <div class="input-icons">
                        <i class="fas fa-dollar-sign icon"></i>
                        <input type="text" class="form-control" name="pricerate" >
                    </div>
                </div> -->
                
              
               

               
                <input type="submit" name="submit" class="submit  _primary-black  btn-block rounded btn-lg" value="เสร็จสิ้น" style="margin-top:50px; margin-right:50px; width:20%; right:0; position:absolute;"/>
                <input type="button" name="previous" class="previous _secondary-btn  btn-block rounded btn-lg" value="ย้อนกลับ" style="margin-top:50px; margin-right:280px; width:20%; float: left; right:0; position:absolute;"/>
               
               {{-- <input type="button" name="previous" style="background-color:#ff3957
        ;" class=" previous action-button btn-block btn-lg  rounded" value="Previous"/>
                <button type="submit" name="submit" class="submit action-button" value="Submit"> Submit</button> --}}

            </div>

        </form>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    // $(document).ready(function () {
    //
    //     $(document).on("click", ".remove_field", function () {
    //         $(this).parent().parent().remove();
    //     });
    //
    //     function previewImages() {
    //
    //         var $preview = $('#preview').empty();
    //         if (this.files) $.each(this.files, readAndPreview);
    //
    //         function readAndPreview(i, file) {
    //
    //             if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
    //                 return alert(file.name + " is not an image");
    //             } // else...
    //
    //             var reader = new FileReader();
    //
    //             $(reader).on("load", function () {
    //                 $preview.append($("<img/>", {src: this.result , style:'height: 200px;object-fit: cover;padding:5px;'}));
    //             });
    //
    //             reader.readAsDataURL(file);
    //         }
    //     }
    //
    //     $('#input_img').on("change", previewImages);
    //
    //
    // });

</script>
{{-- <script src="{{asset('js/flatpickr.js')}}"></script>  --}}
