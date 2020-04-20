
<div class="col-3">
    <figure class="img-fluid">
        <div class="active-notification float-right rounded-circle" ></div>
        <div style="">
            @php
                $designerid = $notification->data['jobs']['designer_id'];
                $profileid = $notification->data['jobs']['user_id'];
                $isdesigner = \App\Designer::find($designerid);
                $user = \App\User::find($profileid);
                $isprofile = $user->profile();
    
            @endphp
    
            @if ($isdesigner)
                @if ($isprofile)
                    <img class="rounded-circle" style="width:70px; height:70px; object-fit:cover;"  src="/{{$isprofile->profilepic}}">
                @else 
                    <img class="rounded-circle" style="width:70px; height:70px; object-fit:cover;"  src="{{$notification->data['user']['avatar']}}">
                @endif
    
            @elseif($isprofile)
                @if ($isdesigner)
                    <img class="rounded-circle" style="width:70px; height:70px; object-fit:cover;"  src="/{{$isdesigner->profilepic}}">
                @else 
                    <img class="rounded-circle" style="width:70px; height:70px; object-fit:cover;"  src="{{$notification->data['user']['avatar']}}">
                @endif
            @else 
                <img class="rounded-circle" style="width:70px; height:70px; object-fit:cover;"  src="{{$notification->data['user']['avatar']}}">
    
            @endif
        </div>
</figure>
</div>
<div class="col-9">
    <a href="{{route('designer.jobdetail', $notification->data['jobs']['id'])}}" style="text-decoration:none;"">
        <label class="font-weight-bold" for="name">{{$notification->data['user']['name']}} </label><br>
    
        <small class="text-danger" style="color:#523EE8;">Cancel your job W{{$notification->data['jobs']['id']}}
        </small>
        <br>
            <small>{{$notification->created_at->diffForHumans()}}</small>
        <hr>
    </a>
    {{-- <small class="ml-2" style="color:#523EE8;">{{'notification_'.snake_case(class_basename($notification->type))}}</small> --}}
    
</div>