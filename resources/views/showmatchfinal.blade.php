@extends('layouts.app')
@section('content')
<div class="container mt_ex ">
    <div class=" mt-5 " style="width: 100%;padding-top: 30px;">
        <form class="form-match" action="/search/create/store3" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
                         <div class="p-5" >
                        
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <h2 class="selectfillter  pt-5">ขอบเขตที่ต้องการงาน</h2>
                                        <small>
                                            *ระบบจะค้นหาจากราคาที่ใกล้มากที่สุดจากกลุ่มนักออกแบบ*
                                        </small>
                                        <select name="pricerate"  class=" detaill-select form-control mt-5 mb-5">
                                            <option class="dropdown-item" value="2900">งานออกแบบฉลากติดสินค้าหน้าเดียว
                                                <span style="text-color: #ff3957;">ราคา ฿2,900</span>
                                            </option>
                                            <option class="dropdown-item" value="4500">ออกแบบกล่องแพคเกจ
                                                <span style="text-color: #ff3957;">ราคา ฿4,500</span>
                                            </option>
                                            <option class="dropdown-item" value="7900">ออกแบบฉลากติดสินค้า พร้อม กล่องแพคเกจ
                                                <span style="text-color: #ff3957;">ราคา ฿7,900</span>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                              <div class="row">
                                  <div class="col-12 col-md-8">
                                      <h2 class="selectfillter  pt-5">วันที่ต้องการงาน</h2>
                                              {{--<input type="date" id="basicDate"  name="finishdate" placeholder="MM/DD/YY" data-input>--}}
                                      <div class="row">
                                          <div class="col-12">
                                              <div class="select-date">
                                                <div class="middle">
                                                    <label>
                                                    <input type="radio" name="radio" checked/>
                                                    <div class="front-end box">
                                                      <span>ธรรมดา <br>
                                                    <p>  15 วัน</p>
                                                    </span>
                                                     
                                                    </div>
                                                  </label>
                                                  
                                                    <label>
                                                    <input type="radio" name="radio"/>
                                                    <div class="back-end box">
                                                        <span>ด่วน <br>
                                                            <p>7 วัน (+฿500)</p>
                                                          </span>
                                                    </div>
                                                  </label>
                                                  <label>
                                                    <input type="radio" name="radio" checked/>
                                                    <div class="front-end box">
                                                        <span>ด่วนมาก <br>
                                                           <p>5 วัน (+฿1,000)</p> 
                                                          </span>
                                                    </div>
                                                  </label>
                                                  
                                        
                                                  </div>
                                                  {{-- <ul class="box-tag d-flex">
                                        
                                                      <li class="m-5">
                                                        <label class="_area-2">
                                                          <input type="radio" checked="checked" id="customRadioInline1" name="finishdate" class="custom-control-input">
                                                         <p>ธรรมดา</p>
                                                          <h5>15 <small>วัน</small></h5>
                                                          <span class="checkmark-price"></span>
                                                        </label>
                                                      </li>
                                                      <li class="m-5">
                                                          <input type="radio" id="customRadioInline2" name="finishdate" class="custom-control-input">
                                                          <label class="custom-control-label" for="customRadioInline2">ด่วน</label>
                                                          <h5>7 <small>วัน (+฿5000)</small></h5>
                                                      </li>
                                                      <li class="m-5">
                                                          <input type="radio" id="customRadioInline3" name="finishdate" class="custom-control-input">
                                                          <label class="custom-control-label" for="customRadioInline3">ด่วนมาก</label>
                                                          <h5>5 <small>วัน (+฿1,000)</small></h5>
                                                      </li>
         
                                                  </ul> --}}
                                              </div>
                                              
                                          </div>
                                          
                                      </div>
                                      <div class=" form-group  ">
                                        <h5>วันอื่นๆที่ต้องการงาน</h5>
                                        <div class="input-icons">
                                           
                                            <input class="form-control icons icon calendar " type="date" id="basicDate" name="birthdate"  placeholder="MM/DD/YY" data-input>
                                            {{-- <span class="icon calendar"></span> --}}
                                        </div>
                                    </div>
                                      </div>
                                  <div class="col-12 col-md-4">
                                      <div class="total-price p-3">
                                          <h5>สรุปราคา</h5>
                                          <table class="table">
                                              <thead>
                                              <tr>
                                                  <th scope="col">ขอบเขตงาน</th>
                                                  <th scope="col">ราคา</th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              <tr>
                                                  <th scope="row">01</th>
                                                  <td>฿2,900</td>
                                              </tr>
                                              <tr>
                                                  <th scope="row">วันที่ต้องการงาน</th>
                                                  <td>+ ฿0</td>
                                              </tr>
                                              <tr>
                                                  <th scope="row">ราคาทั้งหมด</th>
                                                  <td style=" text-decoration: underline;">฿2,900</td>
                                              </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                     {{-- <div class="d-flex mt-5">
                                         <button href="#" class="btn _secondary-btn btn-lg btn-block m-1 ">ยกเลิก</button>
                                         <button href="#"  class="btn _primary-black btn-lg btn-block m-1">ถัดไป</button>
                                     </div> --}}
                                  </div>
                                  </div>
                                  
                                 
                                  <input hidden type="text" id="job_id" name="jobstatus_id" value="1">
                                  <input hidden type="text" id="job_id" name="job_id" value="{{$jobs->id}}">

         
                                 @if ($errors->any())
                                     <div class="alert alert-danger">
                                         <ul>
                                             @foreach ($errors->all() as $error)
                                                 <li>{{ $error }}</li>
                                             @endforeach
                                         </ul>
                                     </div>
                                 @endif
                                 <input type="button" name="previous" class="previous _secondary-btn  btn-block btn-lg" value="ย้อนกลับ"/>
                                  <button type="submit" name="submit" class="submit _primary-black  btn-block btn-lg  rounded" value="Submit"> ถัดไป</button>

                                    </div>
                    </form>
                </div>
            </div>

 @endsection
 <script>
    function addCart(v){
        document.getElementById('output').value = v
        document.getElementById('designerId').value = v
        console.log(v);
        return false;
    }
</script>