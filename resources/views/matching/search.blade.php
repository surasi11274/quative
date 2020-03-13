@extends('layouts.app')
@section('assets')
   <link rel="stylesheet" href="css/style_match.css">
   <link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">
   <link rel="stylesheet" href="css/dropzone.css">

   
@endsection

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
    
            <form class="multi-step-form" action="/search/create/store1" method="post" enctype="multipart/form-data">
               
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{-- mobile  --}}
               
                {{-- end mobile  --}}
                    <div class="container  ">
                    <fieldset class="p-3 p-md-5  " style="padding-bottom: 140px !important;">    
                           
    
                            <h2 class="selectfillter"  style="font-weight: 800;">เลือกประเภทของผลิตภัณฑ์ของคุณที่พัฒนาบรรณจุภันฑ์</h2>
                        <div class="row">
                            @foreach ($cats as $cat)

                                   
                                 
                           
                            <div class="col  d-none d-md-block">
                               <div class="body-below text-center">
                       
                                 
                                   {{-- <p>{{ $cat->name}}</p> --}}
                                   <label class="container-radio">
                                    <input type="radio" name="radio" onclick="addCart('{{$cat->name}}'),addID('{{$cat->id}}')">
                                    {{-- <input type="radio" name="radio"> --}}
                                    <img src="{{ $cat->catsPic}}"  class="rounded" alt="" >
                                    <span class="checkmark-radio"></span>
                                    <p>{{ $cat->name}}</p>
                                   {{-- <input  type="hidden"  name="categories_id" plachholder="sadas" id="output2"> --}}

                                  </label>
                               </div>
                            </div>
                            @endforeach

                
                        </div>
                        {{--old version--}}
                     
                        
                        <div class="row d-none d-md-block">
                            <h5 class="font-weight-bold pt-5 "  style="font-weight: 800;">แนบรูปภาพผลิตภัณฑ์เดิมของคุณ</h5>
                           {{-- <div class="form-group">
                            <div class="dropzone" id="drop"></div>
                           </div> --}}
                            <div class="col">
                                 <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                    <label><a href="javascript:void(0)" class="custom-file-container__image-clear" hidden title="Clear Image">&times;</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="productPic" accept="*" multiple aria-label="Choose File">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview">
                                        <div class="col-3">
                                            
                                        </div>
                                    </div>
                                </div>
                                {{-- <div  id="thumb-output" style="display:flex; width:180px;height:180px;"></div> --}}
                               
                                 <div class="upload-btn-wrapper-">
                                        {{-- <button class="_btn-upload-"><i class="fas fa-plus"></i></button>
                                        <input type="file" id="file-input"  name="productPic"  multiple /> --}}
                                 </div>
                             </div>
                        </div>
                        
                        <div class="form-group d-none d-md-block">
                            <h2 class="selectfillter pt-5"  style="font-weight: 800;">URL<small>(ที่เกี่ยวข้องกับผลิตภัณฑ์)</small></h2>
                            <input type="text" class="form-control" name="url" placeholder="เช่น เว็บไซต์, เฟสบุ๊ค เพื่อให้นักออกแบบทำงานได้ง่ายขึ้น ">
                        </div>
                            <div class="form-group">
                                <h2 class="selectfillter  pt-5">สไตล์งานที่ต้องการ</h2>



                                <div class="container text-center">
                                    <div class="row ">

                                        @foreach ($tags as $tag)
                                            <div class="form-check">
                                                <ul class="ks-cboxtags">
                                                    <li>
                                                        <input type="checkbox"  value="{{$tag->id}}" name="tags[]">
                                                        <label for="checkboxOne">{{$tag->tagName}}</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        
                            <div class="custom-file  d-md-none ">
                              <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                              <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                            </div>
                           
                         
                        
                        <h2 class="selectfillter">ระบุรายละเอียดสำคัญ</h2>
                        <textarea class="form-control" name="requirement" placeholder="ระบุรายละเอียดสำคัญ เช่น สินค้าไม่น่าดึงดูด, สินค้าทำยอดไม่ไ่ด้" aria-label="With textarea"></textarea>
                        
                        {{-- <input type="button" name="next" class=" next  _primary-black  btn-block btn-lg  rounded" value="ถัดไป"  /> --}}
                        {{-- <input type="button" name="previous" class=" previous _secondary-btn  btn-block rounded btn-lg" value="ย้อนกลับ" />

                        <input type="button" name="next" class="next  _primary-black  btn-block rounded btn-lg" value="ถัดไป" /> --}}

                            {{-- <div class="row"> --}}
                                {{-- <div class="col-6">

                                </div>
                                <div class="col-6">
                                <div class="row mt_ex">
                                    <div class="col-6"> --}}
                                        <input type="button" name="previous" class=" previous _secondary-btn  btn-block rounded btn-lg" value="ย้อนกลับ" style="margin-top:50px; margin-right:280px; width:20%; float: left; right:0; position:absolute;"/>
                                    {{-- </div>
                                    <div class="col-6"> --}}
                                        <input type="button" name="next" class="next  _primary-black  btn-block rounded btn-lg" value="ถัดไป" style="margin-top:50px; margin-right:50px; width:20%; right:0; position:absolute;"/>
                                    {{-- </div>
                                </div>
                                </div> --}}
                            {{-- </div> --}}
                        </fieldset>
                        {{-- field-two --}}
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
                         
                        </fieldset>
                        
                    </div>
</form>

    

</section>

@endsection


<script>
    function addCart(v){
        document.getElementById('output').value = v
        console.log(v);
        return false;
    }
</script>
<script>
    function addID(v){
        document.getElementById('output2').value = v
        console.log(v);
        return false;
    }
</script>
<script>
    function addRef([v]){
        document.getElementById('output3').value = v
        console.log(v);
        return false;
    }
</script>
<script>
    var limit = 3;
    $('input.single-checkbox').on('change', function(evt) {
    if($(this).siblings(':checked').length >= limit) {
        this.checked = false;
    }
    });
</script>
<script src="{{asset('js/flatpickr.js')}}"></script>
<script src="js/previewmultiple.js"></script>
{{-- <script src="js/dropzone.js"></script>

<script src="js/scriptdropzone.js"></script> --}}

<script src="{{asset('js/file-upload-with-preview.js')}}"></script> 