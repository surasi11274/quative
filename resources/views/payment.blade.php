@extends('layouts.app')
@section('assets')
    
@endsection

@section('content')
    <section class="payment">
        <div class="container mt_ex">
            <div class="text-center p-5">
                <h1>แจ้งการโอนเงิน</h1>
                <h4>ใบรหัสการจ้างงาน No. W0001</h4>
            </div>
            <form class="multi-step-form  rounded-ex" action="/payment/store" method="post" enctype="multipart/form-data">
               
                {{ csrf_field() }}
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">ชื่อ</label>
                        <input type="name" class="form-control" id="inputEmail4" name="name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">นามสกุล</label>
                        <input type="name" class="form-control" id="inputPassword4" name="surname">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputAddress">จำนวนเงิน</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="price">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputAddress2">บัญชีธนาคาร</label>
                        <select id="inputState" class="form-control" name="bank">
                          <option selected value="NULL">Choose...</option>
                          <option value="SCB">ธนาคารไทยพาณิชย์</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">วันที่โอนเงิน</label>
                                <input type="text" class="form-control" id="inputCity" name="dateatTransfer">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputZip">เวลาที่ทำรายการ</label>
                                <input type="text"  class="form-control" id="timepicker5" name="timeatTransfer">
                              </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="">แนบรูปภาพผลิตภัณฑ์เดิมของคุณ</label>
    
                            <div class="row">
                                {{-- <div class="col"> --}}
                                    <div  id="thumb-output" style="display:flex; width:180px;height:180px;">
                                    
                                    </div>
                                     <div class="upload-btn-wrapper-">
                                            <button class="_btn-upload-"><i class="fas fa-plus"></i></button>
                                            <input type="file" id="file-input"  name="fileTransfer"  multiple />
                                     </div>
                                     
                                 {{-- </div> --}}
                            </div>
                              <div class="form-group col-md-12">
                                <label for="validationTextarea">ข้อความเพิ่มเติม (ถ้ามี)</label>
                                <textarea class="form-control is-invalid" id="validationTextarea" name="description" placeholder="Required example textarea" required></textarea>
                                <div class="invalid-feedback">
                                  Please enter a message in the textarea.
                                </div>
                                  </div>
                        </div>
                      
                        
                        <input type="text" id="job_id" name="job_id" value="{{$jobs->id}}">
                        <input type="text" id="designer_id" name="designer_id" value="{{$jobs->designer_id}}">
                        <input type="text" id="user_id" name="user_id" value="{{$jobs->user_id}}">
                   
                        <div class="text-right">
                            <button type="button" class="btn btn-outline-dark text-center mb-5 ">ยกเลิกงาน</button>
                            <button type="submit" class="btn btn-dark text-center mb-5">เสร็จสิ้นงาน</button>
                        </div>
            </form>
        </div>
    </section>
@endsection
<script type="text/javascript">
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
    });
</script>