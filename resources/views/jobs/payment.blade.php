@extends('layouts.app')

@section('assets')
<link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
@endsection
@section('content')
    <section class="payment">
        <div class="container bg-white mt-5 shadow-sm ">
            <div class="text-center pt-5 mb-md-5">
                <h1 class="_hilight">แจ้งการโอนเงิน</h1>
                <h4 class="_gray">ใบรหัสการจ้างงาน No. W0{{$jobs->id}}</h4>
            </div>
           <div class="container">
            <form class="multi-step-form  " action="/payment/store" method="post" enctype="multipart/form-data">
               
              {{ csrf_field() }}
                  <div class="form-row pl-pr-lg-_ex ">
                    <div class="form-group col-md-12">
                     <h4 class="font-weight-bold mb-3">ยอดที่ต้องชำระ</h4>
                      <div class="row text-center show-payment shadow-sm mb-4">
                        <p class="col-md-6">ยอดชำระเงินทั้งหมด</p>
                        <p class="col-md-6 _hilight">{{$jobs->pricerate}} บาท</p> 
                        <input hidden type="text" name="total_price" value="{{$jobs->pricerate}}">
                      </div>
                     
                    </div>
                   
                    <div class="form-group col-md-12">
                    <h4 class="font-weight-bold">โอนเข้าบัญชีของธนาคาร</h4>
                      {{-- <select id="inputState" class="form-control" name="bank">
                        <option selected value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                        <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                      </select> --}}
                      <select id="inputState" class="selectpicker w-100 mb-3"  name="bank">
                        <option selected value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                        <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
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
                    <h5 class="font-weight-bold">วันที่โอนเงิน</h5>
                      <input type="date" id="basicDate" class="form-control" name="dateatTransfer"  placeholder="MM/DD/YY" data-input>
                      
                    </div>
                    <div class="form-group col-md-6">
                    <h5 class="font-weight-bold">เวลาที่ทำรายการ</h5>
                      <input type="date" id="anotherSelector"" class="form-control" name="timeatTransfer"  placeholder="เลือกเวลาทำรายการ" data-input>
                     
                    </div>
                    <div class="form-row">
                      <label class="font-weight-bold" style="font-size:1.25rem" for="">แนบรูปภาพการโอนเงิน
                       
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
                              <h5 class="font-weight-bold">ข้อความเพิ่มเติม (ถ้ามี)</h5>
                              <textarea class="form-control" id="validationTextarea" name="description" placeholder="ระบุรายข้อความเพื่มเติม" ></textarea>
                            </div>
                            <div class="col-12 col-md-8">

                            </div>
                            <div class="col-12 col-md-4">
                             <button type="button" class="btn btn-outline-dark text-center mb-5 btn-lg">ยกเลิกงาน</button>
                             <button type="submit" class="btn btn-dark text-center mb-5 btn-lg">ยืนยัน</button>
                            </div>
                                
                      </div>
                      
                    
                      
                      <input hidden type="text" id="job_id" name="job_id" value="{{$jobs->id}}">
                      <input hidden type="text" id="designer_id" name="designer_id" value="{{$jobs->designer_id}}">
                      <input hidden type="text" id="user_id" name="user_id" value="{{$jobs->user_id}}">
                 
                      
                         
                      
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