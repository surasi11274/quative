@extends('layouts.app')

@section('content')
<section class="content ">
    <div class="container mt-5">
        <div class="shadow-sm bg-white">
            <div class="container pt-5 pb-5" style="height:auto;">
                <div class="row ml-1 mb-3">
                    <h3>ตรวจสอบการโอนเงิน</h3>
                  </div>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  
                   
                
                     <table class="table table-hover table-bordered text-center">
                
                        <thead class="thead-dark">
                          <tr>
                
                            <th scope="col">รหัสการจ้าง</th>
                            {{-- <th scope="col">วันที่เริ่มงาน</th> --}}
                            <th scope="col">วันที่ทำการ</th>
                            <th scope="col">เวลาที่ทำการ</th>

                            <th scope="col">จำนวนเงิน</th>
                            <th scope="col">สถานะ</th>
                           
                          </tr>
                        </thead>
                
                        <tbody class="table-light">
                           
                         @foreach ($payments as $payment)
                          
                        
                          
                           {{-- <button class="btn "> --}}
                           <tr >
                
                            <td class="pt-4 pb-4"><a href="#">
                             <a href="{{ route('payments.detail', $payment->id) }}">
                              <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button>
                             </a>
                           </td>
                            <td class="pt-4 pb-4">{{date('F d,Y',strtotime($payment->dateatTransfer))}}</td>
                            <td class="pt-4 pb-4">{{$payment->timeatTransfer}}</td>
                            <td class="pt-4 pb-4 _hilight">{{$payment->total_price}}</td>

                            {{-- @php
                            $jobstatusid = \App\Jobstatus::find($payment->jobstatus_id)->statusName;
                             @endphp --}}
                             @if($payment->payments_status == 'รออนุมัติ')
                            <td class="pt-4 pb-4 text-warning">{{$payment->payments_status}}</td>
                            @elseif($payment->payments_status == 'อนุมัติการโอนเงินเรียบร้อย')
                            <td class="pt-4 pb-4 text-success">{{$payment->payments_status}}</td>
                            @else
                            <td class="pt-4 pb-4 text-danger">{{$payment->payments_status}}</td>

                            @endif
                            {{-- @endforeach --}}
                            {{-- <td class="pt-4 pb-4"><span class="text-warning"●  </span>
                             @if ($payment->payment_id ==! NULL)
                             ชำระเงินแล้ว
                             @else
                             ยังไม่ได้ชำระเงิน
                
                           @endif</td> --}}
                          </tr>
                     
                          
                         @endforeach
                
                
                        
                        </tbody>
                
                      </table>
                
                </div> <!-- endnav -->
                
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                      ...
                     </div>
                
                
                </div>
            </div>
        </div>
    </div>
</section>
@endsection