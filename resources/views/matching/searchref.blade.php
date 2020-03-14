@extends('layouts.app')
{{-- @section('assets')
   <link rel="stylesheet" href="css/style_match.css">
   <link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
   <link rel="stylesheet" href="css/dropzone.css">

   
@endsection --}}

@section('content')

<section class="content ">
    <div class="container d-none d-md-block">
        
        <div class="text-center p-5">
            <div id="wizard-progress" >
                <ol class="step-indicator">
                    <li class="complete">
                        <div class="step">1</div>
                        <div class="caption hidden-xs hidden-sm">ระบุความต้องการ</div>
                    </li>
                    <li class="active">
                        <div class="step">2</div>
                        <div class="caption hidden-xs hidden-sm">เลือกรูปตัวอย่างงาน</div>
                    </li>
                    <li class="active">
                        <div class="step">3</div>
                        <div class="caption hidden-xs hidden-sm">เลือกนักออกแบบที่ตรงใจ</div>
                    </li>
                    <li class="active">
                        <div class="step">4</div>
                        <div class="caption hidden-xs hidden-sm">เลือกขอบเขตงาน</div>
                    </li>
                </ol>
            </div>
        
        </div>
    </div>
    
            <form class="multi-step-form" action="/search/store/ref" method="post" enctype="multipart/form-data">
               
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{-- mobile  --}}
               
                {{-- end mobile  --}}
                    <div class="container  ">
                        <fieldset>
                            <div class="container bg-white  p-3 p-md-5" style="padding-bottom: 140px !important;">
                                <h2 class="selectfillter">รูปภาพงานใกล้เคียงกับงานที่ต้องการ *ถ้ามี</h2>
                               
                                <div class="row d-none d-md-block">
                                    <div class="col">
                                        <div  id="thumb-output2" style="display:flex; width:180px;height:180px;">
                                        
                                        </div>
                                         <div class="upload-btn-wrapper-">
                                                <button class="_btn-upload-"><i class="fas fa-plus"></i></button>
                                                <input type="file" id="file-input2" name="refpicbyUser" multiple />
                                         </div>
                                     </div>
                                </div>
                            {{-- <div class="col">
                                <div class="input-picture">
                    
                                    <input type="file" id="file-input2" name="refpicbyUser" multiple />
                                    <input type="button" onclick="removeAllImage()" value="Remove All Image" clas="remove"> 
                                                                        <div id="thumb-output2"></div>
                                    <i class="fas fa-plus p-icons"></i>
                                </div>
                            </div> --}}
                            <h2 class="selectfillter  pt-5">เลือกผลิตภัณฑ์ที่มีความใกล้เคียงกับแบบที่คุณต้องการ</h2>
                            <div class="smb-5 bg-white rounded ">
                                <div class="waterfall ">
                                    <div class="container">
                                        <div class="row  ">
                                            @foreach ($refs as $ref)
                                                <div class="col-4 col-md-4 pt-2 pb-2 ">
                                                    <div class="form-check-1 item rounded ">
                                                        <label class="_area">
                                                            <input  type="checkbox"  id="myCheckbox1" value="{{$ref->id}}" name="reference[]">
                                                            <span class="checkmark"></span>
                                                        </label>
                    
                                                        <!-- <label class="single-checkbox" for="myCheckbox1"> -->
                                                            
                                                             <picture>
                                                                {{-- <source media="(min-width: 650px)" srcset="{{$ref->img}}"> --}}
                                                                <source class="img-fluid" media="(min-width: 375px)" srcset="{{$ref->img}}">
                                                                <img class="rounded " src="{{$ref->img}}" alt="Flowers" style=" width: 320px; height:320px;">
                                                              </picture>
                                                              {{-- <img class="rounded" style=" object-fit: cover; width: 320px; height:320px;"  style="display:block;" width="" src="{{$ref->img}}" /> --}}
                    
                    
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                    
                                    </div>
                    
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-6">
 
                                </div> --}}
                                {{-- <div class="col-6">
                                 <div class="row mt_ex">
                                     <div class="col-6"> --}}
                                        <input type="button" name="previous" class="previous _secondary-btn  btn-block rounded btn-lg" value="ย้อนกลับ" style="margin-top:50px; margin-right:280px; width:20%; float: left; right:0; position:absolute;"/>
                                     {{-- </div>
                                     <div class="col-6"> --}}
                                        <input type="submit"  class="next  _primary-black  btn-block rounded btn-lg" value="ถัดไป" style="margin-top:50px; margin-right:50px; width:20%; right:0; position:absolute;"/>
{{--  
                                     </div>
                                 </div>
                                </div>
                            </div> --}}
                            {{-- </div> --}}
                            <input style="border-width: 2px;" type="hidden" class="detaill-select" name="categories" plachholder="sadas" id="output">
                            <input  type="hidden"  name="categories_id" plachholder="sadas" id="output2">
                            <input  type="text" hidden id="job_id" name="job_id" value="{{$jobs->id}}">

                         
                        </fieldset>
                        
                    </div>
</form>

    

</section>
