@extends('layouts.app')

@section('content')
<div class="container mt_ex ">
         <div class=" mt-5 rounded-ex" style="width: 100%;padding-top: 30px;">
         <form class="form-match" action="/search/create/store2" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}

         	<h1 class="text-center mt-5" style="color:#904ae8
               ;"> ใช่ !! ในที่สุดเราก็พบนักออกแบบ</h1>
               
            <div class="row">
               <div class="col-12 mt-5">

	               	<div id="carouselExampleIndicators" class="carousel slide container" data-ride="touch" >
				  <ol class="carousel-indicators sr-only">
				    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <input style="display:none;" type="text" class="detaill-select " name="designer_id" plachholder="sadas" id="output">



				  <div class="carousel-inner">
				    <div class="carousel-item active ">
				      <div class="">

                  <div class="tabbable">
                     
                     <ul class="nav" id="myDIV">
                     

                     @foreach ($designers as $count => $designer)

                        <li class=" col" @if($count == 0) class="active" @endif >
                           <a href="#Loose-{{ $designer->id }}" data-toggle="tab" onclick="addCart('{{$designer->id}}')" >
                           <div class="profile-img text-center ">
                                 <!-- <h1>{{$designer->tag}}{{$designer->id}}</h1> -->
                                 <img class="rounded-circle _btn"  style=" object-fit: cover; width: 150px; height:150px; " src="/{{$designer->profilepic}}" alt=""/>

                              </div>
                           </a>
                        </li>
                        @endforeach

                        <!-- <li class="col">
                           <a href="#Cross" data-toggle="tab">
                              <div class="profile-img text-center ">
                                 <img class="rounded-circle _btn"  width="150" height="150" src="https://i.pinimg.com/originals/73/1c/ed/731ced24d44459831ec166492257fa45.jpg" alt=""/>
                              </div>
                           </a>
                        </li>
                        <li class="col">
                           <a href="#Flake" data-toggle="tab">
                              <div class="profile-img text-center ">
                                 <img class="rounded-circle _btn"  width="150" height="150" src="https://i.pinimg.com/originals/73/1c/ed/731ced24d44459831ec166492257fa45.jpg" alt=""/>
                              </div>
                           </a>
                        </li>
                        <li class="col">
                           <a href="#aa" data-toggle="tab">
                              <div class="profile-img text-center ">
                                 <img class="rounded-circle _btn"  width="150" height="150" src="https://i.pinimg.com/originals/73/1c/ed/731ced24d44459831ec166492257fa45.jpg" alt=""/>
                              </div>
                           </a>
                        </li>
                        <li class="col">
                           <a href="#bb" data-toggle="tab">
                              <div class="profile-img text-center ">
                                 <img class="rounded-circle _btn"  width="150" height="150" src="https://i.pinimg.com/originals/73/1c/ed/731ced24d44459831ec166492257fa45.jpg" alt=""/>
                              </div>
                           </a>
                        </li> -->

                     </ul>

                       </div> <!-- endrow -->
			  			</div> <!-- endrow -->
					</div>

					<div class="carousel-item ">
				      <div class="">

                  <div class="tabbable">

                     <!-- <ul class="nav">



                        <li class=" col">
                           <a href="#Loose" data-toggle="tab">
                              <div class="profile-img text-center ">
                                 <img class="rounded-circle"  width="150" height="150" src="https://i.pinimg.com/originals/73/1c/ed/731ced24d44459831ec166492257fa45.jpg" alt=""/>
                              </div>
                           </a>
                        </li>
                        <li class="col">
                           <a href="#Cross" data-toggle="tab">
                              <div class="profile-img text-center ">
                                 <img class="rounded-circle"  width="150" height="150" src="https://i.pinimg.com/originals/73/1c/ed/731ced24d44459831ec166492257fa45.jpg" alt=""/>
                              </div>
                           </a>
                        </li>
                        <li class="col">
                           <a href="#Flake" data-toggle="tab">
                              <div class="profile-img text-center ">
                                 <img class="rounded-circle"  width="150" height="150" src="https://i.pinimg.com/originals/73/1c/ed/731ced24d44459831ec166492257fa45.jpg" alt=""/>
                              </div>
                           </a>
                        </li>
                        <li class="col">
                           <a href="#aa" data-toggle="tab">
                              <div class="profile-img text-center ">
                                 <img class="rounded-circle"  width="150" height="150" src="https://i.pinimg.com/originals/73/1c/ed/731ced24d44459831ec166492257fa45.jpg" alt=""/>
                              </div>
                           </a>
                        </li>
                        <li class="col">
                           <a href="#bb" data-toggle="tab">
                              <div class="profile-img text-center ">
                                 <img class="rounded-circle"  width="150" height="150" src="https://i.pinimg.com/originals/73/1c/ed/731ced24d44459831ec166492257fa45.jpg" alt=""/>
                              </div>
                           </a>
                        </li>

                     </ul> -->

                       </div> <!-- endrow -->
			  			</div> <!-- endrow -->
					</div>
