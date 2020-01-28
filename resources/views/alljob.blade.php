@extends('layouts.app')

@section('content')
<div class="container " style="margin-top:150px;height:200px;">
    <table class="table">
        <thead class="thead-dark">
            <p>{{$user->id}}</p>
          <tr>
            <th scope="col">ข้อมูลการจ้างงาน</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
                
          <tr>
            <th scope="row">{{$job->id}}</th>
            <td>{{$job->user_id}}</td>
            <td>
              {{$job->jobstatus_id}}
            {{-- @php
                                    $jobstatusid = \App\Jobstatus::find($job->jobstatus_id)->statusName;
            @endphp --}}
                                        {{-- @if ($jobs->jobstatus_id = 1) --}}
                                       
                                    {{-- <h1 style="color:yellow;">{{$jobstatusid}}</h1>

                                        @endif  --}}
            </td>                   
            <td>
                <a href="{{ route('job.show', $job->token) }}"><button class="btn btn-primary">ดูข้อมูลงาน</button></a>
                <button class="btn btn-danger">X</button>
            </td>

          </tr>
          @endforeach

        </tbody>
      </table>
</div>

@endsection
