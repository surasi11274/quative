@extends('layouts.app')
@section('assets')
<link rel="stylesheet" href="css/adminlte.css">
    
@endsection
@section('content')
<section class="Dashboard">
    <div class="container mt_ex">
        <h2 class="font-weight-bold _gray ">Dashboard</h2>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                    <div class="inner">
                        <p>ผู้ใช้งาน</p>
                        <h3>1500</h3>
                        
                    </div>
                    <div class="icon"> <i class="ion ion-bag"></i> </div> <a href="/dashboard/userinfo" class="small-box-footer bg-dark" style="color:white !important;">ดูเพื่มเติม <i class="fas fa-arrow-circle-right"></i></a> </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                    <div class="inner">
                        <p>จำนวนการจ้างงาน</p>
                        <h3>2,000 </h3>
                    </div>
                    <div class="icon"> <i class="ion ion-stats-bars"></i> </div> <a href="/dashboard/totaljob" class="small-box-footer bg-dark" style="color:white !important;">ดูเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a> </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                    <div class="inner">
                        <p>ยอดรายรับกำไร</p>
                        <h3>฿19,000 </h3>
                    </div>
                    <div class="icon"> <i class="ion ion-person-add"></i> </div> <a href="/dashboard/totalprice" class="small-box-footer bg-dark" style="color:white !important;">ดูเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a> </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white">
                    <div class="inner">
                        <p> ผลงาน</p>
                        <h3>100</h3>
                    </div>
                    <div class="icon"> <i class="ion ion-pie-graph"></i> </div> <a href="#" class="small-box-footer bg-dark" style="color:white !important;">ดูเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a> </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header bg-white ">
                        <h4 class="card-title">
                          รายรับทั้งหมด
                        </h4>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                                <canvas id="myChart" height="900" style=" display: block; width: 910px;" width="1820" class="chartjs-render-monitor"></canvas>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                                <div class="card-header bg-white">
                                    <h4 class="card-title font-weight-bold">การโอนเงิน</h4>
                                   
                                </div>
                                <div class="card-body">
                                    <p class="mb-3">โอนเงินให้นักออกแบบ</p>
                                    <p class="_gray mb-3">รวม</p>
                                    <h1>฿6,000</h1>
                                    <hr class="mb-5 mt-5">
                                    <p class="mb-3">โอนเงินเข้าระบบทั้งหมด</p>
                                    <p class="_gray">รวม</p>
                                    <h1 class="mb-5">฿10,000</h1>
                                </div>
                         </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-white pt-5">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <h4 class="font-weight-bold">ตรวจสอบการโอนเงิน</h4>
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
                                
                                            <th scope="col">รหัสการจ้าง</th>
                                            {{-- <th scope="col">วันที่เริ่มงาน</th> --}}
                                            <th scope="col">วันที่ทำการ</th>
                                            <th scope="col">เวลาที่ทำการ</th>
                
                                            <th scope="col">จำนวนเงิน</th>
                                            <th scope="col">สถานะ</th>
                                           
                                          </tr>
                                        </thead>
                                
                                        <tbody class="table-light">
                                           
                                         {{-- @foreach ($payments as $payment) --}}
                                
                                           <tr >
                                
                                            <td class="pt-4 pb-4">
                                             {{-- <a href="{{ route('payments.detail', $payment->id) }}"> --}}
                                                
                                              {{-- <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button> --}}
                                             <p> No. W 222</p>
                                             
                                           </td>
                                            {{-- <td class="pt-4 pb-4">{{date('F d,Y',strtotime($payment->dateatTransfer))}}</td> --}}
                                            <td class="pt-4 pb-4">22/4/2563</td>
                                            {{-- <td class="pt-4 pb-4">{{$payment->timeatTransfer}}</td> --}}
                                            <td class="pt-4 pb-4">11:30</td>
                                            {{-- <td class="pt-4 pb-4 _hilight">{{$payment->total_price}}</td> --}}
                                            <td class="pt-4 pb-4 _hilight">50000</td>
                                            <td class="pt-4 pb-4 ">
                                                <a href="#">
                                              {{-- <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button> --}}
                                              <button type="button" class="btn _primary-btn btn-lg btn-block">รอการตรวจสอบ</button>
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

{{-- <canvas id="myChart" width="400" height="400"></canvas> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script src="js/datachart.js"></script>

@endsection

<script>
$('.my-select').selectpicker();
</script>

<script src="{{asset('js/adminlte.js')}}"></script>
