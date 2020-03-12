@extends('layouts.app')

@section('assets')
    <link rel="stylesheet" href="css/_vote-detail.css">
@endsection

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}" />


<link href="{{ asset('css/_vote-detail.css') }}" rel="stylesheet">
<div class="bd-example shadow-ex">
    <div id="carouselExampleCaptions3" class="carousel slide" data-ride="pause">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="photo/bg-vote.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption1 d-none d-md-block">
                    <a href="/votedetail" class="site-link"></a>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-left">
                                <div class="site-header">
                                    <h1 class="_hilight mt-5">ผลงานที่ได้รับการโหวตมากที่สุด</h1>
                                    <p style="color:black;">รวบรวมผลงานของนักออกแบบบรรจุภัณฑ์ที่สร้างสรรค์ผลงาน <br>
                                        บรรจุภัณฑ์ในรูปแบบต่างๆผ่านทางเว็บไซต์ Quative</p>
                                </div>
                                <div class="site-below">
                                    {{-- <h1 class="_hilight float-left mt-5">ผลงานที่ได้รับการโหวตมากที่สุด</h1>
                                    <p>รวบรวมผลงานของนักออกแบบบรรจุภัณฑ์ที่สร้างสรรค์ผลงาน <br>
                                        บรรจุภัณฑ์ในรูปแบบต่างๆผ่านทางเว็บไซต์ Quative</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<div class="container">

    <div class="form-row mt-5">
        <div class="form-group col-md-9">
            <ul class="nav nav-pills mt-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link-1 border bg-white rounded m-2 active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">ทั้งหมด</a>
                </li>
                <li class="nav-item border bg-white rounded m-2">
                  <a class="nav-link-1" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">กล่อง</a>
                </li>
                <li class="nav-item border bg-white m-2 rounded">
                  <a class="nav-link-1" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">ขวด</a>
                </li>
                <li class="nav-item border bg-white m-2 rounded">
                    <a class="nav-link-1" id="pills-glass-tab" data-toggle="pill" href="#pills-glass" role="tab" aria-controls="pills-glass" aria-selected="false">แก้ว</a>
                  </li>
                  <li class="nav-item border bg-white m-2 rounded">
                    <a class="nav-link-1" id="pills-bag-tab" data-toggle="pill" href="#pills-bag" role="tab" aria-controls="pills-bag" aria-selected="false">ถุง</a>
                  </li>
                  <li class="nav-item border bg-white m-2 rounded">
                    <a class="nav-link-1" id="pills-can-tab" data-toggle="pill" href="#pills-can" role="tab" aria-controls="pills-can" aria-selected="false">กระป๋อง</a>
                  </li>
              </ul>

        </div>

       <div class="form-group col-md-3">
         <label for=""></label>
         <select class="form-control">
            <option value="most">ผลงานที่ถูกชื่นชอบมากที่สุด</option>
            <option value="newone">เรียงผลงานตามลำดับ ใหม่-เก่า</option>

          </select>

       </div>
    </div>
    <div class="row">

                    @if($jobs->count())
                        @foreach($jobs as $job)

                            @php
                                $designerid = \App\Designer::find($job->designer_id);

                                $jobfilee = DB::table('jobfiles')->where('job_id',$job->id)->first();


                            @endphp

                            <article class="col-4 mt-5">
                                <div class="card shadow-sm" data-id="{{ $job->id }}">

                                <a href="{{ route('galleryDetail', $job->id) }}">
                                    <img class="card-img-top" src="/{{$jobfilee->fileimgname}}"  alt="..." style="height: 267px;">
                                </a>

                                    <div class="card-body">
                                        <div class="text-left position-absolute">
                                            <div class="row pl-3">
                                                <p class="font-weight-bold">ออกแบบโดย
                                                    {{$designerid->name}}
                                                </p>
                                            </div>

                                        {{-- @foreach($job->tags as $tagn)


                                            <p>
                                                {{$tagname}},
                                            </p>

                                        @endforeach --}}
                                        <div class="row pl-3">
                                    @foreach ($jobtags as $jobt)
                                        @php

                                        $tagname = \App\Tags::find($jobt)->tagName;

                                        @endphp
                                        <p>
                                            {{$tagname}},
                                        </p>

                                    @endforeach --}}
                                    <div class="row pl-3">
                                @foreach ($jobtag as $jobt)
                                    @php
                                    $tagname = \App\Tags::find($jobt)->tagName;

                                    @endphp
                                    <p>

                                        {{$tagname}},
                                    </p>
                                @endforeach
                                 </div>
                                 <div class="row pl-3 color-grey">
                                        <span>
                                            <i class="fas fa-heart"></i>
                                            {{$job->favorite_to_users->count()}}
                                        </span>
                                        <span class="pl-3">
                                            <i class="far fa-eye"></i>
                                            {{$job->view_count}}
                                        </span>





                                </div>



                                    </div>
                                    <h4><a href="#" title="Nature Portfolio">{{ $job->title }}</a></h4>
                                    <span class="pull-right">

                                            @guest

                                            <a href="javascript:void(0);" >
                                            <button onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                                closeButton:true,
                                                progressBar: true,
                                            })" class="love btn btn-light text-center rounded float-right border">
                                                <i class="fas fa-heart"></i>
                                                {{-- {{$job->favorite_to_users->count()}}                                 --}}
                                            </button>
                                            </a>

                                            @else
                                            <a href="javascript:void(0);" >
                                                <button onclick="document.getElementById('vote-form-{{$job->id}}').submit();" class="love text-center rounded float-right border {{ !Auth::user()->favorite_jobs->where('pivot.jobs_id',$job->id)->count() == 0 ?'favorite_jobs' : ''}}">
                                                    <i class="fas fa-heart"></i>

                                                    {{-- {{$job->favorite_to_users->count()}}   --}}
                                                </button>
                                            </a>
                                                 <form id="vote-form-{{$job->id}}" method="POST" action="{{route('job.vote',$job->id)}}"
                                                    style="display:none;">
                                                @csrf
                                                </form>

                                            @endguest
                                            {{-- <i id="like{{$job->id}}" class="far fa-heart{{ auth()->user()->isFavorited($job) ? 'like-post' : '' }}"></i>
                                            <div id="like{{$job->id}}-bs3">{{ $job->favoritesCount }}</div> --}}
                                    </span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                @endif

            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">กล่อง</div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">ขวด</div>
        <div class="tab-pane fade" id="pills-glass" role="tabpanel" aria-labelledby="pills-contact-tab">แก้ว</div>
        <div class="tab-pane fade" id="pills-bag" role="tabpanel" aria-labelledby="pills-contact-tab">ถุง</div>
        <div class="tab-pane fade" id="pills-can" role="tabpanel" aria-labelledby="pills-contact-tab">กระป๋อง</div>
    </div>

   </div>
{{-- <style>
    .container-1 div {
      width: 280px;
      height: 500px;
      background-color: antiquewhite;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 8px;


    }
    .container-1 .hoverliked:hover{
        background-color:rgba(0, 0, 0, .15);
        transform: translateY(-20px,0px) 2ms all;
    }


    .container-1 .item1 { height: 200px; }
    .container-1 .item4 { height: 600px; }
    .container-1 .item2 { height: 600px; }
    .container-1 .item3 { height: 400px; }

    .container-1 .item5 { height: 200px; }
    .container-1 .item8 { height: 200px; }
    .container-1 .item6 { height: 600px; }
    .container-1 .item11 { height: 400px; }
  </style> --}}
  {{-- <script src="js/magic-grid.min.js"></script> --}}
{{-- <script>
let magicGrid = new MagicGrid({
  container: '.container-1',
  animate: true,
  gutter: 30,
  static: true,
  useMin: true
});
    magicGrid.listen();

</script> --}}



