@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="css/_designer.css">
@endsection
@section('content')
<div class="container mt_ex">
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
<form   class=" msform modal-lg  rounded-ex">
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="_active_pro text-center">เกี่ยวกับคุณ</li>
        <li class="text-center">บัตรประชาชน</li>
        <li class="text-center">บัญชีและการเงิน</li>
    </ul>
    <!-- fieldsets -->
    <fieldset >
            <div class="text-center">
                <h1 for="" class="_hilight">กรอกข้อมูลเกี่ยวกับคุณ</h1>
                <p>โปรดกรอกข้อมูลให้ครบถ้วน</p>
                <image id="profileImage" class="rounded-circle " src="https://picsum.photos/140" style="border: 3px solid mediumpurple;"/>
            </div>
            <div class="form-group">
                <div id="preview"></div>
                <div class="form-group">
                    <div class="form-group ">


                        <label for="due" class="control-label text-center" >ภาพโปรไฟล์</label>

                        <div class="avatar-upload mx-auto">

                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />

                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                </div>
                            </div>
                        </div>

                        {{--<input id="imageUpload" type="file"--}}
                               {{--name="profile_photo" placeholder="Photo" required="" capture>--}}

                        {{--<input type="file" class="form-control" id="input_img" name="profilepic">--}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputUsername">แนะนำเกี่ยวกับคุณ</label>
                <input type="text" class="form-control"  name="description">
            </div>

            <div class="form-group">
                <label for="inputUsername">เบอร์โทรศัพท์</label>
                <input type="number" class="form-control"  name="phonenumber">
            </div>
            <div class="form-group">

                <label for="inputUsername">หมวดหมู่</label>
                <div class="row">
                @foreach ($tags as $tag)
                    <!-- <h1>{{$tag->nameTag}}</h1> -->

                        <div class="form-check">
                            {{--<ul class="ks-cboxtags">--}}
                                {{--<li><input type="checkbox" id="checkboxOne" value="minimal"><label for="checkboxOne">มินิมอล</label></li>--}}
                                {{--<li><input type="checkbox" id="checkboxTwo" value="Cotton Candy" checked><label for="checkboxTwo"> ทันสมัย</label></li>--}}
                                {{--<li><input type="checkbox" id="checkboxThree" value="Rarity" checked><label for="checkboxThree">วินเทจ</label></li>--}}
                                {{--<li><input type="checkbox" id="checkboxFour" value="Moondancer"><label for="checkboxFour">แฟนตาซี</label></li>--}}
                                {{--<li><input type="checkbox" id="checkboxFive" value="Surprise"><label for="checkboxFive">หนักแน่น</label></li>--}}
                                {{--<li><input type="checkbox" id="checkboxSix" value="Twilight Sparkle" checked><label for="checkboxSix">แปลกใหม่</label></li>--}}
                                {{--<li><input type="checkbox" id="checkboxSeven" value="Fluttershy"><label for="checkboxSeven">ดอกไม้</label></li>--}}

                            {{--</ul>--}}
                            <!-- <li> -->
                            <ul class="ks-cboxtags">
                                <li><input   class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tag[]">
                                    <label  class="form-check-label" for="tagName">{{$tag->tagName}}</label></li>
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
            <h1 for="" class="_hilight">กรอกข้อมูลบัตรประชาชน</h1>
        </div>
        <div class="form-group">
            <label for="inputUsername">เลขบัตรประชาชน</label>
            <input type="number" class="form-control"  name="personalID">
        </div>
        <div class="form-group dropdown">
            <label for="due" >คำนำหน้าชื่อ</label>

            <select class="form-control" name="titlename" id="month" >
                <option selected="selected" value="นาย">นาย</option>
                <option value="นาง">นาง</option>
                <option value="นางสาว">นางสาว</option>
            </select>
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="inputUsername">ชื่อ</label>
                <input type="text" class="form-control"  name="name">
            </div>

            <div class="form-group">
                <label for="inputUsername">นามสกุล</label>
                <input type="text" class="form-control"  name="surname">
            </div>
        </div>
        <div class="form-group">
            <label for="inputUsername">วันเกิดของคุณ</label>
            <input type="date" class="form-control"  name="birthdate">
        </div>
        <div class="form-group">
            <label for="inputUsername">ที่อยู่</label>
            <input type="text" class="form-control"  name="address">
        </div>

        <div class="form-group">
            <label for="inputUsername">รหัสไปรษณีย์</label>
            <input type="text" class="form-control" name="zipcode" >
        </div>

        <div class="form-group">
            <label for="due" >ภาพถ่ายบัตรประชาชน</label>
            <div class="form-group">
                <div class="form-group">
                    <label for="due" class="control-label" >ภาพถ่ายบัตรประชาชนพร้อมหน้าของคุณ</label>
                    <input type="file" class="form-control" name="selfieID">
                </div>
                <div class="form-group">
                    <label for="due" class="control-label" >ภาพถ่ายหลังบัตรประชาชน</label>
                    <input type="file" class="form-control" name="pictureIDCard">
                </div>
            </div>
        </div>
            <input type="button" name="previous" class=" previous action-button btn-block btn-lg  rounded" value="Previous"/>
            <input type="button" name="next" class=" next action-button btn-block btn-lg  rounded" value="Next"  />
    </fieldset>
    <fieldset>
        <div class="row justify-content-center">
            <h1 for="" class="_hilight">กรอกข้อมูลบัญชี</h1>
        </div>
        <div class="form-group">
            <label for="inputUsername">ราคาที่ต้องการจะได้รับ 1:ชิ้นงาน </label>
            <input type="text" class="form-control" name="pricerate" >
        </div>

        <div class="form-group">
            <label for="inputUsername">ธนาคาร</label>
            <input type="text" class="form-control"  name="bankname">
        </div>

        <div class="form-group">
            <label for="inputUsername">เลขบัญชีธนาคาร</label>
            <input type="number" class="form-control"  name="bankaccount">
        </div>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="submit" name="submit" class="submit action-button" value="Submit" />
    </fieldset>
</form>
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
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
</script>
