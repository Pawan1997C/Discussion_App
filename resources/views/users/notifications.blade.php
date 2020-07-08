@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Notifications</div>

    <div class="card-body">


        <ul class="list-group">

            @foreach($notifications as $notification)


            @if($notification->type === 'Discussion\Notifications\NewReplyAdded')
            <li class="list-group-item">

                A New Reply Added To Discusion: <strong>{{$notification->data['discussion']['title']}}</strong>

                <a href="{{route('discussion.show', $notification->data['discussion']['slug'])}}"
                    class="btn btn-outline-info float-right">View Discussion</a>
            </li>
            @endif

            @if($notification->type === 'Discussion\Notifications\MarkAsBestReply')

            <li class="list-group-item">

                Your Reply For <strong>{{$notification->data['discussion']['title']}}</strong> Marked as Best Reply

                <a href="{{route('discussion.show', $notification->data['discussion']['slug'])}}"
                    class="btn btn-outline-info float-right">View Discussion</a>

            </li>

            @endif

            @endforeach

        </ul>




    </div>
</div>
@endsection