{{-- <script type="text/javascript">
    $(document).ready(function() {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('i.fa-heart, i.fa-heart').click(function(){
            var id = $(this).parents(".card").data('id');
            var c = $('#'+this.id+'-bs3').html();
            var cObjId = this.id;
            var cObj = $(this);


            $.ajax({
               type:'POST',
               url:'/ajaxRequest',
               data:{id:id},
               success:function(data){
                  if(jQuery.isEmptyObject(data.success.attached)){
                    $('#'+cObjId+'-bs3').html(parseInt(c)-1);
                    $(cObj).removeClass("like-post");
                  }else{
                    $('#'+cObjId+'-bs3').html(parseInt(c)+1);
                    $(cObj).addClass("like-post");
                  }
               }
            });


        });



    });
</script> --}}
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="public/js/isotope.pkgd.min.js"></script>
{{-- <script src="https://cdnjs.cloundflare.com/ajax/libs/select2/4.0.3/jquery.min.js"></script>
--}}
<script>


var $isotope_container = $('.isotope_container').isotope({ // กำหนด container ที่ครอบไอเทมทั้งหมดอยู่
  itemSelector: '.element-item' // กำหนด element class ที่จะให้สามารถ filter ได้
});

$('#isotope_category').on('change', function() { // จับ event change ของ select option
  var selected = $(this).find('option:selected'); // ตรวจสอบว่าเลือกไปที่หมวดหมู่อาหารอะไร
  var filterValue = selected.attr('data-filter'); // เก็บข้อมูล attribute data-filter
  $isotope_container.isotope({ filter: filterValue }); // ใช้คำสั่ง filter ของ isotope
});

</script>
