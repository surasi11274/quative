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
                                <h4 class="font-weight-bold">ผู้ใช้งานทั้งหมด ({{$users->count()}})  </h4>
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
                        
                      
                          
                           
                        
                             <table class="table table-hover table-bordered text-center">
                        
                                <thead class="thead-dark">
                                  <tr>
                        
                                    <th scope="col">รหัส</th>
                                    {{-- <th scope="col">วันที่เริ่มงาน</th> --}}
                                    <th scope="col">ชื่อผู้ใช้</th>
                                    <th scope="col">อีเมล</th>
        
                                    <th scope="col">สถานะ</th>
                                    <th scope="col">ใช้งานล่าสุด</th>

                                    <th scope="col">สถานะ</th>
                                   
                                  </tr>
                                </thead>
                        
                                <tbody class="table-light">
                                   
                                 @foreach ($users as $user)
                        
                                   <tr >
                        
                                    <td class="pt-4 pb-4">
                                     {{-- <a href="{{ route('payments.detail', $payment->id) }}"> --}}
                                            {{-- <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button> --}}
                                            
                                      {{-- <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button> --}}
                                     <p>{{$user->id}}</p>
                                     
                                   </td>
                                    {{-- <td class="pt-4 pb-4">{{date('F d,Y',strtotime($payment->dateatTransfer))}}</td> --}}
                                    <td class="pt-4 pb-4">{{$user->name}}</td>
                                    {{-- <td class="pt-4 pb-4">{{$payment->timeatTransfer}}</td> --}}
                                    <td class="pt-4 pb-4">{{$user->email}}</td>

                                    {{-- <td class="pt-4 pb-4 _hilight">{{$payment->total_price}}</td> --}}
                                    <td class="pt-4 pb-4 _hilight">
                                      @if ($user->role == 0)
                                        <p class="text-primary">
                                          ผู้ใช้ธรรมดา
                                        </p>
                                      @elseif($user->role == 1)
                                      <p class="text-danger">
                                        นักออกแบบ
                                      </p>
                                      @endif
                                    </td>
                                    <td class="pt-4 pb-4">xx</td>

                                    <td class="pt-4 pb-4 ">
                                        <a href="#">
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
                             
                                  
                                 @endforeach
                        
                        
                                
                                </tbody>
                        
                              </table>
                        
                        </div> 
                        <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="nav-contact-tab">
                            ...
                           </div>
            </div>
        </div>
     </div>
 </section>
@endsection
