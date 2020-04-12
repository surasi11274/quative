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
                                    <span class="caret icon user-1"></span>
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
                            <li class="dropdown nav-item mr-2" onclick="markNotificationAsRead('{{count(auth()->user()->unreadNotifications)}}')" >
                                <a class="nav-link  " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#523EE8;text-align: center; width: 50px; height: 80px;">
                                    <span class="icon notification"></span>
                                    <span class="pending shadow-sm font-weight-bold  text-center" style=" position:absolute; left:25px;    margin: 0;background-color:white; color:#523EE8; width:15px; height:15px padding:2px; border-radius:50%; font-size:12px; 
                                    ">
                                        {{count(auth()->user()->unreadNotifications)}}
                                    </span>
                                </a>
                                <div class="dropdown-menu  p-5" style=" box-shadow: 5px 1px 20px 1px rgba(144, 74, 232,.15);" aria-labelledby="navbarDropdownMenuLink">
                                    <div class="wrapper-notification">
                                        <div class=" overflow-noctification p-2">
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
                                                    <a href="#">No Unread Notifications</a>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown nav-item" >
                                <a  href="#" class="dropdown-toggle nav-link btn" style="color:#523EE8;" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="caret icon profile"></span>
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
                                           <h5 class="ml-2">{{ Auth::user()->name }}</h5>
                                          </div> 
                                        </div>
                                       </li>
                                       <li class="nav-item">
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
                              {{-- 1 --}}
                             
                            {{-- 2 --}}
                           
                        @elseif(Auth::user()->role=='2')
                        <li class="nav-item"><a class="nav-link" role="button" href="/dashboard">Dashboard</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" role="button" href="/gallery">ผลงาน</a></li> --}}
                        
                        <li class="dropdown nav-item" >
                            <a  href="#" class="dropdown-toggle nav-link btn" style="color:#523EE8;" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="caret icon profile"></span>
                            </a>
                            {{-- {{ Auth::user()->name }} --}}
                            <!-- <a class="nav-link" role="button" href="/login/designer">Register to Designer</a> -->
                            <ul class="dropdown-menu "   role="menu">
                                <li class="nav-item">
                                    <div class="wrapper-profile">
                                      <div class="profile-color d-flex p-2">
                                          {{-- <img class="ml-3 rounded-circle" src="https://picsum.photos/50" alt="" style="width:50px;height:50px;"> --}}
                                       <h5 class="ml-2">{{ Auth::user()->name }}</h5>
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
                         
                        {{-- 2 --}}
                        @else



                            <li class="nav-item"><a class="nav-link" role="button" href="{{ route('search.create') }}">ค้นหานักออกแบบ</a></li>
                            <li class="nav-item"><a class="nav-link" role="button" href="/preview">พรีวิว</a></li>
                            <li class="nav-item"><a class="nav-link" role="button" href="/gallery">ผลงาน</a></li>
                            <li class="dropdown nav-item mr-2" onclick="markNotificationAsRead('{{count(auth()->user()->unreadNotifications)}}')" >
                                <a class="nav-link  " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#523EE8;text-align: center; width: 50px; height: 80px;">
                                    <span class="icon notification"></span>
                                    <span class="pending shadow-sm font-weight-bold  text-center" style=" position:absolute; left:25px;    margin: 0;background-color:white; color:#523EE8; width:15px; height:15px padding:2px; border-radius:50%; font-size:12px; 
                                    ">
                                        {{count(auth()->user()->unreadNotifications)}}
                                    </span>
                                </a>
                                <div class="dropdown-menu  p-5" style=" box-shadow: 5px 1px 20px 1px rgba(144, 74, 232,.15);" aria-labelledby="navbarDropdownMenuLink">
                                    <div class="wrapper-notification">
                                        <div class=" overflow-noctification p-2">
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
                                                    <a href="#">No Unread Notifications</a>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown nav-item">
                                
                                <a href="#" class=" nav-link btn " data-toggle="dropdown" role="button" aria-expanded="false">
                                     <span class="caret icon profile"></span>
                                </a>
                              

                                <ul class="dropdown-menu " role="menu" style="border: 3px solid #523EE8;">
                                    <li class="nav-item">
                                     <div class="wrapper-profile">
                                       <div class="profile-color d-flex p-2">
                                           <img class="ml-3 rounded-circle" src="{{ Auth::user()->avatar }}" alt="" style="width:50px;height:50px; border:solid 1px white;">
                                        <h5 class="ml-2">{{ Auth::user()->name }}</h5>
                                       </div> 
                                     </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="ml-2 nav-link" href="/message">ข้อความ  <span class="icon chat float-right mr-2"></span></a>
                                        
                                    </li>
                                    <li class="nav-link">
                                        <a class="ml-2 nav-link" role="button" href="/alljob">ตรวจสอบการจ้างงาน  <span class="icon list-ul float-right mr-2"></span></a>
                                    </li>
                                    <li class="nav-link">
                                        <a class="ml-2 nav-link" href="#">อัพโหลดผลงาน  <span class="icon file-import float-right mr-2"></span></a>
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
                        @endif

                    </ul>

                </div>
            </div>
        </nav>