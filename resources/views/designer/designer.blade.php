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
                    <div class="text-center">
                        <h1 for="" class="_hilight p-5">กรอกข้อมูลเกี่ยวกับคุณ</h1>
                        <p>โปรดกรอกข้อมูลให้ครบถ้วน</p>
                       <div class="container justify-content-center">
                           <image id="blah" class="rounded-circle" src="photo/preprofile.png" alt="your image" style="width: 140px; height: 140px; box-shadow: 5px 1px 20px 1px rgba(144, 74, 232,.15);"/>
        
                           <div class="upload-btn-wrapper">
                               <button class="_btn-upload rounded-ex"><i class="fas fa-user-edit"></i></button>
                               <input  name="profilepic"  type="file" id="imgInp"/>
                           </div>
                       </div>
        
                    </div>
        
                    <div class="form-group pl-5 pr-5">
                        <label for="inputUsername">แนะนำเกี่ยวกับคุณ</label>
                            <div class="input-icons">
                                <i class="fas fa-info icon"></i>
                                <textarea  type="text" class="form-control"  name="description" placeholder="ex. ถนัดงานแบบไหนเป็นพิเศษ"></textarea>
                                <small style="color:#757575;font-size: 10px;">please input</small>
        
                            </div>
                    </div>
        
                    <div class="form-group pl-5 pr-5">
                        <label for="inputUsername">เบอร์โทรศัพท์</label>
                        <div class="input-icons">
                            <i class="fas fa-phone icon"></i>
                            <input type="tel" class="form-control"  name="phonenumber" max="1234567890" >
                            <small style="color:#757575;font-size: 10px;">ex. 092-xxx-xxxx</small>
                        </div>
                    </div>
                    <div class="form-group">
        
                        <label for="inputUsername">หมวดหมู่ <i class="fas fa-tag icon"></i> </label>
                        <div class="row justify-content-center">
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
                    <input type="button" name="next" class="next action-button btn-block btn-lg justify-content-center rounded" value="Next" />
            </fieldset>
            <fieldset>
                <div class="row justify-content-center">
                    <h1 for="" class="_hilight p-5">กรอกข้อมูลบัตรประชาชน</h1>
                </div>
                <div class="form-group pl-5 pr-5">
                    <label for="inputUsername">เลขบัตรประชาชน</label>
        
                    <div class="input-icons">
                        <i class="fas fa-id-card icon"></i>
                        <input type="personalid" class="form-control"  name="personalID" max="1234567890123">
                    </div>
                </div>
                <div class="form-group dropdown pl-5 pr-5">
                    <label for="due" >คำนำหน้าชื่อ</label>                    <i class="fas fa-venus-mars icon"></i>
        
        
                    <select class="form-control" name="titlename" id="month" >
                                <option selected="selected" value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
        
        
                </div>
                <div class="form-group">
                    <div class="form-group pl-5 pr-5">
                       <div class="row">
                           <div class="col-6">
                               <label for="inputUsername">ชื่อ</label>
                               <div class="input-icons">
                                   <i class="fas fa-signature icon" style="left: -30px;"></i>
                                   <input type="text" class="form-control"  name="name">
        
                               </div>
                           </div>
                           <div class="col-6">
                               <label for="inputUsername">นามสกุล</label>
                               <div class="input-icons">
                                   <input type="text" class="form-control"  name="surname">
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
                <div class="form-group pl-5 pr-5">
                    <label for="inputUsername">วันเกิดของคุณ</label>
                    <div class="input-icons">
                        <i class="fas fa-calendar-week icon"></i>
                        <input type="date" id="basicDate" name="birthdate"  placeholder="MM/DD/YY" data-input>
                    </div>
                </div>
                <div class="form-group pl-5 pr-5">
                    <label for="inputUsername">ที่อยู่</label>
        
                    <div class="input-icons">
                        <i class="fas fa-map-marked icon"></i>
                        <textarea type="text" class="form-control"  name="address" rows="3"></textarea>
                    </div>
                </div>
        
                <div class="form-group pl-5 pr-5">
        
                    <label for="inputUsername">รหัสไปรษณีย์</label>
                    <div class="input-icons">
                        <i class="fas fa-mail-bulk icon"></i>
                        <input type="text" class="form-control" name="zipcode" max="44444" >
        
                    </div>
                </div>
        
                <div class="form-group pl-5 pr-5">
                    <label for="due" >ภาพถ่ายบัตรประชาชน</label> <i class="fas fa-id-card-alt icon"></i>
        
                    <div class="container justify-content-center">
        
                            <label for="due" class="control-label" >ภาพถ่ายบัตรประชาชนพร้อมหน้าของคุณ</label>
        
                        <div class="persona">
                            <image  id="personaid" class="rounded-ex " src="#" alt=""/>
                        </div>
        
                        <div class="_upload-btn-wrapper">
                            <button class="_btn-persona rounded-ex mt-5">Upload file</button>
                            <input  name="selfieID"  type="file" id="imgInp2"/>
                        </div>
                            <label for="due" class="control-label mt-2" >ภาพถ่ายหลังบัตรประชาชน</label>
                        <div class="persona">
                            <image  id="backpersonaid" class="rounded-ex " src="#" alt=""/>
                        </div>
                        <div class="_upload-btn-wrapper">
                            <button class="_btn-persona rounded-ex mt-5">Upload file</button>
                            <input  name="pictureIDCard"  type="file" id="imgInp3"/>
                        </div>
        
        
                    </div>
        
        
                </div>
                    <input type="button" name="previous" style="background-color:#ff3957
        ;" class=" previous action-button btn-block btn-lg  rounded" value="Previous"/>
                    <input type="button" name="next" class=" next action-button btn-block btn-lg  rounded" value="Next"  />
            </fieldset>
            <fieldset>
                <div class="row justify-content-center">
                    <h1 for="" class="_hilight p-5">กรอกข้อมูลบัญชี</h1>
                </div>
                <!-- <div class="form-group pl-5 pr-5">
                    <label for="inputUsername">ราคาที่ต้องการจะได้รับ 1:ชิ้นงาน </label>
                    <div class="input-icons">
                        <i class="fas fa-dollar-sign icon"></i>
                        <input type="text" class="form-control" name="pricerate" >
                    </div>
                </div> -->
        
                <div class="form-group pl-5 pr-5">
        
                    <label for="inputUsername">ธนาคาร</label>
                    <div class="input-icons">
                <i class="fas fa-money-check icon"></i>
        
                <input type="text" class="form-control"  name="bankname">
                </div>
                   
                        <label for="inputUsername">เลขบัญชีธนาคาร</label>
                <div class="input-icons">
                <!-- <i class="fas fa-money-check icon"></i> -->
        
                    <input type="number" class="form-control"  name="bankaccount">
                </div>
        
                </div>
        
                <input type="button" name="previous" style="background-color:#ff3957
        ;" class=" previous action-button btn-block btn-lg  rounded" value="Previous"/>
                <button type="submit" name="submit" class="submit action-button" value="Submit"> Submit</button>
        
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
<script src="{{asset('js/flatpickr.js')}}"></script>
