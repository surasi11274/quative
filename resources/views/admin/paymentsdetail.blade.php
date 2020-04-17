@extends('layouts.app')
@section('assets')
<link rel="stylesheet" href="{{asset('css/paymentdetails.css')}}">
@endsection
@section('content')

<section class="payment">
    <div class="container bg-white mt-5 shadow-sm ">
        <div class="text-center pt-5  ">
            <h1 class="_hilight">ตรวจสอบการโอนเงิน</h1>
            <h4>ใบรหัสการจ้างงาน No. W{{$payments->job_id}}</h4>
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
           
            {{-- <form action="/admin/payments/store"  method="post" > --}}
                {{ csrf_field() }}
                <input type="hidden"  name="id" value="{{$payments->id}}">
                <input type="hidden"  name="payments_status" value="อนุมัติการโอนเงินเรียบร้อย">


                <div class="container pl-pr-lg-_ex pt-5" >
                    <div class="row">
                        <div class="col" >
                            <div class="m-auto " style="border:solid 1px; width:300px; height:300px;" >
                                <a class="image-popup-vertical-fit" href="/{{$payments->fileTransfer}}" title="ภาพหลักฐานการโอนเงินจากผู้ประกอบการ">

                                <img  style="object-fit:cover; width:300px; height:300px;" src="/{{$payments->fileTransfer}}" alt="">
                                </a>
                            </div>
                            <p>ภาพหลักฐานการโอนเงินจากผู้ประกอบการ</p>
                        </div>
                        {{-- <div class="col-1">
                            <div style="margin-top: auto; margin-bottom: auto; font-size: 50px;">
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </div>
                        </div> --}}
                        <div class="col">
                            <div class="m-auto " style="border:solid 1px; width:300px; height:300px;" >
        
                                @if ($payments->fileTransferToDesigner !== NULL)
                                    
                                <a class="image-popup-vertical-fit" href="/{{$payments->fileTransferToDesigner}}" title="ภาพหลักฐานการโอนเงินไปยังนักออกแบบ">

                                <img id="myImg" style="object-fit:cover; width:300px; height:300px;"  src="/{{$payments->fileTransferToDesigner}}" alt="">
                                </a>

                                @else
                                    <p class="text-secondary" style="padding-top:50%; opacity:50%; font-size:12px;">ยังไม่มีหลักฐานการโอนเงินไปยังนักออกแบบ</p>
                                @endif
        
                            </div>
                            <p>ภาพหลักฐานการโอนเงินไปยังนักออกแบบ</p>
        
                        </div>
        

                    <!-- The Modal -->
                    <div id="myModal" class="modal">

                        <!-- The Close Button -->
                        <span class="close" style="color:white;">
                            <i class="fas fa-times"></i>
                        </span>
                    
                        <!-- Modal Content (The Image) -->
                        <img class="modal-content" id="img01">
                    
                        <!-- Modal Caption (Image Text) -->
                        <div id="caption"></div>
                    </div>
                                            
        
                    </div>
                    <div class="text-left pt-5">
                        <h4 class="font-weight-bold">ยอดที่ชำระเงิน</h4>
                        <div class="row alert alert-secondary" role="alert">
                            <div class="col">
                                <p>ยอดชำระเงินทั้งหมด</p>
                            </div>
                            <div class="col text-right _hilight">
                                <p>{{number_format($payments->total_price)}} บาท</p>
                            </div>
                        </div>

                    </div>
                    <div class="text-left">
                        <div class="row alert alert-secondary" role="alert">
                            <div class="col">
                                <p>ยอดที่ต้องโอนให้นักออกแบบโดยหัก 5% แล้ว </p>
                            </div>
                            <div class="col text-right text-success">
                                <p>{{number_format($payments->total_price - ($payments->total_price * 0.05))}} บาท</p>
                            </div>
                        </div>

                    </div>
                    <div class="text-left pt-4">
                        <h4 class="font-weight-bold">โอนเข้าบัญชีของธนาคาร</h4>
                        <p>{{$payments->bank}}</p>
                    </div>
                    <div class="row text-left pt-4">
                        <div class="col">
                            <h4 class="font-weight-bold">วันที่โอนเงิน</h4>
                            <p>{{date('F d,Y',strtotime($payments->dateatTransfer))}}</p>
                        </div>
                        <div class="col">
                            <h4 class="font-weight-bold">เวลาที่โอนเงิน</h4>
                            <p>{{$payments->timeatTransfer}}</p>
                        </div>
                    </div>
                    <div class="text-left pt-4">
                        <h4 class="font-weight-bold">ข้อความเพิ่มเติม</h4>

                        @if ($payments->description == NULL)
                        <p class="text-secondary" style="opacity:50%;">ไม่มีข้อความเพิ่มเติม</p>
                        @else
                        <p>{{$payments->description}}</p>

                        @endif
                    </div>
                    <div class="text-right pt-5">
                        <a class="text-decoration-none" href="/dashboard">
                            <button type="button" class="btn btn-outline-dark text-center mb-5 ">ย้อนกลับ</button>
                        </a>
                        <button type="button" class="btn btn-outline-dark text-center mb-5 " data-toggle="modal" data-target=".exampleModal">
                            ปฏิเสธยอดชำระเงิน
                        </button>
                        <button type="button" class="btn btn-primary text-center mb-5" data-toggle="modal" data-target=".bd-example-modal-lg" style="background-color:black; border:none;">อนุมัติการโอนเงิน</button>
                    </div>
                </div>
            {{-- </form> --}}

            <form action="/admin/paymentsError/store" method="post" >
                {{ csrf_field() }}
            <div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <h1 class="modal-title text-center mt-5 mb-5 _hilight text-danger"  id="exampleModalLabel">ปฎิเสธยอดชำระเงิน</h1>
     
                                 <div class="row  ">
                                     <div class="col-2"></div>
                                     <div class="col-8">
                                        <label class="form-check text-left font-weight-bold" style="font-size:1.25rem">สาเหตุของข้อมูลการชำระเงินไม่ถูกต้อง</label>

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
                                            <input type="text" class="form-control"  name="problem_note">

                                          </div>
                                      </div>
                                     <div class="col-2"></div>
     
                                     
                                 </div>
                                 <hr class="mt-5">
                                 <div class="row">
                                     <div class="col-2"></div>
                                     <div class="col-8">
                                         <div class="text-right">
                                            <div class="mt-5 mb-5">
                                                <input type="hidden"  name="id" value="{{$payments->id}}">
                                                <input type="hidden"  name="payments_status" value="ยอดการชำระเงินมีปัญหา">
                                                <input  type="hidden" id="output" name="problem_note" >
            
            
                                                <button type="button" class="btn btn-outline-dark"  data-dismiss="modal">ยกเลิก</button>
                                                <a href="{{ route('payments.detail', $payments->id) }}">
                        
                                                    <button type="submit" class="btn btn-primary" style="background-color:black; border:none;">ยืนยันการทำรายการ</button>
                                                </a>
            
                                            </div>
                                         </div>
                                        
                                     </div>
                                     <div class="col-2"></div>

                                 </div>
                               
                                 
         
                            </div>
                
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="/admin/payments/store" method="post" enctype="multipart/form-data">
             {{ csrf_field() }}
           

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <input type="hidden"  name="id" value="{{$payments->id}}">
                    <input type="hidden"  name="payments_status" value="อนุมัติการโอนเงินเรียบร้อย">
                    <input type="hidden"  name="jobstatus_id" value="3">


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
                            
                            {{-- <hr> --}}
                                <h1 class="modal-title text-center _hilight mt-5 mb-5">คุณต้องการอนุมัติการโอนเงิน</h1>
 
                                <div class="row ">

                                    <div class="col-2"></div>
                                    <div class="col-8">
                                        <div class="row">
                                            <label class="mb-3  font-weight-bold" style="font-size:1.2rem; text-align:left;" >
                                                ยอดที่ต้องโอนให้นักออกแบบโดยหัก 5% แล้ว
                                            </label>
                                        </div>
                                    
                                    
                                        <div class="row text-center show-payment mb-4">
                                        <p  class="col-md-6 text-left" >ยอดชำระที่หัก 5%</label>
                                        <p class="col-md-6 _hilight text-right">{{number_format($payments->total_price - ($payments->total_price * 0.05))}}บาท</p> 
                                        <input hidden type="text" name="priceTransferToDesigner" value="{{$payments->total_price - ($payments->total_price * 0.05)}}">
                                        </div>

                                             
                                            <div class="row  mt-5">
                                             
                                                <label class="font-weight-bold text-left" style="font-size:1.25rem" for="">แนบรูปภาพการโอนเงิน</label>

                                        
                                                  </label>
                                                  
                                                    
                                                    <div class="col">
                                                        <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                                           <label><a href="javascript:void(0)" class="custom-file-container__image-clear" hidden title="Clear Image">&times;</a></label>
                                                           <label class="custom-file-container__custom-file" >
                                                               <input type="file" class="custom-file-container__custom-file__custom-file-input" name="fileTransferToDesigner" accept="*" multiple aria-label="Choose File">
                                                               <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                               <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                           </label>
                                                           <div class="custom-file-container__image-preview">
                                                               <div class="col-3">
                       
                                                               </div>
                                                           </div>
                                                       </div>
                                                       {{-- <div  id="thumb-output" style="display:flex; width:180px;height:180px;"></div> --}}
                       
                                                      
                                                    </div>
                                                  
                                                     
                                                     
                                                 
                                            
                                        </div> {{-- end --}}
                                        
                                           
                                                  
                             
                                                  
                                                      
                                    </div>
                                    <div class="col-2"></div>
                                        
                                 
                                </div>
                               
                                
                                {{-- <div class="form-group col-md-6">
                                  <label for="inputUsername">วันเกิดของคุณ</label>
                                  <div class="input-icons">
                                      <i class="fas fa-calendar-week icon"></i>
                                      <input type="date" id="basicDate" name="birthdate"  placeholder="MM/DD/YY" data-input>
                                  </div>
                              </div> --}}
                                
                                
                             <hr class="mt-5">
                             <div class="row">
                                 <div class="col-2"></div>
                                 <div class="col-8">
                                    <div class="text-right">
                                        <div class="mt-5 mb-5 " >
                                            <button type="button" class="btn btn-outline-dark"  data-dismiss="modal">ยกเลิก</button>
                    
                                                <button type="submit" class="btn btn-primary" style="background-color:black; border:none;">ยืนยันการเสร็จสิ้นงาน</button>
                                        </div>
                                     </div>
                                 </div>
                                 <div class="col-2"></div>

                             </div>
                             
                           
                             
     
                        
                        

                 
                        
                    </div>
                     
                    {{-- <div class="modal-footer text-center">
                        
                        </div> --}}
                </div>
            </div>
        </div>
    </form>

        </div>
       
    </div>
</section>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

<script>
    // Get the modal
    $(document).ready(function() {

        $('.image-popup-vertical-fit').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-img-mobile',
            image: {
                verticalFit: true
            }
            
        });

        $('.image-popup-fit-width').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            image: {
                verticalFit: false
            }
        });

        $('.image-popup-no-margins').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            closeBtnInside: false,
            fixedContentPos: true,
            mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 300 // don't foget to change the duration also in CSS
            }
        });

    });
</script>
<script>
    function addCart(v){
        document.getElementById('output').value = v
 
        console.log(v);
        return false;
    }
</script>
<script src="{{asset('js/file-upload-with-preview.js')}}"></script>