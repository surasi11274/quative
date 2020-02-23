@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="css/_vote-detail.css">
    <link rel="stylesheet" href="{{asset('css/_Responsive.css')}}">
@endsection
@section('content')
    {{-- <div class="bd-example shadow-ex">
        <div id="carouselExampleCaptions3" class="carousel slide" data-ride="pause">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://sv1.picz.in.th/images/2019/12/17/i2azOP.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption1 d-none d-md-block">
                        <a href="#" class="site-link"></a>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 text-left p-5">
                                    <div class="site-header">
                                        <h1 class=" d-flex float-left mt-5">ผลงานที่ได้รับการโหวตมากที่สุด</h1>
                                    </div>
                                    <div class="site-below">
                                        <h1 class="mt-1">ผลงานที่ได้รับการโหวตมากที่สุด</h1>
                                        <h3 class="mt-1">Package colorlista</h3>
                                        <span class="mt-1">Design by&nbsp;<label> กิตติพร บุญดี</label></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://sv1.picz.in.th/images/2019/12/17/i2azOP.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption1 d-none d-md-block">
                        <a href="#" class="site-link"></a>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 text-left p-5">
                                    <div class="site-header">
                                        <h1 class=" d-flex float-left mt-5">ผลงานที่ได้รับการโหวตมากที่สุด</h1>
                                    </div>
                                    <div class="site-below">
                                        <h3 class="mt-5">Package colorlista</h3>
                                        <span class="mt-5">Design by&nbsp;<label> กิตติพร บุญดี</label></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://sv1.picz.in.th/images/2019/12/17/i2azOP.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption1 d-none d-md-block">
                        <a href="#" class="site-link"></a>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 text-left p-5">
                                    <div class="site-header">
                                        <h1 class=" d-flex float-left mt-5">ผลงานที่ได้รับการโหวตมากที่สุด</h1>
                                    </div>
                                    <div class="site-below">
                                        <h3 class="mt-5">Package colorlista</h3>
                                        <span class="mt-5">Design by&nbsp;<label> กิตติพร บุญดี</label></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container mt-5 ">
        <div class="  bg-white ">
            <div class="container content-profile" >
                <div class="row">
                    <div class=" col-12 col-md-2  p-5">
                        <div class="">
                            
                            <figure class="img-fluid">
                                <img class="rounded-circle" src="https://picsum.photos/140">
                            </figure>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 p-md-5 text-md-left text-xm-center ">
                        <h3 class="_hilight ">Package  Coralist</h3>
                        <span class="mt-5">Design by&nbsp;<label> กิตติพร บุญดี</label></span>
                    </div>
                    <div class="col-12 col-md-3 p-3">
                        <div class="float-right">
                            <button class="love text-center rounded float-right" type="button" name="button"><i class="fas fa-heart"></i></button>
                        </div>
                    </div>



                    <div class="container-fluid" style="    padding-right: 0px !important;
                    padding-left: 0px !important;">
                
                        <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner  mt-5">
                                <div class="carousel-item active">
                                    <img src="https://sv1.picz.in.th/images/2019/12/17/i2azOP.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        {{-- <h5>First slide label</h5>
                                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> --}}
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="https://sv1.picz.in.th/images/2019/12/17/i2azOP.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        {{-- <h5>Second slide label</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="https://sv1.picz.in.th/images/2019/12/17/i2azOP.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        {{-- <h5>Third slide label</h5>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> --}}
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev sr-only" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next sr-only" href="#carouselExampleCaptions" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-12  carousel-indicators-p-lg">
                        <p class="text-justify p-md-5 p-3">
                            Coralist is a cosmedical skincare brand which uses natural 
                            ingredients of coral from Jeju Island. This is the first brand in 
                            Korea to use natural coral as the main ingredient in cosmedical 
                            skincare product. From this project, we’ve developed brand identity and package design of 3 product lines: Ultimate effect 
                            toner, emulsion and cream.
                        </p>
                    <hr>
                    <div class="row p-5">
                        <div class="col-12 col-md-7">
                            <h3>ความคิดเห็น</h3>
                            <div class=" container-fluid" >
                              <div class="row">
                                <div class="col-3">
                                    <figure class="img-fluid  mr-3 ml-3">
                                        <img class="rounded-circle" src="https://picsum.photos/70">
                                    </figure>
                                   </div>
                                   <div class="col-9">
                                    <textarea class="form-control" id="validationTextarea" placeholder="แสดงความคิดเห็น" required></textarea>
    
                                   </div>
                              </div>
                                    <input class="mt-3 btn _primary-black float-right btn-lg" type="submit" value="โพสต์">
                            </div>
                        </div>    
                    <div class="col-12 col-md-5 ">
                            <div class="form-tags ">
                               <ul class=" d-flex">
                            <i class="fas fa-tag icons m-1"></i>
                                  <li class="m-1">
                                     <div class="box-tags ">
                                        <small>มินิมอล</small>
                                     </div>
                                  </li>
                                  <li class="m-1">
                                     <div class="box-tags">
                                        <small>ทันสมัย</small>
                                     </div>
                                  </li>
                                  <li class="m-1">
                                     <div class="box-tags">
                                        <small>วินเทจ</small>
                                     </div>
                                  </li>
                                  <li class="m-1">
                                    <div class="box-tags">
                                        <small>แฟนตาซี</small>
                                     </div>
                                  </li>
                                  <li class="m-1">
                                    <div class="box-tags">
                                        <small>หนักแน่น</small>
                                     </div>
                                  </li>

                               </ul>
                            </div>
                            <div class="d-flex">
                                <i class="fas fa-heart m-1"></i>
                                <span class="m-1">205</span>
                                <p class="m-1">Likes</p>
                            </div>
                            <div class="d-flex">
                                <i class="far fa-eye m-1"></i>
                                <span class="m-1">5,000</span>
                                <p class="m-1">Views</p>
                                
                            </div>
                            <div class="d-flex">
                                <i class="fas fa-calendar-week m-1"></i>
                                <p class="m-1">Feb 15, 2020</p>
                            </div>
                            <hr>
                            
                            
                         </div> 
                         <div class="col-12 col-md-7 ">
                            <div class="comment-flow mt-5">
                                <div class="row d-flex">
                                    <div class="col-2">
                                        <figure class=" img-fluid">
                                            <img class="rounded-circle" src="https://picsum.photos/60">
                                        </figure>
                                    </div>
                                    <div class="col-7">
                                        <label for="name">กมลเทพ อัครเดช</label> <br>
                                        <p>Quative มีแต่นักออกแบบอย่างเทพ</p>
                                    </div>
                                    <div class="col-3 ">
                                        <small>11/06/2019</small>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-12 col-md-4 ">
                                <div class="caption-inner mt-3 mb-3">
                                    <img src="https://picsum.photos/320/200" alt="Avatar" class="rounded w-100 shadow">
                                    <div class="overlay  rounded p-3">
                                        <h1>Paper Bag</h1>
                                        <small>Design by Kritpon Klinkomut</small>
                                    </div>
                                </div>
                             </div>
                             <div class="col-12 col-md-4">
                                <div class="caption-inner mt-3 mb-3">
                                    <img src="https://picsum.photos/320/200" alt="Avatar" class="rounded w-100 shadow">
                                    <div class="overlay  rounded p-3">
                                        <h1>Paper Bag</h1>
                                        <small>Design by Kritpon Klinkomut</small>
                                    </div>
                                </div>
                             </div>
                             <div class="col-12 col-md-4">
                                <div class="caption-inner mt-3 mb-3">
                                    <img src="https://picsum.photos/320/200" alt="Avatar" class="rounded w-100 shadow">
                                    <div class="overlay  rounded p-3">
                                        <h1>Paper Bag</h1>
                                        <small>Design by Kritpon Klinkomut</small>
                                    </div>
                                </div>
                             </div>
                       
                        </div>
    
            
                </div>
                    </div>
               
                   
                    {{-- end container-fluid --}}
                </div>
            </div>
        </div>






    </div>
    {{-- <div class="container mt-5 ">
        <div class="row">
            
            <div class="col-12 col-md-5">
                <div class="card  p-5 shadow-ex overflow-y">
                    <label class="text-right" for="">ผลงานของ Kritpon Klinkomut </label>
                    <hr>
                    <div class="caption-inner mt-3 mb-3">
                        <img src="https://picsum.photos/320" alt="Avatar" class="rounded w-100 shadow">
                        <div class="overlay  rounded p-3">
                            <h1>Paper Bag</h1>
                            <small>Design by Kritpon Klinkomut</small>
                        </div>
                    </div>
                    <div class="caption-inner mt-3 mb-3">
                        <img src="https://picsum.photos/320" alt="Avatar" class="rounded w-100 shadow">
                        <div class="overlay  rounded p-3">
                            <h1>Gift Box</h1>
                            <small>Design by Kritpon Klinkomut</small>
                        </div>
                    </div>
                    <div class="caption-inner mt-3 mb-3">
                        <img src="https://picsum.photos/320" alt="Avatar" class="rounded w-100 shadow">
                        <div class="overlay  rounded p-3">
                            <h1>Gift Box</h1>
                            <small>Design by Kritpon Klinkomut</small>
                        </div>
                    </div>
                    <div class="caption-inner mt-3 mb-3">
                        <img src="https://picsum.photos/320" alt="Avatar" class="rounded w-100 shadow">
                        <div class="overlay  rounded p-3">
                            <h1>Gift Box</h1>
                            <small>Design by Kritpon Klinkomut</small>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div> --}}
    @endsection