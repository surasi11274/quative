@extends('layouts.app')

@section('assets')
<link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
@endsection
@section('content')
    <section class="payment">
        <div class="container bg-white mt-5 shadow-sm ">
            <div class="text-center pt-5  ">
                <h1>แจ้งการโอนเงิน</h1>
                <h4>ใบรหัสการจ้างงาน No. W0{{$jobs->id}}</h4>
            </div>
           <div class="container">
            <form class="multi-step-form  " action="/payment/store" method="post" enctype="multipart/form-data">
               
              {{ csrf_field() }}
                  <div class="form-row pl-pr-lg-_ex ">
                    <div class="form-group col-md-12">
                      <label for="inputEmail4">ชื่อ</label>
                      <input type="name" class="form-control" id="inputEmail4" name="name">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="inputPassword4">นามสกุล</label>
                      <input type="name" class="form-control" id="inputPassword4" name="surname">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="inputAddress">จำนวนเงิน</label>
                      <input type="text" class="form-control" id="inputAddress" placeholder="ระบุจำนวนเงิน" name="price">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="inputAddress2">บัญชีธนาคาร</label>
                      <select id="inputState" class="form-control" name="bank">
                        <option selected value="NULL">Choose...</option>
                        <option value="SCB">ธนาคารไทยพาณิชย์</option>
                      </select>
                    </div>
                    {{-- <div class="form-group col-md-6">
                      <label for="inputUsername">วันเกิดของคุณ</label>
                      <div class="input-icons">
                          <i class="fas fa-calendar-week icon"></i>
                          <input type="date" id="basicDate" name="birthdate"  placeholder="MM/DD/YY" data-input>
                      </div>
                  </div> --}}
                    <div class="form-group col-md-6">
                      <label for="inputCity">วันที่โอนเงิน</label>
                      <input type="date" id="basicDate" class="form-control" name="dateatTransfer"  placeholder="MM/DD/YY" data-input>
                      
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputZip">เวลาที่ทำรายการ</label>
                      <input type="date" id="anotherSelector"" class="form-control" name="timeatTransfer"  placeholder="MM/DD/YY" data-input>
                     
                    </div>
                    <div class="form-row">
                      <label for="">แนบรูปภาพผลิตภัณฑ์เดิมของคุณ

                      <div class="row">
                          {{-- <div class="col"> --}}
                            <div class="mt-5"></div>
                              <div  id="thumb-output" style="display:flex; width:180px;height:180px;">
                              </div>
                            </label>
                               <div class="upload-btn-wrapper-">
                                      <button class="_btn-upload-"><i class="fas fa-plus"></i></button>
                                      <input type="file" id="file-input"  name="fileTransfer"  multiple />
                               </div>
                               
                           
                      </div>
                  </div> {{-- end --}}
                  
                     
                            <div class="form-group col-md-12">
                              <label for="validationTextarea">ข้อความเพิ่มเติม (ถ้ามี)</label>
                              <textarea class="form-control" id="validationTextarea" name="description" placeholder="Required example textarea" ></textarea>
                                </div>
                      </div>
                    
                      
                      <input hidden type="text" id="job_id" name="job_id" value="{{$jobs->id}}">
                      <input hidden type="text" id="designer_id" name="designer_id" value="{{$jobs->designer_id}}">
                      <input hidden type="text" id="user_id" name="user_id" value="{{$jobs->user_id}}">
                 
                      <div class="text-right">
                          <button type="button" class="btn btn-outline-dark text-center mb-5 ">ยกเลิกงาน</button>
                          <button type="submit" class="btn btn-dark text-center mb-5">ยืนยัน</button>
                      </div>
          </form>
           </div>
        </div>
    </section>
@endsection
{{-- <script type="text/javascript">
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
    });
</script> --}}
<script src="{{asset('js/flatpickr.js')}}"></script>
<script  src="{{asset('js/datepicker.js')}}"></script>