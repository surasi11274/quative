<a href="{{route('job.show', $notification->data['jobs']['token'])}}" style="text-decoration:none;"">
    <label class="font-weight-bold" for="name">{{$notification->data['user']['name']}} </label><br>

    <small class="ml-2 " style="color:#523EE8;">Accept your job W{{$notification->data['jobs']['id']}}
    </small>
    <br>
        <small>{{$notification->created_at->diffForHumans()}}</small>
    <hr>
</a>
