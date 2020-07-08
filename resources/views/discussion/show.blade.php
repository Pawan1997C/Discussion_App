@extends('layouts.app')

@section('content')

<div class="card">

    @include('partial.discussion-header')

    <div class="card-body">

        <div class="text-center">

            <strong>{{$discussion->title}}</strong>

        </div>

        <hr>

        {!!Str::limit($discussion->content, 800)!!}

        @if($discussion->bestReply)

        <div class="card bg-success my-5">

            <div class="card-header">


                <div class="d-flex justify-content-between">


                    <div>

                        <img src="{{Gravatar::src($discussion->bestReply->owner->email)}}" height="40px" width="40px"
                            style="border-radius: 50px">

                        <strong class="ml-2">{{$discussion->bestReply->owner->name}}</strong>

                    </div>

                </div>

                <div class="card-body">

                    {!!$discussion->bestReply->content!!}


                </div>


            </div>


        </div>


        @endif

    </div>
</div>

<!-- Reply List  Start -->
@foreach($discussion->replies()->paginate(3) as $reply)

<div class="card my-5">

    <div class="card-header">

        <div class="d-flex justify-content-between">

            <div>

                <img src="{{Gravatar::src($reply->owner->email)}}" style="border-radius: 50px" height=50px>

                <span class="ml-2"><strong>{{$reply->owner->name}}</strong></span>

            </div>

            @if(auth()->user()->id === $discussion->author->id)

            <div>

                <form
                    action="{{route('discussion.best-reply', ['discussion' => $discussion->slug, 'id' => $reply->id])}}"
                    method="post">

                    @csrf


                    <button type="submit" class="btn btn-outline-info">Mark as best Reply</button>


                </form>

            </div>

            @endif

        </div>


    </div>

    <div class="card-body">

        {!!$reply->content!!}


    </div>


</div>


@endforeach

<!-- Reply List End -->

{{$discussion->replies()->paginate(3)->links()}}

<div class="card my-5">

    <div class="card-header">Add Reply</div>


    <div class="card-body">


        @auth

        <form action="{{route('replies.store', $discussion->slug)}}" method="post">
            @csrf


            <div class="form-group">

                <textarea name="content" id="summernote" cols="5" rows="5" class="form-control"></textarea>

            </div>

            <div class="form-group">


                <button type="submit" class="btn btn-outline-success">Add Reply</button>


            </div>



        </form>

        @else

        <a href="{{route('login')}}" class="btn btn-outline-info">Sign In For Add Reply</a>

        @endauth


    </div>

</div>
@endsection

@section('css')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
  $('#summernote').summernote();
});

</script>

@endsection