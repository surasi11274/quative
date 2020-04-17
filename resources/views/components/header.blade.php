        <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="d-inline-block align-top" width="50" height="50" src="https://sv1.picz.in.th/images/2020/02/01/RyM1Aa.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
                    <ul class="nav navbar-nav justify-content-end">
                        <!-- Authentication Links -->

                    @if (Auth::guest())
                        <!-- <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">เข้าสู่ระบบ</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">สมัครสมาชิก</a></li> -->
                            <li class="nav-item"><a class="nav-link" role="button" href="/preview">พรีวิว</a></li>
                            <li class="nav-item"><a class="nav-link" role="button" href="/gallery">ผลงาน</a></li>


                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link btn"  data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class=" icon user-1"></span>
                                </a>

                                <ul class="dropdown-menu " role="menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">
                                            เข้าสู่ระบบ
                                        </a>


                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">
                                            สมัครสมาชิก
                                        </a>
                                    </li>


                                </ul>
                            </li>
                               
                        @elseif (Auth::user()->role=='1') 
                            <li class="nav-item"><a class="nav-link" role="button" href="/preview">พรีวิว</a></li>
                            <li class="nav-item"><a class="nav-link" role="button" href="/gallery">ผลงาน</a></li>
                            <li class="dropdown nav-item d-none d-lg-block" onclick="markNotificationAsRead('{{count(auth()->user()->unreadNotifications)}}')" >
                                <a class="nav-link  " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    <span class="icon notification"></span>
                                    @if (count(auth()->user()->unreadNotifications) == 0 )
                                    <span class="pending shadow-sm font-weight-bold text-center" style=" position:absolute; left:25px;    margin: 0;background-color:white; color:black; width:15px; height:15px;  border-radius:50%; font-size:12px; 
                                    ">
                                        {{count(auth()->user()->unreadNotifications)}}
                                    </span> 
                                    
                                    @else
                                    
                                    <span class="pending shadow-sm font-weight-bold  text-center" style=" position:absolute; left:25px;    margin: 0;background-color:#FE3A76; color:white; width:15px; height:15px;  border-radius:50%; font-size:12px; 
                                    ">
                                        {{count(auth()->user()->unreadNotifications)}}
                                    </span>
                                    @endif
                                   
                                </a>
                                <div class="dropdown-menu  p-3" style=" box-shadow: 5px 1px 20px 1px rgba(144, 74, 232,.15);" aria-labelledby="navbarDropdownMenuLink">
                                    <div class="wrapper-notification">
                                        <div class=" overflow-noctification p-2">
                                            @forelse (auth()->user()->unreadNotifications as $notification)
                                                
                                            <div class="row">
                                                    
                                                @include('components.notifications.'.snake_case(class_basename($notification->type)))

                                            </div>
                                                @empty
                                                    <a class="gray text-center" href="#">ยังไม่มีการแจ้งเตือนใดๆ</a>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                            </li>
                            {{-- noti mobile designer --}}
                            <li class="d-lg-none">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                      <div class="nav-item" id="headingTwo">
                                    
                                          <div class=" collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          
                                           <div class="row">
                                               <div class="col-9">
                                                <a class="nav-link">การแจ้งเตือน@if (count(auth()->user()->unreadNotifications) == 0 )
                                                    <span class="mt-1 ml-2 pending shadow-sm font-weight-bold text-center" style=" position:absolute;    margin: 0;background-color:white; color:black; width:15px; height:15px;  border-radius:50%; font-size:12px; 
                                                    ">
                                                        {{count(auth()->user()->unreadNotifications)}}
                                                    </span> 
                                                    
                                                    @else 
                                                    
                                                    <span class="mt-1 ml-2 pending shadow-sm font-weight-bold  text-center" style=" position:absolute;    margin: 0;background-color:#FE3A76; color:white; width:15px; height:15px;  border-radius:50%; font-size:12px; 
                                                    ">
                                                        {{count(auth()->user()->unreadNotifications)}}
                                                    </span>
                                                </a>
                                  
                                    @endif</a>
                                                
                                               </div>
                                               <div class="col-3 text-center">
                                                <i class="icon _hilight fas fa-caret-down"></i>
                                               </div>
                                           </div>
                                          </div>
                                        
                                      </div>
                                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="wrapper-notification-m">
                                                <div class=" overflow-noti-mobile p-2">
                                                    @forelse (auth()->user()->unreadNotifications as $notification)
                                                        
                                                        <div class="row">
                                                            
                                                            <div class="col-3">
                                                                <figure class="  img-fluid">
                                                                    <div class="active-notification float-right rounded-circle"></div>
                                                                    <img class="rounded-circle w-100 " src="https://picsum.photos/40">
                                                                </figure>
                                                            </div>
                                                            <div class="col-9">
                                                                @include('components.notifications.'.snake_case(class_basename($notification->type)))
                                                                {{-- <small class="ml-2" style="color:#523EE8;">{{'notification_'.snake_case(class_basename($notification->type))}}</small> --}}
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                        @empty
                                                            <a class="gray text-center" href="#">ยังไม่มีการแจ้งเตือนใดๆ</a>
                                                    @endforelse
        
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </li>
                            <li class="dropdown nav-item d-none d-lg-block">
                                <a  href="#" class="nav-link btn" style="color:#523EE8;" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class=" icon profile"></span>
                                </a>
                                {{-- {{ Auth::user()->name }} --}}
                                <!-- <a class="nav-link" role="button" href="/login/designer">Register to Designer</a> -->
                                <ul class="dropdown-menu "   role="menu">
                                    <li class="nav-item">
                                        <div class="wrapper-profile">
                                          <div class="profile-color d-flex p-2">
                                              @if(Auth::user()->designer() )
                                              <img class="ml-3 rounded-circle" src="/{{ Auth::user()->designer()->profilepic }}" alt="" style="width:50px;height:50px; border:solid 1px white;">

                                              @else
                                              <img class="ml-3 rounded-circle" src="{{ Auth::user()->avatar }}" alt="" style="width:50px;height:50px; border:solid 1px white;">

                                              @endif
                                           <h5 class="ml-2 mt-3">{{ Auth::user()->name }}</h5>
                                          </div> 
                                        </div>
                                       </li>
                                       <li class="nav-link">
                                           <a class="ml-2 nav-link" href="/message">ข้อความ  <span class="icon chat float-right mr-2"></span></a>
                                       </li>
                                       <li class="nav-link">
                                           <a class="ml-2 nav-link" role="button" href="/requestjob">ตรวจสอบการจ้างงาน  <span class="icon list-ul float-right mr-2"></span></a>
                                       </li>
                                       <li class="nav-link">
                                        @if (!Auth::user()->designer())
                                        <a class="ml-2 nav-link" role="button" href="#">ภาพรวมรายรับของฉัน  <span class="icon dollar-sign  float-right mr-2"></span></a>

                                        @elseif (Auth::user()->designer())
                                            <a class="ml-2 nav-link" role="button" href="{{route('designer.billing',Auth::user()->designer()->token)}}">ภาพรวมรายรับของฉัน  <span class="icon dollar-sign  float-right mr-2"></span></a>
                                        @endif

                                        </li>
                                       <li class="nav-link">
                                           @if (!Auth::user()->designer())
                                           <a class="ml-2 nav-link" href="#">เรทและราคางานของฉัน  <span class="icon file-import float-right mr-2"></span></a>

                                           @elseif (Auth::user()->designer())
                                           <a class="ml-2 nav-link" href="{{ route('designer.course', Auth::user()->designer()->token) }}">เรทและราคางานของฉัน  <span class="icon file-import float-right mr-2"></span></a>
                                           @endif

                                       </li>
                                      
                                       <li class="nav-link">
                                           <a class="ml-2 nav-link" href="/favouritelist">ผลงานที่ถูกใจ  <span class="icon love-sym float-right mr-2"></span></a>
                                       </li>
                                       <li class="nav-link">
                                           <a class="ml-2 nav-link" href="{{ route('designer.designer') }}">โปรไฟล์ส่วนตัว  <span class="icon cog float-right mr-2"></span></a>
                                       </li>
                                       <li class="nav-link">
                                           <hr>
                                           <a class="ml-2 nav-link"  href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">ออกจากระบบ  <span class="icon sign-out float-right mr-2"></span>
                                           </a>
                                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                               {{ csrf_field() }}
                                           </form>
                                       </li>
                                </ul>
                            </li>
                            {{-- menu mobile designer  --}}
                            <li class="d-lg-none">
                                <div class="accordion" id="accordionExample">
                                  
                                    <div class="card">
                                      <div class="nav-item" id="headingThree">
                                   
                                          <div class=" collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                
                                           <div class="row">
                                               <div class="col-9">
                                                <a class="nav-link">เมนูของฉัน</a>
                                               </div>
                                               <div class="col-3 text-center">
                                                <i class="icon _hilight fas fa-caret-down"></i>
                                               </div>
                                           </div>
                                        </div>
                                        
                                      </div>
                                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="">
                                            <div class="wrapper-profile-m">
                                                <div class="profile-color d-flex p-2">
                                                    @if(Auth::user()->designer() )
                                                    <img class="ml-3 rounded-circle" src="/{{ Auth::user()->designer()->profilepic }}" alt="" style="width:50px;height:50px; border:solid 1px white;">
      
                                                    @else
                                                    <img class="ml-3 rounded-circle" src="{{ Auth::user()->avatar }}" alt="" style="width:50px;height:50px; border:solid 1px white;">
      
                                                    @endif
                                                 <h5 class="ml-2 mt-3">{{ Auth::user()->name }}</h5>
                                                </div> 
                                                <div class="row overflow-menu-designer">
                                                    <div class="col-9">
                                                          <a class="ml-2 nav-link" href="/message">ข้อความ</a>
                                                          <a class="ml-2 nav-link" role="button" href="/requestjob">ตรวจสอบการจ้างงาน</a>
                                                       @if (!Auth::user()->designer())
                                                       <a class="ml-2 nav-link" role="button" href="#">ภาพรวมรายรับของฉัน</a>
               
                                                       @elseif (Auth::user()->designer())
                                                           <a class="ml-2 nav-link" role="button" href="{{route('designer.billing',Auth::user()->designer()->token)}}">ภาพรวมรายรับของฉัน</a>
                                                       @endif
                                                          @if (!Auth::user()->designer())
                                                          <a class="ml-2 nav-link" href="#">เรทและราคางานของฉัน</a>
               
                                                          @elseif (Auth::user()->designer())
                                                          <a class="ml-2 nav-link" href="{{ route('designer.course', Auth::user()->designer()->token) }}">เรทและราคางานของฉัน</a>
                                                          @endif
                                                          <a class="ml-2 nav-link" href="/favouritelist">ผลงานที่ถูกใจ</a>
                                                          <a class="ml-2 nav-link" href="{{ route('designer.designer') }}">โปรไฟล์ส่วนตัว</a>
                                                          <a class="ml-2 nav-link"  href="{{ route('logout') }}"
                                                          onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">ออกจากระบบ</a>
                                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                              {{ csrf_field() }}
                                                          </form>
                                                      
                                                    </div>
                                                    <div class="col-3 text-center" style="display:grid;">
                                                      <span class="icon chat float-right mr-2"></span>
                                                      <span class="icon list-ul float-right mr-2"></span>
                                                      <span class="icon dollar-sign  float-right mr-2"></span>
                                                      <span class="icon file-import float-right mr-2"></span>
                                                      <span class="icon love-sym float-right mr-2"></span>
                                                      <span class="icon cog float-right mr-2"></span>
                                                      <span class="icon sign-out float-right mr-2"></span>
                                                    </div>
                                                </div>

                                              </div>
                                              
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </li>
                              {{-- 1 --}}
                             
                            {{-- 2 --}}
                           
                        @elseif(Auth::user()->role=='2')
                        <li class="nav-item"><a class="nav-link" role="button" href="/dashboard">Dashboard</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" role="button" href="/gallery">ผลงาน</a></li> --}}
                        
                        <li class="dropdown nav-item" >
                            <a  href="#" class="dropdown-toggle nav-link btn" style="color:#523EE8;" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class=" icon profile"></span>
                            </a>
                            {{-- {{ Auth::user()->name }} --}}
                            <!-- <a class="nav-link" role="button" href="/login/designer">Register to Designer</a> -->
                            <ul class="dropdown-menu "   role="menu">
                                <li class="nav-item">
                                    <div class="wrapper-profile">
                                      <div class="profile-color d-flex p-2">
                                          {{-- <img class="ml-3 rounded-circle" src="https://picsum.photos/50" alt="" style="width:50px;height:50px;"> --}}
                                       <h5 class="ml-2 mt-3">{{ Auth::user()->name }}</h5>
                                      </div> 
                                    </div>
                                   </li>
                                   {{-- <li class="nav-item">
                                       <a class="ml-2 nav-link" href="#">ข้อความและการจ้างงาน  <span class="icon chat float-right mr-2"></span></a>
                                       
                                   </li> --}}
                                   {{-- <li class="nav-link">
                                       <a class="ml-2 nav-link" role="button" href="/requestjob">ตรวจสอบการจ้างงาน  <span class="icon list-ul float-right mr-2"></span></a>
                                   </li> --}}
                                   {{-- <li class="nav-link">
                                       <a class="ml-2 nav-link" href="#">อัพโหลดผลงาน  <span class="icon file-import float-right mr-2"></span></a>
                                   </li> --}}
                                   {{-- <li class="nav-link">
                                       <a class="ml-2 nav-link" href="/favouritelist">ผลงานที่ถูกใจ  <span class="icon love-sym float-right mr-2"></span></a>
                                   </li> --}}
                                   {{-- <li class="nav-link">
                                       <a class="ml-2 nav-link" href="{{ route('designer.designer') }}">โปรไฟล์ส่วนตัว  <span class="icon cog float-right mr-2"></span></a>
                                   </li> --}}
                                   <li class="nav-link">
                                       <hr>
                                       <a class="ml-2 nav-link"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">ออกจากระบบ  <span class="icon sign-out float-right mr-2"></span>
                                       </a>
                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                           {{ csrf_field() }}
                                       </form>
                                   </li>
                            </ul>
                        </li>
                          {{-- 1 --}}
                         
                        {{-- 2 for User --}}
                        @else

                        @php
                            $user = Auth::user()->find(Auth::user()->id);
                            $profile = $user->profile();
                        @endphp


                            <li class="nav-item"><a class="nav-link" role="button" href="{{ route('search.create') }}">ค้นหานักออกแบบ</a></li>
                            <li class="nav-item"><a class="nav-link" role="button" href="/preview">พรีวิว</a></li>
                            <li class="nav-item"><a class="nav-link" role="button" href="/gallery">ผลงาน</a></li>
                            <li class="dropdown nav-item d-none d-lg-block" onclick="markNotificationAsRead('{{count(auth()->user()->unreadNotifications)}}')" >
                                <a class="nav-link  " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    <span class="icon notification"></span>
                                    @if (count(auth()->user()->unreadNotifications) == 0 )
                                    <span class="pending shadow-sm font-weight-bold  text-center" style=" position:absolute; left:25px;    margin: 0;background-color:white; color:black; width:15px; height:15px;  border-radius:50%; font-size:12px; 
                                    ">
                                        {{count(auth()->user()->unreadNotifications)}}
                                    </span> 
                                    
                                    @else
                                    
                                    <span class="pending shadow-sm font-weight-bold  text-center" style=" position:absolute; left:25px;    margin: 0;background-color:#FE3A76; color:white; width:15px; height:15px;  border-radius:50%; font-size:12px; 
                                    ">
                                        {{count(auth()->user()->unreadNotifications)}}
                                    </span>
                                    @endif
                                </a>
                                <div class="dropdown-menu" style=" box-shadow: 5px 1px 20px 1px rgba(144, 74, 232,.15);" aria-labelledby="navbarDropdownMenuLink">
                                    <div class="wrapper-notification">
                                        <div class="overflow-noctification p-2 p-md-5">
                                            @forelse (auth()->user()->unreadNotifications as $notification)
                                                
                                                <div class="row">
                                                    
                                                    @include('components.notifications.'.snake_case(class_basename($notification->type)))

                                                </div>
                                                @empty
                                                    <a class="gray text-center" href="#">ยังไม่มีการแจ้งเตือนใดๆ</a>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                            </li>
                            {{-- noti mobile  --}}
                            <li class="d-lg-none">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                      <div class="nav-item" id="headingTwo">
                                    
                                          <div class=" collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          
                                           <div class="row">
                                               <div class="col-9">
                                                <a class="nav-link">การแจ้งเตือน  @if (count(auth()->user()->unreadNotifications) == 0 )
                                                    <span class="mt-1 ml-2 pending shadow-sm font-weight-bold text-center" style=" position:absolute;    margin: 0;background-color:white; color:black; width:15px; height:15px;  border-radius:50%; font-size:12px; 
                                                    ">
                                                        {{count(auth()->user()->unreadNotifications)}}
                                                    </span> 
                                                    
                                                    @else 
                                                    
                                                    <span class="mt-1 ml-2 pending shadow-sm font-weight-bold  text-center" style=" position:absolute;    margin: 0;background-color:#FE3A76; color:white; width:15px; height:15px;  border-radius:50%; font-size:12px; 
                                                    ">
                                                        {{count(auth()->user()->unreadNotifications)}}
                                                    </span>
                                                </a>
                                  
                                    @endif</a>
                                                
                                               </div>
                                               <div class="col-3 text-center">
                                                <i class="icon _hilight fas fa-caret-down"></i>
                                               </div>
                                           </div>
                                          </div>
                                        
                                      </div>
                                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="wrapper-notificatio-m">
                                                <div class="overflow-noti-mobile p-2 p-md-5">
                                                    @forelse (auth()->user()->unreadNotifications as $notification)
                                                        
                                                        <div class="row">
                                                            
                                                            <div class="col-3">
                                                                <figure class="  img-fluid">
                                                                    <div class="active-notification float-right rounded-circle"></div>
                                                                    <img class="rounded-circle w-100 " src="https://picsum.photos/40">
                                                                </figure>
                                                            </div>
                                                            <div class="col-9">
                                                                @include('components.notifications.'.snake_case(class_basename($notification->type)))
        
                                                                {{-- <small class="ml-2" style="color:#523EE8;">{{'notification_'.snake_case(class_basename($notification->type))}}</small> --}}
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                        @empty
                                                            <a class="gray text-center" href="#">ยังไม่มีการแจ้งเตือนใดๆ</a>
                                                    @endforelse
        
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </li>
                            <li class="dropdown nav-item d-none d-lg-block">
                                
                                <a href="#" class=" nav-link btn " data-toggle="dropdown" role="button" aria-expanded="false">
                                     <span class=" icon profile"></span>
                                </a>
                              

                                <ul class="dropdown-menu " role="menu" style="border: 3px solid #523EE8;">
                                    <li class="nav-item">
                                     <div class="wrapper-profile">
                                       <div class="profile-color d-flex p-2">
                                        
                                        @if ($profile)

                                           <img class="ml-3 rounded-circle" src="/{{ $profile->profilepic }}" alt="" style="width:50px;height:50px; border:solid 1px white;">
                                        @else
                                        <img class="ml-3 rounded-circle" src="{{ Auth::user()->avatar }}" alt="" style="width:50px;height:50px; border:solid 1px white;">

                                        @endif

                                           <h5 class="ml-2 mt-3">{{ Auth::user()->name }}</h5>
                                       </div> 
                                     </div>
                                    </li>
                                   
                                    <li class="nav-link">
                                        <a class="ml-2 nav-link" href="/message">ข้อความ  <span class="icon chat float-right mr-2"></span></a>
                                    </li>
                                    <li class="nav-link">
                                        <a class="ml-2 nav-link" role="button" href="/alljob">ตรวจสอบการจ้างงาน  <span class="icon list-ul float-right mr-2"></span></a>
                                    </li>
                                    <li class="nav-link">
                                        <a class="ml-2 nav-link" href="/favouritelist">ผลงานที่ถูกใจ  <span class="icon love-sym float-right mr-2"></span></a>
                                    </li>
                                    <li class="nav-link">
                                        <a class="ml-2 nav-link" href="{{ route('profile.create') }}">โปรไฟล์ส่วนตัว  <span class="icon cog float-right mr-2"></span></a>
                                    </li>
                                    <li class="nav-link">
                                        <hr>
                                        <a class="ml-2 nav-link"  href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">ออกจากระบบ  <span class="icon sign-out float-right mr-2"></span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link " role="button" href="/alljob">การจ้างงาน</a>
                                        <!-- <a class="nav-link" role="button" href="/designer/show/{token}">Designer Information</a> -->
                                    </li> --}}
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            ออกจากระบบ
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li> --}}
                                </ul>
                            </li>
                            {{-- menu mobile  --}}
                            <li class="d-lg-none ">
                                <div class="accordion" id="accordionExample">
                                  
                                    <div class="card">
                                      <div class="nav-item" id="headingThree">
                                   
                                          <div class=" collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                
                                           <div class="row">
                                               <div class="col-9">
                                                <a class="nav-link">เมนูของฉัน</a>
                                               </div>
                                               <div class="col-3 text-center">
                                                <i class="icon _hilight fas fa-caret-down"></i>
                                               </div>
                                           </div>
                                        </div>
                                        
                                      </div>
                                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="">
                                            <div class="wrapper-profile-m">
                                                <div class="profile-color d-flex p-2">
                                                 @php
                                                     $user = Auth::user()->find(Auth::user()->id);
                                                     $profile = $user->profile();
                                                 @endphp
                                                 @if ($profile)
         
                                                    <img class="ml-3 rounded-circle" src="{{ $profile->profilepic }}" alt="" style="width:50px;height:50px; border:solid 1px white;">
                                                 @else
                                                 <img class="ml-3 rounded-circle" src="{{ Auth::user()->avatar }}" alt="" style="width:50px;height:50px; border:solid 1px white;">
         
                                                 @endif
         
                                                    <h5 class="ml-2 mt-3">{{ Auth::user()->name }}</h5>
                                                </div> 
                                              </div>
                                              <div class="row">
                                                  <div class="col-9">
                                                        <a class="ml-2 nav-link" href="/message">ข้อความ</a>
                                                   
                                                        <a class="ml-2 nav-link" role="button" href="/alljob">ตรวจสอบการจ้างงาน</a>                                                                                                      
                                             
                                                        <a class="ml-2 nav-link" href="/favouritelist">ผลงานที่ถูกใจ</a>
                                                    
                                                   
                                                        <a class="ml-2 nav-link" href="{{ route('profile.create') }}">โปรไฟล์ส่วนตัว</a>
                                                   
                                                   
                                                        
                                                        <a class="ml-2 nav-link"  href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">ออกจากระบบ
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                
                                                  </div>
                                                  <div class="col-3 text-center" style="display:grid;">
                                                    <span class="icon chat float-right mr-2"></span>
                                                    <span class="icon list-ul float-right mr-2"></span>
                                                    <span class="icon love-sym float-right mr-2"></span>
                                                    <span class="icon cog float-right mr-2"></span>
                            
                                                    <span class="icon sign-out float-right mr-2"></span>
                                                  </div>
                                              </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </li>
                        @endif

                    </ul>

                </div>
            </div>
        </nav>