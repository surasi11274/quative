@extends('layouts.app')
@section('assets')

@endsection
@section('content')
<section class="totalprice mt-5">
    <div class="container ">
        {{-- <h2 class="font-weight-bold _gray ">Dashboard / ยอดรายรับกำไร</h2> --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-white pt-5">
                        <div class="row">
                            <div class="col-lg-9">
                                <h4 class="font-weight-bold">ยอดรายรับกำไร  (฿ {{number_format($transfered)}}) </h4>
                            </div>
                            <div class="col-lg-3">
                                <select class="selectpicker">
                                    <option>ล่าสุด</option>
                                    <option>เรียงตามลำดับใหม่ - เก่า</option>
                                    <option>เรียงตามลำดับเก่า - ใหม่</option>
                                  </select>

                                {{-- <div class="form-group">
                                    <select class="form-control custom-select" id="exampleFormControlSelect1">
                                      <option class="dropdown-item">ล่าสุด</option>
                                      <option class="dropdown-item">เรียงตามลำดับใหม่ - เก่า</option>
                                      <option class="dropdown-item">เรียงตามลำดับเก่า - ใหม่</option>

                                    </select>
                                  </div> --}}
                            </div>
                        </div>

                    </div>
                    <div class="card-body">





                             <table class="table table-borderless table-striped table-hover  text-center">

                                <thead>
                                  <tr>

                                    <th scope="col">รหัสการจ้าง</th>
                                    {{-- <th scope="col">วันที่เริ่มงาน</th> --}}
                                    <th scope="col">วันที่</th>
                                    <th scope="col">เวลา</th>
                                    <th scope="col">ยอดสุทธิิการจ้าง</th>
                                    <th scope="col">หักค่าธรรมเนียม</th>
                                    <th scope="col">รายรับ/กำ ไร</th>

                                  </tr>
                                </thead>

                                <tbody class="table-light">

                                 {{-- @foreach ($payments as $payment) --}}
                                 @foreach ($payments as $payment)

                                   <tr >

                                    <td class="pt-4 pb-4">
                                     {{-- <a href="{{ route('payments.detail', $payment->id) }}"> --}}

                                      {{-- <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button> --}}
                                      <a href="#">
                                        {{-- <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button> --}}
                                        <p class="font-weight-bold _hilight">W{{$payment->job_id}}</p>
                                       </a>

                                   </td>
                                    {{-- <td class="pt-4 pb-4">{{date('F d,Y',strtotime($payment->dateatTransfer))}}</td> --}}
                                    <td class="pt-4 pb-4">{{date('F d,Y',strtotime($payment->dateatTransfer))}}</td>
                                    {{-- <td class="pt-4 pb-4">{{$payment->timeatTransfer}}</td> --}}
                                    <td class="pt-4 pb-4">{{$payment->timeatTransfer}}</td>
                                    {{-- <td class="pt-4 pb-4 _hilight">{{$payment->total_price}}</td> --}}
                                    <td class="pt-4 pb-4 ">{{number_format($payment->total_price)}}</td>
                                    <td class="pt-4 pb-4 text-danger">{{number_format($payment->total_price)}} - {{number_format($payment->total_price * 0.05)}}</td>
                                    <td class="pt-4 pb-4 _hilight">{{number_format($payment->total_price * 0.05)}}</td>


                                    {{-- @php
                                    $jobstatusid = \App\Jobstatus::find($payment->jobstatus_id)->statusName;
                                     @endphp --}}
                                     {{-- @if($payment->payments_status == 'รออนุมัติ')
                                    <td class="pt-4 pb-4 text-warning">{{$payment->payments_status}}</td>
                                    @elseif($payment->payments_status == 'อนุมัติการโอนเงินเรียบร้อย')
                                    <td class="pt-4 pb-4 text-success">{{$payment->payments_status}}</td>
                                    @else
                                    <td class="pt-4 pb-4 text-danger">{{$payment->payments_status}}</td> --}}

                                    {{-- @endif --}}
                                    {{-- @endforeach --}}
                                    {{-- <td class="pt-4 pb-4"><span class="text-warning"●  </span>
                                     @if ($payment->payment_id ==! NULL)
                                     ชำระเงินแล้ว
                                     @else
                                     ยังไม่ได้ชำระเงิน

                                   @endif</td> --}}
                                  </tr>
                                  @endforeach

                                 {{-- @endforeach --}}



                                </tbody>

                              </table>

                        </div>


            </div>
        </div>
     </div>
</section>
@endsection
