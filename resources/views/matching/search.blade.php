@extends('layouts.app')
@section('assets')
   <link rel="stylesheet" href="../css/style_match.css">

   <link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}">



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

            <form class="container card p-3 p-md-5" action="/search/create/store1" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{-- mobile  --}}

                {{-- end mobile  --}}
                    <div class="container  ">
                    <fieldset class=" p-md-5  " style="padding-bottom:140px !important;">


                            <h4 class="font-weight-bold  d-none d-md-block">เลือกประเภทของผลิตภัณฑ์ของคุณที่พัฒนาบรรณจุภันฑ์</h4>
                            <h6 class="font-weight-bold pt-2 d-md-none">เลือกประเภทของผลิตภัณฑ์ของคุณที่พัฒนาบรรณจุภันฑ์</h6>
                        <div class="row">
                            
                            @foreach ($cats as $cat)




                            <div class="col-12 col-md  ">
                               <div class="body-below text-center">


                                   {{-- <p>{{ $cat->name}}</p> --}}
                                   <label class="container-radio">
                                    <input required type="radio" name="radio" onclick="addCart('{{$cat->name}}'),addID('{{$cat->id}}')">
                                    {{-- <input type="radio" name="radio"> --}}
                                    <div class="row">
                                        <div class="col-4 col-md-12">
                                            <img src="{{ $cat->catsPic}}"  class="rounded" alt="" >
                                         
                                        </div>
                            
                                        <div class="col-8 col-md-12">
                                            <p>{{ $cat->name}}</p>
                                        </div>
                                        
                                    </div>
                                    <span class="checkmark-radio"></span>
                                   {{-- <input  type="hidden"  name="categories_id" plachholder="sadas" id="output2"> --}}

                                  </label>
                               </div>
                            </div>
                            
                            {{-- <div class="col d-md-none">
                            
                                    <select class="selectpicker w-100 pack">
                                        @foreach ($cats as $cat)

                                        <option value="{{$cat->id}}" name="categories_id" data-package="{{$cat->name}}">{{$cat->name}}</option>
                                        {{-- <option>บรรจุภัณฑ์ประเภทขวด</option>
                                        <option>บรรจุภัณฑ์ประเภทแก้ว</option>
                                        <option>บรรจุภัณฑ์ประเภทถุง</option>
                                        <option>บรรจุภัณฑ์ประเภทกระป๋อง</option> --}}
                                        @endforeach
                                      </select>
                                      
        
                            {{-- </div>  --}}


                        </div>
                        {{--old version--}}

                        {{-- d-none d-md-block --}}
                        <h4 class="font-weight-bold pt-md-5 d-none d-md-block">แนบรูปภาพผลิตภัณฑ์เดิมของคุณ</h4>
                        <h6 class="font-weight-bold pt-2 d-md-none">แนบรูปภาพผลิตภัณฑ์เดิมของคุณ</h6>
                        <div class="row">
                            
                          
                            <div class="col">
                                 <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                    <label><a href="javascript:void(0)" class="custom-file-container__image-clear" hidden title="Clear Image">&times;</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input  type="file" class="custom-file-container__custom-file__custom-file-input" name="productPic" accept="*" multiple aria-label="Choose File">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview">
                                        <div class="col-3">

                                        </div>
                                    </div>
                                </div>
                                {{-- <div  id="thumb-output" style="display:flex; width:180px;height:180px;"></div> --}}

                                
                             </div>
                        </div>

                        
                            <h4 class="font-weight-bold pt-md-5 d-none d-md-block">URL<small>(ที่เกี่ยวข้องกับผลิตภัณฑ์)</small></h4>
                            <h6 class="font-weight-bold pt-2 d-md-none">URL<small>(ที่เกี่ยวข้องกับผลิตภัณฑ์)</small></h6>
                            <div class="form-group ">
                            <input type="text" class="form-control" name="url" placeholder="เช่น เว็บไซต์, เฟสบุ๊ค เพื่อให้นักออกแบบทำงานได้ง่ายขึ้น ">
                        </div>
                            <div class="form-group">
                                <h4 class="font-weight-bold  pt-md-5 d-none d-md-block">สไตล์งานที่ต้องการ</h4>
                                <h6 class="font-weight-bold pt-2 d-md-none">สไตล์งานที่ต้องการ</h6>
                                <div class="container text-center">
                                    <div class="row ">

                                        @foreach ($tags as $tag)
                                            <div class="form-check">
                                                <ul class="ks-cboxtags">
                                                    <li >
                                                        <input  type="checkbox"  value="{{$tag->id}}" name="tags[]">
                                                        <label for="checkboxOne">{{$tag->tagName}}</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                        
                        <h4 class="font-weight-bold pt-md-5 d-none d-md-block">ระบุรายละเอียดสำคัญ</h4>
                        <h6 class="font-weight-bold pt-2 d-md-none">ระบุรายละเอียดสำคัญ</h6>

                        <textarea class="form-control" required name="requirement" placeholder="ระบุรายละเอียดสำคัญ เช่น สินค้าไม่น่าดึงดูด, สินค้าทำยอดไม่ไ่ด้" aria-label="With textarea"></textarea>

                        <div class="row pt-md-5">
                            <div class="col d-none d-md-block"></div>
                            <div class="col">
                                <a href="/" class="btn _secondary-btn  btn-block rounded btn-lg d-none d-md-block"> ยกเลิก</a>
                                <a href="/" class="btn _secondary-btn  btn-block rounded btn-lg d-md-none "> ยกเลิก</a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn _primary-black  btn-block rounded btn-lg d-none d-md-block">ถัดไป</button>
                                <button type="submit" class="btn _primary-black  btn-block rounded btn-lg d-md-none ">ถัดไป</button>
                            </div>
                        </div>

                            {{-- <div class="row"> --}}
                                {{-- <div class="col-6">

                                </div>
                                <div class="col-6">
                                <div class="row mt_ex">
                                    <div class="col-6"> --}}
                                        {{-- <a href="/" class="btn _secondary-btn  btn-block rounded btn-lg d-none d-md-block" style="margin-top:50px; margin-right:280px; width:20%; float: left; right:0; position:absolute;"> ยกเลิก</a>
                                        <a href="/" class="btn _secondary-btn  btn-block rounded btn-lg d-md-none" style="    margin-top: 50px;
                                        margin-right: 148px;
                                        width: 43%;
                                        float: left;
                                        right: 0;
                                        position: absolute;"> ยกเลิก</a> --}}
                                        {{-- <input type="button" name="previous" class=" previous _secondary-btn  btn-block rounded btn-lg" value="ย้อนกลับ" style="margin-top:50px; margin-right:280px; width:20%; float: left; right:0; position:absolute;"/> --}}
                                    {{-- </div>
                                    <div class="col-6"> --}}
                                        {{-- <input type="submit"  class="next  _primary-black  btn-block rounded btn-lg d-none d-md-block" value="ถัดไป" style="margin-top:50px; margin-right:50px; width:20%; right:0; position:absolute;"/>
                                        <input type="submit"  class="next  _primary-black  btn-block rounded btn-lg  d-md-none" value="ถัดไป" style="    margin-top: 50px;
                                        margin-right: 15px;
                                        width: 43%;
                                        right: 0;
                                        position: absolute;"/>
                                         --}}
                                        <input style="border-width: 2px;" type="hidden" class="detaill-select" name="categories" plachholder="sadas" id="output">
                                        <input  type="hidden"  name="categories_id" plachholder="sadas" id="output2">
                                    {{-- </div>
                                </div>
                                </div> --}}
                            {{-- </div> --}}
                        </fieldset>
                        {{-- field-two --}}
                        {{-- <fieldset>
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


                                                             <picture>
                                                                <source class="img-fluid" media="(min-width: 375px)" srcset="{{$ref->img}}">
                                                                <img class="rounded " src="{{$ref->img}}" alt="Flowers" style=" width: 320px; height:320px;">
                                                              </picture>


                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>

                                </div>
                            </div>

                                        <input type="button" name="previous" class="previous _secondary-btn  btn-block rounded btn-lg" value="ย้อนกลับ" style="margin-top:50px; margin-right:280px; width:20%; float: left; right:0; position:absolute;"/>

                                        <input type="submit"  class="next  _primary-black  btn-block rounded btn-lg" value="ถัดไป" style="margin-top:50px; margin-right:50px; width:20%; right:0; position:absolute;"/>



                        </fieldset> --}}

                    </div>
</form>



</section>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


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



<script src="js/file-upload-with-preview.js"></script>
<script >
    $(document).ready(function () {

        $(".pack").change(function () {
            var cntrol = $(this);
            
            var City = cntrol.find(':selected').data('package');
            //   var doj = ', DOJ : ' + cntrol.find(':selected').data("doj");
            //   var value = ', Value : ' + cntrol.val();     
            var finalvalue = City;
            
            if(cntrol.val() == "")
            finalvalue = "กรุณาเลือก package";
            $('#lblSel').text(finalvalue);  
        
        });
    });

</script>