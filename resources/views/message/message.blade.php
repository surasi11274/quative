@extends('layouts.app')

@section('assets')
    <link rel="stylesheet" href="../css/messages.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 mt-5">
              <div class="header p-3">
                <h5 class="font-weight-bold pt-4">
                    <i class="fas fa-inbox mr-3 _gray"></i>
                  กล่องข้อความ
                </h5>
              </div>
                <div class="user-wrapper">

                    <ul class="users">

                        @forelse($users as $user)
                            @if (!auth()->user()->designer())
                                
                            {{-- @php
                            $designer = \App\Designer::where('user_id',$user->id)->get();
                            @endphp --}}
                            <li class="user" id="{{$user->id}}">
                                {{-- will show unread count notification --}}
                                @if($user->unread)
                                    <span class="pendingg font-weight-bold" style=" padding-top:1px;">
                                        {{$user->unread }}
                                    </span>
                                @endif
                                <div class="media">
                                    <div class="media-left">
                                      <img src="/{{$user->designerpic}}" class="media-object" width="150"  alt="">
                                    </div>

                                    <div class="media-body">
                                      <p class="name over-wrap">{{$user->designername}} {{$user->designersurname}}</p>
                                        <span class="email over-wrap">{{$user->email}}</span>
                                    </div>
                                </div>
                            </li>
                            @elseif (auth()->user()->designer())
                             
                              <li class="user" id="{{$user->id}}">
                                  {{-- will show unread count notification --}}
                                  @if($user->unread)
                                      <span class="pendingg font-weight-bold" style=" padding-top:1px;">
                                          {{ $user->unread }}
                                      </span>
                                  @endif
                                  <div class="media">
                                      <div class="media-left"> 
                                    @php
                                        $users = \App\User::find($user->id);
                                        $profile = $users->profile();
                                    @endphp

                                    @if ($profile)
                                    <img src="/{{$profile->profilepic}}" class="media-object" width="150"  alt="">

                                    @else 
                                    <img src="{{$users->avatar}}" class="media-object" width="150"  alt="">
                                    @endif

                                      </div>

                                      <div class="media-body">
                                          <p class="name over-wrap">{{$user->name}}</p>
                                      {{-- <small class="_gray">21 : 35</small> --}}
                                          <span class="email over-wrap">{{$user->email}}</span>
                                      </div>
                                  </div>
                              </li>
                            @endif
                        @empty 
                        <li class="user">
                            {{-- will show unread count notification --}}
                            
                            <div class="media">
                                

                                <div class="media-body ">
                                  <p class="name " >No Contact 
                                </div>
                            </div>
                        </li>
                        @endforelse
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-8 mt-5" id="messages">
            
              <div class="message-wrapper-none">
                  <ul class="messages">
                          <li class="message clearfix">
                            <h5 class="text-center _gray mt-md-4">เริ่มการสนทนา</h5>
                            
                          <div class="row">
                              <div class="col-12 mt-5">
                                
                                    <img class="img-fluid w-50 center" src="../photo/Enterpreuer.png" alt="">
                                
                  
                              </div>
                          </div>
                          </li>
                  </ul>
              </div>
            </div>
        </div>
    </div>
    
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <script>
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () {
        // ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('99379076b02711beecee', {
            cluster: 'ap1',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function (data) {
            // alert(JSON.stringify(data));
            if (my_id == data.from) {
                $('#' + data.to).click();
            } else if (my_id == data.to) {
                if (receiver_id == data.from) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.from).click();
                } else {
                    // if receiver is not seleted, add notification for that user
                    var pendingg = parseInt($('#' + data.from).find('.pendingg').html());

                    if (pendingg) {
                        $('#' + data.from).find('.pendingg').html(pendingg + 1);
                    } else {
                        $('#' + data.from).append('<span class="pendingg">1</span>');
                    }
                }
            }
        });

        $('.user').click(function () {
            $('.user').removeClass('active');
            $(this).addClass('active');
            $(this).find('.pendingg').remove();

            receiver_id = $(this).attr('id');
            $.ajax({
                type: "get",
                url: "message/" + receiver_id, // need to create this route
                data: "",
                cache: false,
                success: function (data) {
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            });
        });

        $(document).on('keyup', '.input-text input', function(e) {
            var message = $(this).val();

            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                $(this).val(''); // while pressed enter text box will be empty

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "message", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {

                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        });
    });

    // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }
</script>