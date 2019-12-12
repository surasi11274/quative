@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
        <div class="card">
        <div class="card-header">
            กรอกข้อมูลผู้ใช้งาน
        </div>
        <div class="card-body" >
        <form action="/login/designer/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}


               
                <!-- <div class="form-row"> -->
                    <!-- <div class="col-md-6"></div> -->
                    <!-- <div class="form-group ">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" >
                        
                    </div> -->
                    <!-- <div class="col-md-2"></div> -->
                <!-- </div> -->
                <!-- <div class="form-group">
                    <label for="inputPassword">Passwords</label>
                    <input type="text" class="form-control" id="inputPassword" >
                </div>

        
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="text" class="form-control"  >
                </div> -->

                <div class="row justify-content-center">
                    <h1 for="">กรอกข้อมูลเกี่ยวกับคุณ</h1>
                </div>

                <div class="form-group">
                    <label for="inputUsername">Description</label>
                    <input type="text" class="form-control"  name="description">
                </div>

                <div class="form-group">
                    <label for="inputUsername">Phone Number</label>
                    <input type="number" class="form-control"  name="phonenumber">
                </div>

            

               

                <div class="form-group">
                    
                        <label for="inputUsername">Tag</label>
                        <div class="row">
                        @foreach ($tags as $tag)
                        <!-- <h1>{{$tag->nameTag}}</h1> -->
                        
                        <div class="form-check">
                            <!-- <li> -->
                                <input class="form-check-input" type="checkbox" id="checkbox" value="{{$tag->nameTag}}" name="tag">
                                <label  class="form-check-label" for="checkbox">{{$tag->nameTag}}</label>
                            <!-- </li> -->
                        </div>

                        @endforeach
                    </div>
                </div>

              
                <div class="row justify-content-center">
                    <h1 for="">กรอกข้อมูลบัตรประชาชน</h1>
                </div>

                <div class="form-group">
                    <label for="inputUsername">Personal ID</label>
                    <input type="number" class="form-control"  name="personalID">
                </div>

                <div class="form-group dropdown">
                <label for="due" >Photo Personal ID</label>
                    
                    <select class="form-control" name="titlename" id="month" >
                                <option selected="selected" value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                        
                    </select>
                </div>

                <div class="form-group">
                    
                    <div class="form-group">
                        <label for="inputUsername">Name</label>
                        <input type="text" class="form-control"  name="name">
                    </div>

                    <div class="form-group">
                        <label for="inputUsername">Surname</label>
                        <input type="text" class="form-control"  name="surname">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputUsername">Birth Date</label>
                    <input type="date" class="form-control"  name="birthdate">
                </div>

                <div class="form-group">
                    <label for="inputUsername">Address</label>
                    <input type="text" class="form-control"  name="address">
                </div>

                <div class="form-group">
                    <label for="inputUsername">Zip Code</label>
                    <input type="text" class="form-control" name="zipcode" >
                </div>

                <div class="form-group">
                    <label for="due" >Photo Personal ID</label>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="due" class="control-label" >Selfie</label>
                            <input type="file" class="form-control" name="selfie_ID">
                        </div>
                        <div class="form-group">
                            <label for="due" class="control-label" >Personal ID Card</label>
                            <input type="file" class="form-control" name="picture_IDCard">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <h1 for="">กรอกข้อมูลบัญชี</h1>
                </div>

                <div class="form-group">
                    <label for="inputUsername">Price Rate </label>
                    <input type="text" class="form-control" name="pricerate" >
                </div>

                <div class="form-group">
                    <label for="inputUsername">Bank </label>
                    <input type="text" class="form-control"  name="bankname">
                </div>

                <div class="form-group">
                    <label for="inputUsername">Bank Account</label>
                    <input type="number" class="form-control"  name="bankaccount">
                </div>

                <!-- <div class="form-group">
                    <label for="due" >Pictures of Book Bank</label>

                    <div class="form-group ">
                        <div class="form-group">
                            <label for="due" class="control-label" >Selfie</label>
                            <input type="file" class="form-control" name="picture_bookbank">
                        </div>
                    </div>
                </div> -->

                <!-- <div class="form-group">
                    <label for="inputUsername">Name</label>

                    <select class="custom-select" required>
                    <option value="">Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    </select>
                    <div class="invalid-feedback">Example invalid custom select feedback</div>
                </div> -->
                
                <!-- <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                    </div>
                    <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                    </div>
                </div> -->
                <!-- <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                    </div>
                </div> -->
                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                <button type="submit" class="btn btn-secondary">ย้อนกลับ</button>

        </form>
        </div>
        </div>
  </div>
</div>
@endsection