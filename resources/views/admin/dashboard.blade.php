@extends('layouts.app')
@section('assets')
<link rel="stylesheet" href="../css/adminlte.css">
    
@endsection
@section('content')
<section class="Dashboard mt-5">
    <div class="container">
        <h2 class="font-weight-bold _hilight ">Dashboard</h2>
        <div class="row mt-5">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white text-center">
                    <div class="inner">
                        <p>ผู้ใช้งาน</p>
                        <h3 class="_hilight">{{number_format($users->count())}}</h3>
                        
                    </div>
                    <div class="icon"> <i class="ion ion-bag"></i> </div> <a href="/dashboard/userinfo" class="small-box-footer bg-dark" style="color:white !important;">ดูเพื่มเติม <i class="fas fa-arrow-circle-right"></i></a> </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white text-center">
                    <div class="inner">
                        <p>จำนวนการจ้างงาน</p>
                        <h3 class="_hilight">{{number_format($jobs->count())}}</h3>
                    </div>
                    <div class="icon"> <i class="ion ion-stats-bars"></i> </div> <a href="/dashboard/totaljob" class="small-box-footer bg-dark" style="color:white !important;">ดูเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a> </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white text-center">
                    <div class="inner">
                        <p>ยอดรายรับกำไร</p>
                        <h3 class="_hilight">฿{{number_format($transfered * 0.05)}} </h3>
                    </div>
                    <div class="icon"> <i class="ion ion-person-add"></i> </div> <a href="/dashboard/totalprice" class="small-box-footer bg-dark" style="color:white !important;">ดูเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a> </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white text-center">
                    <div class="inner">
                        <p> ผลงาน</p>
                        <h3 class="_hilight">{{number_format($canshows->count())}}</h3>
                    </div>
                    <div class="icon"> </div> <a href="#" class="small-box-footer bg-white" style="cursor:none;color:white !important;">ดูเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a> </div>
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
                                <div class="card-header bg-white text-center">
                                    <h4 class="card-title font-weight-bold ">การโอนเงิน</h4>
                                   
                                </div>
                                <div class="card-body text-center">
                                    <p class="mb-3">โอนเงินเข้าระบบทั้งหมด</p>
                                    <p class="_gray mb-3">รวม</p>
                                    <h1 class="_hilight">฿{{number_format($wtransfer)}}</h1>
                                    <hr class="mb-5 mt-5">
                                    <p class="mb-3">โอนเงินให้นักออกแบบ</p>
                                    <p class="_gray">รวม</p>
                                    <h1 class="mb-5 _hilight">฿{{number_format($transferedToDesigner)}}</h1>
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
                                      <a class="nav-link active " id="home-tab" data-toggle="tab" href="#waiting" role="tab" aria-controls="home" aria-selected="true">รอตรวจสอบการโอนเงิน</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#done" role="tab" aria-controls="profile" aria-selected="false">อนุมัติแล้ว</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="problem-tab" data-toggle="tab" href="#problem" role="tab" aria-controls="problem" aria-selected="false">ยอดมีปัญหา</a>
                                      </li>
                                    
                                  </ul>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="waiting" role="tabpanel" aria-labelledby="nav-home-tab">
                                  
                                   
                                
                                     <table class="table table-borderless table-striped table-hover  text-center">
                                
                                        <thead >
                                          <tr>
                                
                                            <th scope="col">รหัสการจ้าง</th>
                                            {{-- <th scope="col">วันที่เริ่มงาน</th> --}}
                                            <th scope="col">วันที่ทำการ</th>
                                            <th scope="col">เวลาที่ทำการ</th>
                
                                            <th scope="col">จำนวนเงิน</th>
                                            <th scope="col">สถานะ</th>
                                            <th scope="col">Action</th>

                                           
                                          </tr>
                                        </thead>
                                
                                        <tbody class="table-light">
                                           
                                         @foreach ($payments as $payment)
                                         @if ($payment->payments_status == 'รออนุมัติ')

                                           <tr >
                                
                                            <td class="pt-4 pb-4">
                                             {{-- <a href="{{ route('payments.detail', $payment->id) }}"> --}}
                                                
                                              {{-- <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button> --}}
                                             <p class="_hilight font-weight-bold">W{{$payment->job_id}}</p>
                                             
                                           </td>
                                            {{-- <td class="pt-4 pb-4">{{date('F d,Y',strtotime($payment->dateatTransfer))}}</td> --}}
                                            <td class="pt-4 pb-4">{{date('F d,Y',strtotime($payment->dateatTransfer))}}</td>
                                            {{-- <td class="pt-4 pb-4">{{$payment->timeatTransfer}}</td> --}}
                                            <td class="pt-4 pb-4">{{$payment->timeatTransfer}}</td>
                                            {{-- <td class="pt-4 pb-4 _hilight">{{$payment->total_price}}</td> --}}
                                            <td class="pt-4 pb-4 _hilight">{{number_format($payment->total_price)}}</td>
                                            @if($payment->payments_status == 'รออนุมัติ')
                                            <td class="pt-4 pb-4 text-warning">{{$payment->payments_status}}</td>
                                            @elseif($payment->payments_status == 'อนุมัติการโอนเงินเรียบร้อย')
                                            <td class="pt-4 pb-4 text-success">{{$payment->payments_status}}</td>
                                            @else
                                            <td class="pt-4 pb-4 text-danger">{{$payment->payments_status}}</td>

                                            @endif
                                            <td class="pt-4 pb-4">
                                                <a href="{{ route('payments.detail', $payment->id) }}">
                                                 <button type="button" class="btn _primary-btn">ตรวจสอบ</button>
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
                                     
                                        @endif

                                         @endforeach
                                
                                
                                        
                                        </tbody>
                                
                                      </table>
                                
                                </div> 
                                <div class="tab-pane fade" id="done" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        
                                    <table class="table table-borderless table-striped table-hover  text-center">
                                
                                        <thead >
                                          <tr>
                                
                                            <th scope="col">รหัสการจ้าง</th>
                                            {{-- <th scope="col">วันที่เริ่มงาน</th> --}}
                                            <th scope="col">วันที่ทำการ</th>
                                            <th scope="col">เวลาที่ทำการ</th>
                
                                            <th scope="col">จำนวนเงิน</th>
                                            <th scope="col">สถานะ</th>
                                            <th scope="col">Action</th>

                                           
                                          </tr>
                                        </thead>
                                
                                        <tbody class="table-light">
                                           
                                         @foreach ($payments as $payment)
                                         @if ($payment->payments_status == 'อนุมัติการโอนเงินเรียบร้อย')

                                           <tr >
                                
                                            <td class="pt-4 pb-4">
                                             {{-- <a href="{{ route('payments.detail', $payment->id) }}"> --}}
                                                
                                              {{-- <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button> --}}
                                             <p> No. W{{$payment->job_id}}</p>
                                             
                                           </td>
                                            {{-- <td class="pt-4 pb-4">{{date('F d,Y',strtotime($payment->dateatTransfer))}}</td> --}}
                                            <td class="pt-4 pb-4">{{date('F d,Y',strtotime($payment->dateatTransfer))}}</td>
                                            {{-- <td class="pt-4 pb-4">{{$payment->timeatTransfer}}</td> --}}
                                            <td class="pt-4 pb-4">{{$payment->timeatTransfer}}</td>
                                            {{-- <td class="pt-4 pb-4 _hilight">{{$payment->total_price}}</td> --}}
                                            <td class="pt-4 pb-4 _hilight">{{number_format($payment->total_price)}}</td>
                                            @if($payment->payments_status == 'รออนุมัติ')
                                            <td class="pt-4 pb-4 text-warning">{{$payment->payments_status}}</td>
                                            @elseif($payment->payments_status == 'อนุมัติการโอนเงินเรียบร้อย')
                                            <td class="pt-4 pb-4 text-success">{{$payment->payments_status}}</td>
                                            @else
                                            <td class="pt-4 pb-4 text-danger">{{$payment->payments_status}}</td>

                                            @endif
                                            <td class="pt-4 pb-4">
                                                <a href="{{ route('payments.detail', $payment->id) }}">
                                                 <button type="button" class="btn _primary-btn">ตรวจสอบ</button>
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
                                     
                                            @endif

                                         @endforeach
                                
                                
                                        
                                        </tbody>
                                
                                      </table>

                                </div>
                                <div class="tab-pane fade" id="problem" role="tabpanel" aria-labelledby="nav-problem-tab">
                                        
                                    <table class="table table-borderless table-striped table-hover  text-center">
                                
                                        <thead >
                                          <tr>
                                
                                            <th scope="col">รหัสการจ้าง</th>
                                            {{-- <th scope="col">วันที่เริ่มงาน</th> --}}
                                            <th scope="col">วันที่ทำการ</th>
                                            <th scope="col">เวลาที่ทำการ</th>
                
                                            <th scope="col">จำนวนเงิน</th>
                                            <th scope="col">สถานะ</th>
                                            <th scope="col">Action</th>

                                           
                                          </tr>
                                        </thead>
                                
                                        <tbody class="table-light">
                                           
                                         @foreach ($payments as $payment)
                                         @if ($payment->payments_status !== 'อนุมัติการโอนเงินเรียบร้อย' && $payment->payments_status !== 'รออนุมัติ')

                                           <tr >
                                
                                            <td class="pt-4 pb-4">
                                             {{-- <a href="{{ route('payments.detail', $payment->id) }}"> --}}
                                                
                                              {{-- <button type="button" class="btn _primary-btn">No. W{{$payment->job_id}}</button> --}}
                                             <p> No. W{{$payment->job_id}}</p>
                                             
                                           </td>
                                            {{-- <td class="pt-4 pb-4">{{date('F d,Y',strtotime($payment->dateatTransfer))}}</td> --}}
                                            <td class="pt-4 pb-4">{{date('F d,Y',strtotime($payment->dateatTransfer))}}</td>
                                            {{-- <td class="pt-4 pb-4">{{$payment->timeatTransfer}}</td> --}}
                                            <td class="pt-4 pb-4">{{$payment->timeatTransfer}}</td>
                                            {{-- <td class="pt-4 pb-4 _hilight">{{$payment->total_price}}</td> --}}
                                            <td class="pt-4 pb-4 _hilight">{{number_format($payment->total_price)}}</td>
                                            @if($payment->payments_status == 'รออนุมัติ')
                                            <td class="pt-4 pb-4 text-warning">{{$payment->payments_status}}</td>
                                            @elseif($payment->payments_status == 'อนุมัติการโอนเงินเรียบร้อย')
                                            <td class="pt-4 pb-4 text-success">{{$payment->payments_status}}</td>
                                            @else
                                            <td class="pt-4 pb-4 text-danger">{{$payment->payments_status}}</td>

                                            @endif
                                            <td class="pt-4 pb-4">
                                                <a href="{{ route('payments.detail', $payment->id) }}">
                                                 <button type="button" class="btn _primary-btn">ตรวจสอบ</button>
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
                                     
                                            @endif

                                         @endforeach
                                
                                
                                        
                                        </tbody>
                                
                                      </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $jan = \App\Payment::select('total_price')->whereBetween('created_at',['2020-01-01 00:00:00','2020-01-31 00:00:00'])->where('payments_status','อนุมัติการโอนเงินเรียบร้อย')->sum('total_price');
                $feb = \App\Payment::select('total_price')->whereBetween('created_at',['2020-02-01 00:00:00','2020-02-29 00:00:00'])->where('payments_status','อนุมัติการโอนเงินเรียบร้อย')->sum('total_price');
                $mar = \App\Payment::select('total_price')->whereBetween('created_at',['2020-03-01 00:00:00','2020-03-31 00:00:00'])->where('payments_status','อนุมัติการโอนเงินเรียบร้อย')->sum('total_price');
                $apr = \App\Payment::select('total_price')->whereBetween('created_at',['2020-04-01 00:00:00','2020-04-30 00:00:00'])->where('payments_status','อนุมัติการโอนเงินเรียบร้อย')->sum('total_price');
                $may = \App\Payment::select('total_price')->whereBetween('created_at',['2020-05-01 00:00:00','2020-05-31 00:00:00'])->where('payments_status','อนุมัติการโอนเงินเรียบร้อย')->sum('total_price');
                $jun = \App\Payment::select('total_price')->whereBetween('created_at',['2020-06-01 00:00:00','2020-06-30 00:00:00'])->where('payments_status','อนุมัติการโอนเงินเรียบร้อย')->sum('total_price');
                $jul = \App\Payment::select('total_price')->whereBetween('created_at',['2020-07-01 00:00:00','2020-07-31 00:00:00'])->where('payments_status','อนุมัติการโอนเงินเรียบร้อย')->sum('total_price');
                $aug = \App\Payment::select('total_price')->whereBetween('created_at',['2020-08-01 00:00:00','2020-08-31 00:00:00'])->where('payments_status','อนุมัติการโอนเงินเรียบร้อย')->sum('total_price');
                $sep = \App\Payment::select('total_price')->whereBetween('created_at',['2020-09-01 00:00:00','2020-09-30 00:00:00'])->where('payments_status','อนุมัติการโอนเงินเรียบร้อย')->sum('total_price');
                $oct = \App\Payment::select('total_price')->whereBetween('created_at',['2020-10-01 00:00:00','2020-10-30 00:00:00'])->where('payments_status','อนุมัติการโอนเงินเรียบร้อย')->sum('total_price');
                $nov = \App\Payment::select('total_price')->whereBetween('created_at',['2020-11-01 00:00:00','2020-11-30 00:00:00'])->where('payments_status','อนุมัติการโอนเงินเรียบร้อย')->sum('total_price');
                $dec = \App\Payment::select('total_price')->whereBetween('created_at',['2020-12-01 00:00:00','2020-12-31 00:00:00'])->where('payments_status','อนุมัติการโอนเงินเรียบร้อย')->sum('total_price');

            @endphp
</section>

{{-- <canvas id="myChart" width="400" height="400"></canvas> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
{{-- <script src="js/datacharts.js"></script> --}}
<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Fab', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
        datasets: [{
            label: 'Sumary of Price',
            data: [{{$jan}}, {{$feb}}, {{$mar}}, {{$apr}}, {{$may}}, {{$jun}},{{$jul}}, {{$aug}}, {{$sep}}, {{$oct}}, {{$nov}}, {{$dec}}],
        
            backgroundColor: [
                'rgba(82,62,232,0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(82,62,232,1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 3,
            order: 1
        },{
            label: 'Recent of price',
            data: [0, 9000, 15000, 9000, 10000, 12000,6000, 5000, 15000, 2500, 10000, 15000],
            type: 'line',
            // this dataset is drawn on top
            order: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});



</script>

@endsection

<script>
$('.my-select').selectpicker();
</script>

<script src="{{asset('js/adminlte.js')}}"></script>
