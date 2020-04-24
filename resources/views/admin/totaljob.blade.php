@extends('layouts.app')
@section('assets')
    
@endsection
@section('content')
<section class="totaljob mt-5">
    <div class="container ">
        {{-- <h2 class="font-weight-bold _gray ">Dashboard / จำนวนการจ้างงาน</h2> --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-white pt-5">
                        <div class="row">
                            <div class="col-lg-9">
                                <h4 class="font-weight-bold">จำนวนการจ้างงาน  ({{$jobs->count()}})  </h4>
                            </div>
                          
                        </div>
                       
                    </div>
                    <div class="card-body">
                       
                    
                          
                           
                        
                             <table class="table table-borderless table-striped table-hover  text-center">
                        
                                <thead >
                                      
                                  <tr>
                        
                                    <th scope="col">รหัสการจ้าง</th>
                                    {{-- <th scope="col">วันที่เริ่มงาน</th> --}}
                                    <th scope="col">วันที่</th>
                                    <th scope="col">ผู้จ้างงาน</th>
        
                                    <th scope="col">นักออกแบบ</th>
                                    <th scope="col">สถานะผู้จ้าง</th>
                                    <th scope="col">สถานะนักออกแบบ</th>

                                   
                                  </tr>
                                </thead>
                        
                                <tbody class="table-light">
                                   
                                 @foreach ($jobs as $job)
                                   @php
                                        if ($job->user_id !== NULL) {
                                          $user = \App\User::find($job->user_id);
                                        }
                                        if ($job->designer_id !== NULL) {
                                          $designer = \App\Designer::find($job->designer_id);
                                        }
                                        if ($job->jobstatus_id !== NULL) {
                                          $jobstatus = \App\Jobstatus::find($job->jobstatus_id);
                                        }

                                   @endphp
                                   <tr >
                        
                                    <td class="pt-4 pb-4">
                                     {{-- <a href="{{ route('payments.detail', $payment->id) }}"> --}}
                                        
                                      {{-- <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button> --}}
                                      {{-- <a href="#"> --}}
                                        {{-- <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button> --}}
                                        <p class="_hilight font-weight-bold"> W{{$job->id}}</p>
                                       {{-- </a> --}}
                                     
                                   </td>
                                    {{-- <td class="pt-4 pb-4">{{date('F d,Y',strtotime($payment->dateatTransfer))}}</td> --}}
                                    <td class="pt-4 pb-4">{{date('F d,Y',strtotime($job->created_at))}}</td>
                                    {{-- <td class="pt-4 pb-4">{{$payment->timeatTransfer}}</td> --}}
                                    
                                    @if ($user)
                                      <td class="pt-4 pb-4">{{$user->name}}</td>
                                    @endif

                                    @if ($designer)
                                    <td class="pt-4 pb-4 ">{{$designer->name}}</td>

                                    @endif

                                    {{-- <td class="pt-4 pb-4 _hilight">{{$payment->total_price}}</td> --}}
                                    <td class="pt-4 pb-4 ">
                                      {{-- <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button> --}}
                                      <p class="_hilight">
                                        {{$jobstatus->statusName}}
                                       
                                      </p>
                                    </td>
                                    <td class="pt-4 pb-4 ">
                                      {{-- <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button> --}}
                                      <p class="_hilight">
                                        
                                        {{$jobstatus->statusUserName}}
                                      </p>
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
                       
                   
            </div>
        </div>
     </div>
</section>

@endsection
