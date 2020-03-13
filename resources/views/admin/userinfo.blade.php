@extends('layouts.app')
@section('assets')
    
@endsection
@section('content')
 <section class="userinfo">
     <div class="container mt_ex">
        <h2 class="font-weight-bold _gray ">Dashboard / ผู้ใช้งาน</h2>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-white pt-5">
                        <div class="row">
                            <div class="col-lg-9">
                                <h4 class="font-weight-bold">ผู้ใช้งานทั้งหมด (2,000)  </h4>
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
                        <ul class="nav nav-tabs p-3" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active _hilight" id="home-tab" data-toggle="tab" href="#waiting" role="tab" aria-controls="home" aria-selected="true">รอตรวจสอบการโอนเงิน</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#done" role="tab" aria-controls="profile" aria-selected="false">อนุมัติแล้ว</a>
                            </li>
                            
                          </ul>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="waiting" role="tabpanel" aria-labelledby="nav-home-tab">
                          
                           
                        
                             <table class="table table-hover table-bordered text-center">
                        
                                <thead class="thead-dark">
                                  <tr>
                        
                                    <th scope="col">รหัส</th>
                                    {{-- <th scope="col">วันที่เริ่มงาน</th> --}}
                                    <th scope="col">ชื่อผู้ใช้</th>
                                    <th scope="col">อีเมล</th>
        
                                    <th scope="col">สถานะ</th>
                                    <th scope="col">สถานะ</th>
                                   
                                  </tr>
                                </thead>
                        
                                <tbody class="table-light">
                                   
                                 {{-- @foreach ($payments as $payment) --}}
                        
                                   <tr >
                        
                                    <td class="pt-4 pb-4"><a href="#">
                                     {{-- <a href="{{ route('payments.detail', $payment->id) }}"> --}}
                                        
                                      {{-- <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button> --}}
                                     <p> 01</p>
                                     
                                   </td>
                                    {{-- <td class="pt-4 pb-4">{{date('F d,Y',strtotime($payment->dateatTransfer))}}</td> --}}
                                    <td class="pt-4 pb-4">plai</td>
                                    {{-- <td class="pt-4 pb-4">{{$payment->timeatTransfer}}</td> --}}
                                    <td class="pt-4 pb-4">plai@gmail.com</td>
                                    {{-- <td class="pt-4 pb-4 _hilight">{{$payment->total_price}}</td> --}}
                                    <td class="pt-4 pb-4 _hilight">ผู้ใช้ธรรมดา</td>
                                    <td class="pt-4 pb-4 ">
                                        <a href="#"></a>
                                      {{-- <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button> --}}
                                      <button type="button" class="btn _primary-black btn-lg btn-block">ระงับการใช้งาน</button>
                                     </a>
                                        </td>
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
                             
                                  
                                 {{-- @endforeach --}}
                        
                        
                                
                                </tbody>
                        
                              </table>
                        
                        </div> 
                        <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="nav-contact-tab">
                            ...
                           </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
 </section>
@endsection
