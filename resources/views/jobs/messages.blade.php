@extends('layouts.app')

@section('assets')
    <link rel="stylesheet" href="../css/messages.css">
@endsection

@section('content')
    <div class="container d-none d-md-block">
        <div class="row">
            <div class="col-md-4 mt-5">
              <div class="header p-3">
                <h5 class="font-weight-bold pt-4">
                  กล่องข้อความ
                </h5>
              </div>
                <div class="user-wrapper">

                    <ul class="users">

                        @foreach ($users as $user)
                            @if (!auth()->user()->designer())
                                
                            {{-- @php
                            $designer = \App\Designer::where('user_id',$user->id)->get();
                            @endphp --}}
                            <li class="user" id="{{$user->id}}">
                                {{-- will show unread count notification --}}
                                @if($user->unread)
                                    <span class="pending">
                                        {{ $user->unread}}
                                    </span>
                                @endif
                                <div class="media">
                                    <div class="media-left">
                                      <img src="{{$user->designerpic}}" class="media-object" width="150"  alt="">
                                    </div>

                                    <div class="media-body">
                                      <p class="name">{{$user->designername}} {{$user->designersurname}}</p>
                                        {{-- <p class="email">{{$user->email}}</p> --}}
                                    </div>
                                </div>
                            </li>
                            @elseif (auth()->user()->designer())
                             
                              <li class="user" id="{{$user->id}}">
                                  {{-- will show unread count notification --}}
                                  @if($user->unread)
                                      <span class="pending">
                                          {{ $user->unread}}
                                      </span>
                                  @endif
                                  <div class="media">
                                      <div class="media-left">
                                        <img src="https://via.placeholder.com/150" class="media-object" width="150"  alt="">
                                      </div>

                                      <div class="media-body">
                                          <p class="name">{{$user->name}}</p>
                                          {{-- <p class="email">{{$user->email}}</p> --}}
                                      </div>
                                  </div>
                              </li>
                            @endif
                            
                        @endforeach
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-8 mt-5" id="messages">
                
            </div>
        </div>
    </div>
    
@endsection
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script>
    var receiver_id = '';
    var my_id = "{{ Auth::id()}}";
    var token = "{{$jobs->token}}"
    $(document).ready(function() {
      //ajax setup from csrf token
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
    channel.bind('my-event', function(data) {
      // alert(JSON.stringify(data));
      if (my_id == data.from) {
        // alert('sender');
        $('#' == data.to).click();
      } else if (my_id == data.to){
        if (receiver_id == data.from) {
          //if receiver is selected,reload the selected user
          $('#' + data.from).click();
        } else {
          //if receiver is not selected,add notidication for that users
          var pending = parseInt($('#' + data.from).find('.pending').html());

          if (pending) {
            $('#' + data.from).find('.pending').html(pending + 1);
          } else {
            $('#' + data.from).append('<span class="pending">1</span>');
          }
        }
      }
    });

      $('.user').click(function() {
        $('.user').removeClass('active');
        $(this).addClass('active');
        $(this).find('.pending').remove();

        receiver_id = $(this).attr('id');
        $.ajax({
          type: "get",
          url: "messages/" + token + "/" + receiver_id,
          data: "",
          cache: false,
          success: function(data) {
            $('#messages').html(data);
            scrollToButtomFunc();
          }
        });

      });
      $(document).on('keyup','.input-text input', function(e) { 
        var message = $(this).val();

        //check if enter key is pressed and message is not null also reciever is selected
        if (e.keyCode == 13 && message != '' && receiver_id != '') {
          $(this).val(''); //while pressed enter text box will be empty

          var datastr = "receiver_id=" + receiver_id + "&message=" + message;
          $.ajax({
            type: "post",
            url: "message", //need to create this post route
            data: datastr,
            cache: false,
            success: function (data) { },
            error: function (jqXHR, status, err) { },
            complete: function () { 
              scrollToButtomFunc();
            }
          })
        }
      });

      //make a function to scroll auto
      function scrollToButtomFunc() {
        $('.message-wrapper').animate({
          scrollTop: $('.message-wrapper').get(0).scrollHeight
        },50);
      }
    });
  </script>
   --}}