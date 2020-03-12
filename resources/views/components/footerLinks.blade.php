  <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    

    <script src="https://js.pusher.com/5.1/pusher.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{asset('js/nav-shrink.js')}}"></script>
    <script src="{{asset('js/activeonclick.js')}}"></script>
    <script src="https://kit.fontawesome.com/099b07344f.js" crossorigin="anonymous"></script>

<script src="{{asset('js/dropzone.js')}}"></script>
    <script src="{{asset('js/progess-step.js')}}"></script>
    <script src="{{asset('js/preprofile.js')}}"></script>
    {{--optionnal utility--}}
    <script src="{{asset('js/inputmxlenght.js')}}"></script>
    {{--<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>--}}
    <script src="{{asset('js/flatpickr.js')}}"></script>
    <script src="{{asset('js/datepicker.js')}}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"  ></script>
    <script src="js/progress-bar-1.js"></script>
    {{-- <script src="js/formcalculations.js"></script> --}}
    <script src="{{asset('js/formcalculations.js')}}"></script>

    <script>
        AOS.init();
    </script>
    <script>
      var upload = new FileUploadWithPreview('myUniqueUploadId')
  </script> 
  <script>
    var receiver_id = '';
    var my_id = "{{ Auth::id()}}";
    $(document).ready(function() {
      //ajax setup from csrf token
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
          // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('dcfb3e617fc42df9d998', {
      cluster: 'ap2',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });

      $('.user').click(function() {
        $('.user').removeClass('active');
        $(this).addClass('active');

        receiver_id = $(this).attr('id');
        $.ajax({
          type: "get",
          url: "message/" + receiver_id,
          data: "",
          cache: false,
          success: function(data) {
            $('#messages').html(data);
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
            complete: function () { }
          })
        }
      });
    });
  </script>
  