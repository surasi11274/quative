<a href="/message" style="text-decoration:none;"">
    <label class="font-weight-bold" for="name">{{$notification->data['user']['name']}} </label><br>

    <small class="ml-2 " style="color:#523EE8;">Send your messages
        {{-- {{$notification->data['jobs']['id']}} --}}
    </small>
    <br>
        <small>{{$notification->created_at->diffForHumans()}}</small>
    <hr>
</a>
