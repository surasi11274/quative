@extends('layouts.app')
@section('assets')
    
@endsection
@section('content')
<section class="billing">
    <div class="container bg-white mt-5 shadow-sm p-md-5">
      <div class="text-center text-md-left">
        <h2 class=" font-weight-bold"> ภาพรวมรายรับของฉัน</h2>
        <hr>
        <div class="row">
            <div class="col-12 col-md-4">
                <p>เตรียมการโอนเงิน</p>
                <p class="_gray pt-3">รวม</p>
            <h3 class="font-weight-bold _hilight">฿{{number_format($wtransfer - ($wtransfer * 0.05))}}</h3>
            </div>
            <div class="col-12 col-md-4">
                <p>รับเงินแล้วทั้งหมด</p>
                <p class="_gray pt-3">รวม</p>
            <h3 class="font-weight-bold _hilight">฿{{number_format($transfered - ($transfered * 0.05))}}</h3>
            </div>
            <div class="col-12 col-md-auto">

            </div>
        </div>
      </div>
            
        
    </div>
    <div class="container bg-white mt-3 shadow-sm p-md-5">
        <div class="text-center text-md-left">
            <h5 class=" font-weight-bold mb-2 "> รายละเอียดรายรับของฉัน</h5>
            <p>อัตราค่าธรรมเนียมการใช้ Quative 5% สำหรับการจ้างงานในแต่ละครั้ง </p>
            <small class="_hilight">
                หมายเหตุ: โดยคิดจากยอดการจ้างสุทธิในแต่ละการจ้างของราคาก่อนที่จะทำการโอนยอดเงินทั้งหมดเข้าไปที่นักออกแบบ
            </small>
            <ul class="nav nav-tabs p-3 mt-5" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active _hilight" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">เตรียมการโอนเงิน</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link _hilight" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">รับเงินแล้ว</a>
                </li>
                
              </ul>
              <div class="tab-content" id="myTabContent">
                  {{-- 1  --}}
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr class="text-center">
                  
                              <th scope="col">รหัสการจ้าง</th>
                              <th scope="col">วันที่</th>
                              {{-- <th scope="col">วันที่เริ่มงาน</th> --}}
                              <th scope="col">เวลา</th>
                              <th scope="col">ยอดเงินที่ได้รับโดยหัก 5% แล้ว</th>
                              <th scope="col">สถานะการชำระเงิน</th>
                             

                             
                            </tr>
                          </thead>
                          <tbody class="table-light">
                                    
                                @foreach ($payments as $payment)
                                @if ($payment->payments_status == 'รออนุมัติ')

                                <tr class="text-center">
                                    <td class="pt-4 pb-4">
                                            <p>No. {{$payment->job_id}}</p>
                                            {{-- <button type="button" class="btn _primary-btn">No. W{{$job->id}}</button> --}}
                                        
                                    </td>
                                    <td class="pt-4 pb-4">{{date('F d,Y',strtotime($payment->dateatTransfer))}}</td>
                                    {{-- <td class="pt-4 pb-4">{{$job->price}}</td> --}}
                                    <td class="pt-4 pb-4">{{$payment->timeatTransfer}}</td>
                                    <td class="pt-4 pb-4 _hilight">{{number_format(($payment->total_price - ($payment->total_price * 0.05)))}}</td>
                                    <td class="pt-4 pb-4">
                                        <span class="text-warning">{{$payment->payments_status}}</span>
                                    </td>
                                </tr>
                                @endif

                                @endforeach

                          </tbody>
                    </table>
                </div>
                {{-- 2  --}}
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr class="text-center">
                  
                              <th scope="col">รหัสการจ้าง</th>
                              <th scope="col">วันที่</th>
                              {{-- <th scope="col">วันที่เริ่มงาน</th> --}}
                              <th scope="col">เวลา</th>
                              <th scope="col">ยอดเงินที่ได้รับโดยหัก 5% แล้ว</th>
                              <th scope="col">สถานะการชำระเงิน</th>
                              <th scope="col">หลักฐานโอนเงิน</th>

                            </tr>
                          </thead>
                          <tbody class="table-light">
                            @foreach ($payments as $payment)
                                @if ($payment->payments_status == 'อนุมัติการโอนเงินเรียบร้อย')

                                <tr class="text-center">
                                    <td class="pt-4 pb-4">
                                            <p>No. {{$payment->job_id}}</p>
                                            {{-- <button type="button" class="btn _primary-btn">No. W{{$job->id}}</button> --}}
                                        
                                    </td>
                                    <td class="pt-4 pb-4">{{date('F d,Y',strtotime($payment->dateatTransfer))}}</td>
                                    {{-- <td class="pt-4 pb-4">{{$job->price}}</td> --}}
                                    <td class="pt-4 pb-4">{{$payment->timeatTransfer}}</td>
                                    <td class="pt-4 pb-4 _hilight">{{number_format($payment->priceTransferToDesigner)}}</td>
                                    <td class="pt-4 pb-4">
                                        <span class="text-success">{{$payment->payments_status}}</span>
                                    </td>
                                    <td class="pt-4 pb-4 ">
                                        <a class="image-popup-vertical-fit" href="/{{$payment->fileTransferToDesigner}}" title="หลักฐานโอนเงิน">
                                            <button type="button" class="btn _primary-btn btn-block"> <i class="far fa-eye"></i></button>
                                            {{-- <button type="button" class="btn _primary-btn">No. W{{$job->id}}</button> --}}
                                        </a>                                    </td>
                                </tr>
                                @endif

                                @endforeach
                          </tbody>
                    </table>
                </div>
                
              </div>
           
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