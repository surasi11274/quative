@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="css/_designer.css">
    <link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
@endsection
@section('content')
<div class="container">
    <section class="real sr-only">
        {{--<div class="row justify-content-center " >--}}
            {{--<div class="container modal-lg rounded-ex">--}}
                {{--<form action="/designer/store" method="post" enctype="multipart/form-data">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<div class="card" style="width:100%;">--}}
                        {{--<center>--}}
                            {{--<div class="rec pt-5">--}}
                                {{--<h1 class="titlename">กรอกข้อมูลผู้ใช้งาน</h1>--}}

                            {{--</div>--}}
                        {{--</center>--}}
                        {{--<div class="card-body" >--}}

                            {{--<div class="container p-5">--}}



                                {{--<!-- <div class="form-row"> -->--}}
                                {{--<!-- <div class="col-md-6"></div> -->--}}
                                {{--<!-- <div class="form-group ">--}}
                                    {{--<label for="inputEmail">Email</label>--}}
                                    {{--<input type="email" class="form-control" id="inputEmail" >--}}

                                {{--</div> -->--}}
                                {{--<!-- <div class="col-md-2"></div> -->--}}
                                {{--<!-- </div> -->--}}
                                {{--<!-- <div class="form-group">--}}
                                    {{--<label for="inputPassword">Passwords</label>--}}
                                    {{--<input type="text" class="form-control" id="inputPassword" >--}}
                                {{--</div>--}}


                                {{--<div class="form-group">--}}
                                    {{--<label for="inputUsername">Username</label>--}}
                                    {{--<input type="text" class="form-control"  >--}}
                                {{--</div> -->--}}

                                {{--<div class="row justify-content-center">--}}
                                    {{--<h1 for="">กรอกข้อมูลเกี่ยวกับคุณ</h1>--}}

                                {{--</div>--}}


                                {{--<div class="form-group">--}}
                                    {{--<div id="preview"></div>--}}

                                    {{--<div class="form-group">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="due" class="control-label" >Profile Pic</label>--}}
                                            {{--<input type="file" class="form-control" id="input_img" name="profilepic">--}}
                                        {{--</div>--}}

                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<label for="inputUsername">Description</label>--}}
                                    {{--<input type="text" class="form-control"  name="description">--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<label for="inputUsername">Phone Number</label>--}}
                                    {{--<input type="number" class="form-control"  name="phonenumber">--}}
                                {{--</div>--}}





                                {{--<div class="form-group">--}}

                                    {{--<label for="inputUsername">Tag</label>--}}
                                    {{--<div class="row">--}}
                                    {{--@foreach ($tags as $tag)--}}
                                        {{--<!-- <h1>{{$tag->nameTag}}</h1> -->--}}

                                            {{--<div class="form-check">--}}
                                                {{--<!-- <li> -->--}}
                                                {{--<input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tag[]">--}}
                                                {{--<label  class="form-check-label" for="tagName">{{$tag->tagName}}</label>--}}
                                                {{--<!-- </li> -->--}}
                                            {{--</div>--}}

                                        {{--@endforeach--}}
                                    {{--</div>--}}
                                {{--</div>--}}


                                {{--<div class="row justify-content-center">--}}
                                    {{--<h1 for="">กรอกข้อมูลบัตรประชาชน</h1>--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<label for="inputUsername">Personal ID</label>--}}
                                    {{--<input type="number" class="form-control"  name="personalID">--}}
                                {{--</div>--}}

                                {{--<div class="form-group dropdown">--}}
                                    {{--<label for="due" >Photo Personal ID</label>--}}

                                    {{--<select class="form-control" name="titlename" id="month" >--}}
                                        {{--<option selected="selected" value="นาย">นาย</option>--}}
                                        {{--<option value="นาง">นาง</option>--}}
                                        {{--<option value="นางสาว">นางสาว</option>--}}

                                    {{--</select>--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}

                                    {{--<div class="form-group">--}}
                                        {{--<label for="inputUsername">Name</label>--}}
                                        {{--<input type="text" class="form-control"  name="name">--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group">--}}
                                        {{--<label for="inputUsername">Surname</label>--}}
                                        {{--<input type="text" class="form-control"  name="surname">--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<label for="inputUsername">Birth Date</label>--}}
                                    {{--<input type="date" class="form-control"  name="birthdate">--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<label for="inputUsername">Address</label>--}}
                                    {{--<input type="text" class="form-control"  name="address">--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<label for="inputUsername">Zip Code</label>--}}
                                    {{--<input type="text" class="form-control" name="zipcode" >--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<label for="due" >Photo Personal ID</label>--}}

                                    {{--<div class="form-group">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="due" class="control-label" >Selfie</label>--}}
                                            {{--<input type="file" class="form-control" name="selfieID">--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="due" class="control-label" >Personal ID Card</label>--}}
                                            {{--<input type="file" class="form-control" name="pictureIDCard">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="row justify-content-center">--}}
                                    {{--<h1 for="">กรอกข้อมูลบัญชี</h1>--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<label for="inputUsername">Price Rate </label>--}}
                                    {{--<input type="text" class="form-control" name="pricerate" >--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<label for="inputUsername">Bank </label>--}}
                                    {{--<input type="text" class="form-control"  name="bankname">--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<label for="inputUsername">Bank Account</label>--}}
                                    {{--<input type="number" class="form-control"  name="bankaccount">--}}
                                {{--</div>--}}

                                {{--<!-- <div class="form-group">--}}
                                    {{--<label for="due" >Pictures of Book Bank</label>--}}

                                    {{--<div class="form-group ">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="due" class="control-label" >Selfie</label>--}}
                                            {{--<input type="file" class="form-control" name="picture_bookbank">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div> -->--}}

                                {{--<!-- <div class="form-group">--}}
                                    {{--<label for="inputUsername">Name</label>--}}

                                    {{--<select class="custom-select" required>--}}
                                    {{--<option value="">Open this select menu</option>--}}
                                    {{--<option value="1">One</option>--}}
                                    {{--<option value="2">Two</option>--}}
                                    {{--<option value="3">Three</option>--}}
                                    {{--</select>--}}
                                    {{--<div class="invalid-feedback">Example invalid custom select feedback</div>--}}
                                {{--</div> -->--}}

                                {{--<!-- <div class="form-row">--}}
                                    {{--<div class="form-group col-md-6">--}}
                                    {{--<label for="inputCity">City</label>--}}
                                    {{--<input type="text" class="form-control" id="inputCity">--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group col-md-4">--}}
                                    {{--<label for="inputState">State</label>--}}
                                    {{--<select id="inputState" class="form-control">--}}
                                        {{--<option selected>Choose...</option>--}}
                                        {{--<option>...</option>--}}
                                    {{--</select>--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group col-md-2">--}}
                                    {{--<label for="inputZip">Zip</label>--}}
                                    {{--<input type="text" class="form-control" id="inputZip">--}}
                                    {{--</div>--}}
                                {{--</div> -->--}}
                                {{--<!-- <div class="form-group">--}}
                                    {{--<div class="form-check">--}}
                                    {{--<input class="form-check-input" type="checkbox" id="gridCheck">--}}
                                    {{--<label class="form-check-label" for="gridCheck">--}}
                                        {{--Check me out--}}
                                    {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div> -->--}}


                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row" style="margin-top: 50px;">--}}
                        {{--<div class="col">--}}
                            {{--<button  class="btn btn-block " style="background-color:#ff3957--}}
{{--; color:white;">ย้อนกลับ</button>--}}
                            {{--<div class="col">--}}
                                {{--<button type="submit" class="btn btn-block " style="background-color:#904ae8--}}
{{--; color:white;">บันทึกข้อมูล</button>--}}
        {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    </section>
</div>
<!-- multistep form -->
<div class="container">
    <form  action="/designer/store" method="post" enctype="multipart/form-data" class="msform " >
        {{ csrf_field() }}
            <!-- progressbar -->
            {{-- <ul id="progressbar">
                <li class="_active_pro text-center">เกี่ยวกับคุณ</li>
                <li class="text-center">บัตรประชาชน</li>
                <li class="text-center">บัญชีและการเงิน</li>
            </ul> --}}
            <div class="text-center p-5">
                <div id="wizard-progress" >
                    <ol class="step-indicator">
                        <li class="complete">
                            <div class="step">1</div>
                            <div class="caption hidden-xs hidden-sm">เกี่ยวกับคุณ</div>
                        </li>
                        <li class="active">
                            <div class="step">2</div>
                            <div class="caption hidden-xs hidden-sm">บัตรประชาชน</div>
                        </li>
                        <li class="active">
                            <div class="step">3</div>
                            <div class="caption hidden-xs hidden-sm">บัญชีและการเงิน</div>
                        </li>
                    </ol>
                </div>

            </div>
            <!-- fieldsets -->
            <fieldset>
                    <div class="text-center p-5">
                        <h1 for="" class="_hilight">เกี่ยวกับคุณ</h1>
                        <h5 class="_gray mb-5">ระบุข้อมูลการจ้างงานเกี่ยวกับคุณเพื่อการสื่อสารรับงานที่ง่ายขึ้น</h5>
                       <div class="container ml-md-4">
                           <img id="blah" class="rounded-circle" src="photo/preprofile.png" alt="your image" style="width: 180px; height: 180px; border: 2px solid #523EE8;"/>

                           <div class="upload-btn-wrapper">
                               <button class="_btn-upload rounded-ex"><i class="fas fa-user-edit"></i></button>
                               <input  name="profilepic"  type="file" id="imgInp"/>
                           </div>
                       </div>
                       <p class="mt-md-4 mb-md-5 _hilight">*รูปโปรไฟล์นักออกแบบต้องใช้ภาพถ่ายตัวจริง <br>
                        ที่เห็นใบหน้าของคุณชัดเจน*</p>

                    </div>

                    <div class="form-group pl-md-5 pr-md-5 mb-3">
                         <h5 class="font-weight-bold" for="inputUsername"><i class="fas fa-info icon"></i> แนะนำเกี่ยวกับคุณ</h5>
                            
                              
                                <textarea  type="text" rows="5" class="form-control"  name="description" placeholder="ex. ถนัดงานแบบไหนเป็นพิเศษ"></textarea>
                                <small class="_gray ">เช่น คุณถนัดงานแบบไหน ระบุให้ชัดเจน</small>

                          
                    </div>

                    <div class="form-group pl-md-5 pr-md-5 mb-3">
                        <h5 class="font-weight-bold" for="inputUsername">  <i class="fas fa-phone icon"></i> เบอร์โทรศัพท์</h5>
                            <input type="tel"  class="form-control w-50" placeholder="เบอร์โทรศัพท์" name="phonenumber" max="1234567890"  >
                            <small class="_gray">ex. 092-xxx-xxxx</small>
                    </div>
                    <div class="form-group pl-md-5 pr-md-5">

                        <h5 class="font-weight-bold" for="inputUsername">  <i class="fas fa-tag icon"></i>ลักษณะหรือสไตล์งานที่ถนัด  </h5>
                        <div class="row">
                        @foreach ($tags as $tag)
                            <!-- <h1>{{$tag->nameTag}}</h1> -->

                                <div class="form-check">
                                    <ul class="ks-cboxtags">
                                        <li><input   class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tag[]">
                                            <label  class="form-check-label" for="tagName">{{$tag->tagName}}</label>
                                        </li>
                                    </ul>

                                    <!-- </li> -->
                                </div>

                            @endforeach
                        </div>
                    </div>
                  
                    <a href="/" name="previous" class="previous _secondary-btn text-center  btn-block rounded btn-lg" style="margin-top:50px; margin-right:280px; width:20%; float: left; right:0; position:absolute;">ย้อนกลับ</a>
                    <input type="button" name="next" class="next  _primary-black  btn-block rounded btn-lg" value="ถัดไป" style="margin-top:50px; margin-right:50px; width:20%; right:0; position:absolute;">
                    
            </fieldset>
            <fieldset>
                <div class="text-center p-5">
                    <h1 class="_hilight">บัตรประชาชน</h1>
                    <p class="_gray">ระบุข้อมูลส่วนบุคคลเพื่อใช้เป็นหลักฐานในการจ้างงาน </p>
                </div>
                <div class="form-row pl-md-5 pr-md-5">
                    <div class="form-group dropdown col-12 col-md-3">
                      <h5 class="font-weight-bold" for="due">   <i class="fas fa-venus-mars icon"></i>  คำนำหน้าชื่อ</h5>
                        <select class="form-control" name="titlename" id="month" >
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
                    <div class="form-group col-12 col-md-6">
                          <h5 class="font-weight-bold" for="inputUsername"><i class="fas fa-calendar-week icon"></i> วันเกิดของคุณ</h5> 
                            <input class="w-100 form-control" type="date" id="basicDate" name="birthdate"  placeholder="Ex.00/00/0000" data-input>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <h5 class="font-weight-bold" for="inputUsername"><i class="fas fa-id-card icon"></i> เลขบัตรประชาชน</h5>
                            <input type="personalid" class="form-control w-100" placeholder="กรอกหมายเลขบัตรประชาชนของคุณ"  name="personalID" max="1234567890123">
                    </div>
                    <div class="form-group col-12 col-md-8">
                      <h5 class="font-weight-bold" for="inputUsername"><i class="fas fa-map-marked icon"></i>  ที่อยู่</h5> 
                            <input type="text" class="form-control" placeholder="กรอกที่อยู่ตามบัตรประชาชนของคุณ"  name="address" >
                    </div>
                    <div class="form-group col-12 col-md-4">
                       <h5 class="font-weight-bold" for="inputUsername"> <i class="fas fa-mail-bulk icon"></i>  รหัสไปรษณีย์</h5>
                            <input type="text" class="form-control" placeholder="กรอกรหัสไปรษณีย์ที่อยู่ของคุณ" name="zipcode" max="44444" >
                    </div>
                    <div class="form-group col-md-12">
                        <h5 class="font-weight-bold" for="due" > <i class="fas fa-id-card-alt icon"></i>  ภาพถ่ายบัตรประชาชน</h5> 
                        <label for="due" class="control-label _hilight" >*เพื่อยืนยันตัวตนด้วยบัตรประชาชน รูปต้องเป็นเจ้าของบัตรถือบัตรประชาชนของตนเอง
                            ภาพบัตรและใบหน้าต้องเห็นรายละเอียดข้อมูลที่ชัดเจน*</label>
                       <div class="form-row">
                        <div class="col-md-6 text-center">
                            <div class="persona" style="height:auto">
                                <img  id="personaid" class="img-fluid rounded" src="photo/card-persona.jpg" alt="" style="width: 100%; height:320px"/>
                            </div>
                            <div class="_upload-btn-wrapper ">
                                <button class="btn _primary-btn  mt-2 mb-5">อัปโหลดรูปบัตรประชาชน</button>
                                <input   name="selfieID"  type="file" id="imgInp2"/>
                            </div>
                        </div>
                       
                         <div class="col-md-6 text-center">
                            <div class="persona" style="height:auto;">
                                <img  id="backpersonaid" class="img-fluid rounded" src="photo/persona.jpg" alt=""style="width: 100%; height:320px"/>
                            </div>
                            <div class="_upload-btn-wrapper">
                                <button class="btn _primary-btn  mt-2">อัปโหลดรูปใบหน้าคู่บัตรประชาชน</button>
                                <input  name="pictureIDCard"  type="file" id="imgInp3"/>
                            </div>
                         </div>
                         

                       </div>

                    </div>
                </div>
              
                <input type="button" name="next" class="next  _primary-black  btn-block rounded btn-lg" value="ถัดไป" style="margin-top:50px; margin-right:50px; width:20%; right:0; position:absolute;"/>
                <input type="button" name="previous" class="previous _secondary-btn  btn-block rounded btn-lg" value="ย้อนกลับ" style="margin-top:50px; margin-right:280px; width:20%; float: left; right:0; position:absolute;"/>
            
            </fieldset>
            <fieldset>
                <div class="text-center p-5">
                    <h1 for="" class="_hilight ">บัญชีและการเงิน</h1>
                    <h5 class="_gray">ระบุข้อมูลบัญชีธนาคารใช้เป็นหลักฐานในการรับเงินค่าจ้างงาน</h5>
                </div>
                <!-- <div class="form-group pl-5 pr-5">
                    <label for="inputUsername">ราคาที่ต้องการจะได้รับ 1:ชิ้นงาน </label>
                    <div class="input-icons">
                        <i class="fas fa-dollar-sign icon"></i>
                        <input type="text" class="form-control" name="pricerate" >
                    </div>
                </div> -->
                <div class="form-row pl-5 pr-5">
                    <div class="form-group col-12 col-md-6">
                        <h5 class="font-weight-bold" for="inputUsername"> <i class="fas fa-money-check icon"></i>ธนาคาร</h5>
                       <select class="form-control" name="bankname"  >
                           <option disabled="disabled" value="">เลือก</option>
                           <option value="kbank">ธนาคารกสิกรไทย</option>
                            <option value="ktb">ธนาคารกรุงไทย</option>
                             <option value="bbl">ธนาคารกรุงเทพ</option>
                              <option value="scb">ธนาคารไทยพาณิชย์</option> 
                              <option value="bay">ธนาคารกรุงศรีอยุธยา</option>
                               <option value="tmb">ธนาคารทหารไทย</option> 
                       </select>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <h5 class="font-weight-bold" for="inputUsername"> เลขบัญชีธนาคาร</h5>
                        <input type="tel" class="form-control" max="1234567890"  name="bankaccount">
                    </div>
                        

                </div>
              
               

               
                <input type="submit" name="submit" class="submit  _primary-black  btn-block rounded btn-lg" value="เสร็จสิ้น" style="margin-top:50px; margin-right:50px; width:20%; right:0; position:absolute;"/>
                <input type="button" name="previous" class="previous _secondary-btn  btn-block rounded btn-lg" value="ย้อนกลับ" style="margin-top:50px; margin-right:280px; width:20%; float: left; right:0; position:absolute;"/>
               
               {{-- <input type="button" name="previous" style="background-color:#ff3957
        ;" class=" previous action-button btn-block btn-lg  rounded" value="Previous"/>
                <button type="submit" name="submit" class="submit action-button" value="Submit"> Submit</button> --}}

            </fieldset>


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
