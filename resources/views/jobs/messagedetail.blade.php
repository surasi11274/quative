<div class="header text-center p-3">
    <h5 class="font-weight-bold pt-4">
        @if (!auth()->user()->designer())
            คุยกับนักออกแบบ {{$isnotdesigner->name}} {{$isnotdesigner->surname}}

        @elseif (auth()->user()->designer())
            คุยกับ {{$isdesigner->name}} 

        @endif
    </h5>
  </div>
<div class="message-wrapper">
    <ul class="messages">

        @foreach ($messages as $message)
            <li class="message clearfix">
                <div class="{{($message->from == Auth::id()) ? 'sent' : 'received' }}">

                    <p class="over-wrap">{{$message->message }}</p>
                    <p class="date">{{ $message->created_at->diffForHumans()}}</p>
                    
                </div>

            </li>
        @endforeach
    </ul>
</div>

<div class="input-text">
    <input type="text" name="message" class="submit"  placeholder="กดเพื่อพิมพ์ข้อความ...">
</div>
