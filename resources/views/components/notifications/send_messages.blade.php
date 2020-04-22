
<div class="col-3">
    <figure class="img-fluid">
        <div class="active-notification float-right rounded-circle"  ></div>
        <div >

        @php
        $user = $notification->data['messages']['from'];
        // $profile = $notification->data['user']['user_id'];
        $isuser = \App\User::find($user);
        $isdesigner = $isuser->designer();
        $isprofile = $isuser->profile();

    @endphp

    @if ($isdesigner && $isdesigner->profilepic !== NULL)
        <img class="rounded-circle obj-img-noti"  src="/{{$isdesigner->profilepic}}">

    @elseif($isprofile && $isprofile->profilepic !== NULL)
        <img class="rounded-circle obj-img-noti"  src="/{{$isprofile->profilepic}}">
    @else 
        <img class="rounded-circle obj-img-noti"  src="{{$notification->data['user']['avatar']}}">

    @endif    
</div>
</figure>
</div>
<div class="col-9">
    <a href="/message" style="text-decoration:none;"">
        <label class="font-weight-bold" for="name">{{$notification->data['user']['name']}} </label><br>
    
        <small style="color:#523EE8;">Send your messages
            {{-- {{$notification->data['jobs']['id']}} --}}
        </small>
        <br>
            <small>{{$notification->created_at->diffForHumans()}}</small>
        <hr>
    </a>
    {{-- <small class="ml-2" style="color:#523EE8;">{{'notification_'.snake_case(class_basename($notification->type))}}</small> --}}
    
</div>