<!-- 

					  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a> -->


				</div>
				<!-- carousel-inner -->

			</div> 
			<!-- carouselExampleIndicators -->
			

                     <div class="tab-content">
                        <div class="container mt-5">
                        <hr>

                        </div>

                     @foreach ($designers as $count => $designer)
                     

                        <div @if($count == 0) class="tab-pane active" @else class="tab-pane" @endif id="Loose-{{$designer->id}}">

                           <!-- profile designer   --> 

                           <div class="row mt-5">
                              
                              <div class="col-1 ml-5">

                              </div>
                              <div class="col-md-2 ">
                                 <div class="profile-img" width="50">
                                    <img class="rounded-circle"  style=" object-fit: cover; width: 150; height: 150; border: 2px solid #904AE8;" src="/{{$designer->profilepic}}" alt=""/>
                                 </div>
                              </div>
                              <div class="col-4 .col-sm">
                                 <h4 style="font-weight:900;">{{$designer->name}}</h4>
                                 <h5 style="color:#FCD430;"><i class="fas fa-star star1" id=""></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i><i class="fas fa-star star1"></i> <span style="color: #000000;">4.9</span> </h5>
                                 <button type="button" class="btn rounded-ex" style="color:#904ae8
            ;border-color: #904ae8
            ;">ติดตาม</button>
                                 <br><br>
                                 <label style="font-weight:900; color:#ff3957
;">แนะนำเกี่ยวกับนักออกแบบ</label >

                                 <p>{{$designer->description}}</p>
                                 <label style="font-weight:900; color:#ff3957
;">แนวงานออกแบบ</label>
                                 
                                 <p> @foreach($jobs->tags as $tagn)

@php
$tagname = \App\Tags::find($tagn)->tagName;
@endphp{{$tagname}}                                 @endforeach
</p>
                              </div>
                              <div class="col-1 ">
                                 <div class="card text-center" style="width: 5.5rem;">
                                    <div class="card-body">
                                       <h5 class="card-title" style="color: #904AE8;" >0</h5>
                                       <h6 class="card-subtitle mb-2 text-muted" style="font-size: 12px;">ผลงาน</h6>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-1 ">
                                 <div class="card text-center" style="width: 5.5rem;">
                                    <div class="card-body">
                                       <h5 class="card-title" style="color: #904AE8;" >0</h5>
                                       <h6 class="card-subtitle mb-2 text-muted" style="font-size: 12px;">รีวิว</h6>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-1 sr-only">
                                 <div class="card text-center" style="width: 5.5rem;">
                                    <div class="card-body">
                                       <h5 class="card-title" style="color: #904AE8;"><img src="https://uppic.cc/d/5zcR" style="height: 20px;
                                          width: 20px;" /></i></h5>
                                       <h6 class="card-subtitle mb-2 text-muted" style="font-size: 12px;">ข้อความ</h6>
                                    </div>
                                 </div>
                                 <!-- profile designer   --> 


                              </div>
</div>
                        </div>
                  @endforeach
               </div>                       


                            <div class="container ">
                                <hr>
                                <div class="row">
                                 <div class="col-1 ml-4">

                                 </div>
                                 <div class="col">
                                 <h2  class="_hilight mt-3 " style="font-family: chonburi;    color: #904ae8;
