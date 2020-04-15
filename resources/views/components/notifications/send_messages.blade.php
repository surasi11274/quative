<a href="/message" style="text-decoration:none;"">
    <label class="font-weight-bold" for="name">{{$notification->data['user']['name']}} </label><br>

    <small class="_hilight">Send your messages
        {{-- {{$notification->data['jobs']['id']}} --}}
    </small>
    <br>
        <small>{{$notification->created_at->diffForHumans()}}</small>
    <hr>
</a>
