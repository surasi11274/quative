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
            <form action="">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">ชื่อ</label>
                        <input type="email" class="form-control" id="inputEmail4">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">นามสกุล</label>
                        <input type="password" class="form-control" id="inputPassword4">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputAddress">จำนวนเงิน</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputAddress2">บัญชีธนาคาร</label>
                        <select id="inputState" class="form-control">
                          <option selected>Choose...</option>
                          <option>...</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">วันที่โอนเงิน</label>
                                <input type="datetime" class="form-control" id="inputCity">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputZip">เวลาที่ทำรายการ</label>
                                <input type="text" class="form-control" id="inputZip">
                              </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="">แนบรูปภาพผลิตภัณฑ์เดิมของคุณ</label>
    
                            <div class="form-group col-md-12">
                                <img class="rounded m-1" src="https://picsum.photos/180" alt="">
                                <img class="rounded m-1" src="https://picsum.photos/180" alt="">
                                <img class="rounded m-1" src="https://picsum.photos/180" alt="">
                                <img class="rounded m-1" src="https://picsum.photos/180" alt="">
                                <img class="rounded m-1" src="https://picsum.photos/180" alt="">
                              
                               
                              </div>
                              <div class="form-group col-md-12">
                                <label for="validationTextarea">ข้อความเพิ่มเติม (ถ้ามี)</label>
                                <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                                <div class="invalid-feedback">
                                  Please enter a message in the textarea.
                                </div>
                                  </div>
                        </div>
                      
                        
                     
                   
                        <div class="text-right">
                            <button type="button" class="btn btn-outline-dark text-center mb-5 ">ยกเลิกงาน</button>
                            <button type="button" class="btn btn-dark text-center mb-5">เสร็จสิ้นงาน</button>
                        </div>
            </form>
        </div>
    </section>
@endsection