" >ผลงานที่เคยทำ</h2>

                                 </div>
                                </div>
                            </div>

                <div id="carouselExampleIndicators1" class="carousel slide " data-ride="carousel" style="padding-bottom: 50px;">
			  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
		    
		  </ol>
		  <div class="carousel-inner ">
		    <div class="carousel-item active ">
                <div class="container">                  

                <div class="container">
                <div class="row justify-content-center">
                @foreach ($refs as $ref)

                  <div class="column p-2" >
                    <a href="#"><img class="img-thumbnail rounded-ex" style=" object-fit: cover; width: 200; height:200px;" src="{{$ref->img}}">
                    </a> 
                  </div>                    
                  @endforeach

                  </div>
                  </div>

               </div>
		    </div> <!-- end carousel -->
<!-- 
		    <div class="carousel-item">
		     <div class="row p-5">
		      <div class="col mt-1">
		      <img src="photo/corosel_1.jpg" alt="..." class="img-thumbnail rounded-ex" width="270" height="270">
		       <img src="photo/corosel_2.jpg" alt="..." class="img-thumbnail rounded-ex" width="270" height="270">
		      </div>

		      <div class="col mt-1">
		      <img src="photo/corosel_3.jpg" alt="..." class="img-thumbnail rounded-ex" width="270" height="270">
		       <img src="photo/corosel_4.jpg" alt="..." class="img-thumbnail rounded-ex" width="270" height="270">
		      </div>

		      <div class="col mt-1">
		      <img src="photo/corosel_5.jpg" alt="..." class="img-thumbnail rounded-ex" width="270" height="270">
		       <img src="photo/corosel_6.jpg" alt="..." class="img-thumbnail rounded-ex" width="270" height="270">
		      </div>

		      <div class="col mt-1">
		      <img src="photo/corosel_7.jpg" alt="..." class="img-thumbnail rounded-ex" width="270" height="270">
		      <img src="photo/corosel_8.jpg" alt="..." class="img-thumbnail rounded-ex" width="270" height="270">
		      </div>
		  	  </div>


                  </div>  -->

				</div>
			</div>

			<!-- end1  profile -->

                        </div>
                        <!-- <div class="tab-pane" id="Cross">
                           <h1>Broad Cut</h1>
                           <p>The thickest cut, about twice as wide as a Loose cut. Commonly used with air-cured Virginia, which is then used to blend with other cuts..</p>
                        </div>
                        <div class="tab-pane" id="Flake">
                           <h1>Flake</h1>
                           <p>The tobacco is placed under very high pressure at varying degrees of heat. When the tobacco cake emerges, it is sliced into thin flakes, typically about 1-2 inches wide and 0.1 inches thick. Fold or lightly rub the flake to put it in a pipe.</p>
                        </div>

                         <div class="tab-pane" id="aa">
                           <h1>aa</h1>
                           <p>The tobacco is placed under very high pressure at varying degrees of heat. When the tobacco cake emerges, it is sliced into thin flakes, typically about 1-2 inches wide and 0.1 inches thick. Fold or lightly rub the flake to put it in a pipe.</p>
                        </div>

                         <div class="tab-pane" id="bb">
                           <h1>bb</h1>
                           <p>The tobacco is placed under very high pressure at varying degrees of heat. When the tobacco cake emerges, it is sliced into thin flakes, typically about 1-2 inches wide and 0.1 inches thick. Fold or lightly rub the flake to put it in a pipe.</p>
                        </div> -->


                     </div>
                  </div>
               </div>

               	<center>
               		
					
				 </center>
             

               
                     <!-- end carousel inner -->

               </div>

       			
           
         </div> <!-- endcard -->
         <div class="container">
             <div class="d-flex justify-content-center">
                 <button type="submit" class="btn btn-lg mb-5"   style="color:white;width: 50%; margin-top: 50px;background-color:#904ae8
      ;">
                     จ้างงานเลย
                 </button>
             </div>
         </div>
         </form>
      </div>
      </div> <!-- ****container -->
      @endsection
<script>
    $('.carousel').carousel({
        interval: false,
        touch:true

    });
</script>
<script>
    function addCart(v){
        document.getElementById('output').value = v
        console.log(v);
        return false;
    }
</script>