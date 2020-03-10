@extends('layouts.app')

@section('content')

<section class="payment">
    <div class="container bg-white mt-5 shadow-sm ">
        <div class="text-center pt-5  ">
            <h1 class="_hilight">ตรวจสอบการโอนเงิน</h1>
            <h4>ใบรหัสการจ้างงาน No. W0{{$payments->job_id}}</h4>
            @if($payments->payments_status == 'อนุมัติการโอนเงินเรียบร้อย')
                <span class="text-success">
                    <i class="fas fa-check-circle"></i>
                    ทำการอนุมัติการโอนเงินเรียบร้อย
                </span>
            @elseif($payments->payments_status == 'ยอดการชำระเงินมีปัญหา')
            <span class="text-danger">
                <i class="fas fa-times-circle"></i>
                ยอดการชำระเงินมีปัญหา
            </span>
            @endif
            
            <div class="row">

                <div class="m-auto">
                    <img class="mt-5" src="/{{$payments->fileTransfer}}" alt="">

                </div>

            </div>
            <form action="/admin/payments/store"  method="post" >
                {{ csrf_field() }}
                <input type="hidden"  name="id" value="{{$payments->id}}">
                <input type="hidden"  name="payments_status" value="อนุมัติการโอนเงินเรียบร้อย">


                <div class="container pl-pr-lg-_ex pt-5" >
                    <div class="text-left">
                        <h4>ยอดที่ชำระเงิน</h4>
                        <div class="row alert alert-secondary" role="alert">
                            <div class="col">
                                <p>ยอดชำระเงินทั้งหมด</p>
                            </div>
                            <div class="col text-right _hilight">
                                <p>{{$payments->total_price}} บาท</p>
                            </div>
                        </div>

                    </div>
                    <div class="text-left">
                        <div class="row alert alert-secondary" role="alert">
                            <div class="col">
                                <p>ยอดที่ต้องโอนให้นักออกแบบโดยหัก 5% แล้ว </p>
                            </div>
                            <div class="col text-right text-success">
                                <p>{{$payments->total_price - ($payments->total_price * 0.05)}} บาท</p>
                            </div>
                        </div>

                    </div>
                    <div class="text-left pt-4">
                        <h4>โอนเข้าบัญชีของธนาคาร</h4>
                        <p>{{$payments->bank}}</p>
                    </div>
                    <div class="row text-left pt-4">
                        <div class="col">
                            <h4>วันที่โอนเงิน</h4>
                            <p>{{$payments->dateatTransfer}}</p>
                        </div>
                        <div class="col">
                            <h4>เวลาที่โอนเงิน</h4>
                            <p>{{$payments->timeatTransfer}}</p>
                        </div>
                    </div>
                    <div class="text-left pt-4">
                        <h4>ข้อความเพิ่มเติม</h4>
                        <p>{{$payments->description}}</p>
                    </div>
                    <div class="text-right pt-5">
                        <a class="text-decoration-none" href="/admin/payments">
                            <button type="button" class="btn btn-outline-dark text-center mb-5 ">ย้อนกลับ</button>
                        </a>
                        <button type="button" class="btn btn-outline-dark text-center mb-5 " data-toggle="modal" data-target=".bd-example-modal-lg">
                            ปฏิเสธยอดชำระเงิน
                        </button>
                        <button type="submit" class="btn btn-dark text-center mb-5">อนุมัติการโอนเงิน</button>
                    </div>
                </div>
            </form>

            <form action="/admin/payments/store" method="post" >
                {{ csrf_field() }}
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        {{-- <div class="modal-header " >
                            <div class="row">

                            </div>
                            <h4 class="modal-title text-center"  id="myLargeModalLabel">คุณต้องการเสร็จสิ้นงานใช่ไหม?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div> --}}
                        <div class="modal-body text-center">
                            <div class="container">
                                <h1 class="modal-title text-center mt-5 mb-5 _hilight text-danger"  id="myLargeModalLabel">ปฎิเสธยอดชำระเงิน</h1>
     
                                 <div class="row  ">
                                     <div class="col-3"></div>
                                     <div class="col-6">
                                        <h5 class="form-check text-left">สาเหตุของข้อมูลการชำระเงินไม่ถูกต้อง</h5>

                                        <div class="form-check text-left">
                                          <input class="form-check-input" type="radio" id="gridRadios1" name="gridRadios" onclick="addCart('ยอดที่ชำระเงินเงินไม่ครบตามจำนวน')">
                                          <label class="form-check-label" for="gridRadios1">
                                            ยอดที่ชำระเงินเงินไม่ครบตามจำนวน
                                          </label>
                                        </div>
                                        <div class="form-check text-left">
                                          <input class="form-check-input" type="radio" id="gridRadios2" name="gridRadios" onclick="addCart('ไม่ได้แนบรูปภาพการโอนเงิน')" >
                                          <label class="form-check-label" for="gridRadios2">
                                            ไม่ได้แนบรูปภาพการโอนเงิน
                                          </label>
                                        </div>
                                        <div class="form-check text-left">
                                          <input class="form-check-input" type="radio" id="gridRadios3" name="gridRadios" onclick="addCart('กรอกข้อมูลไม่ครบถ้วน')"  >
                                          <label class="form-check-label" for="gridRadios3">
                                            กรอกข้อมูลไม่ครบถ้วน
                                          </label>
                                        </div>
                                        <div class="form-check text-left">
                                            <div class="row">
                                                
                                            </div>
                                            <input class="form-check-input" type="radio" id="gridRadios4" name="gridRadios"  value="อื่นๆ" >
                                            <label class="form-check-label" for="gridRadios4">
                                              อื่นๆ
                                            </label>
                                            <input type="text" class="form-control" name="problem_note">

                                          </div>
                                      </div>
                                     <div class="col-3"></div>
     
                                     
                                 </div>
                                 <hr>
                                <div class="mt-5 mb-5">
                                    <input type="hidden"  name="id" value="{{$payments->id}}">
                                    <input type="hidden"  name="payments_status" value="ยอดการชำระเงินมีปัญหา">
                                    <input  type="hidden" id="output" name="problem_note" >


                                    <button type="button" class="btn btn-secondary"  data-dismiss="modal">ยกเลิก</button>
                                    <a href="{{ route('payments.detail', $payments->id) }}">
            
                                        <button type="submit" class="btn btn-primary" style="background-color:black;">ยืนยันการทำรายการ</button>
                                    </a>
                                </div>
                                 
         
                            </div>
                
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>

        </div>
       
    </div>
</section>
@endsection

<script>
    function addCart(v){
        document.getElementById('output').value = v
 
        console.log(v);
        return false;
    }
</script>