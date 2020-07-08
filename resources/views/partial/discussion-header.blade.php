<div class="card-header">

    <div class="d-flex justify-content-between">


        <div>

            <img src="{{Gravatar::src($discussion->author->email)}}" style="border-radius: 50px" height=50px>

            <span class="ml-2"><strong>{{$discussion->author->name}}</strong></span>

        </div>


        <div>

            <a href="{{route('discussion.show', $discussion->slug)}}" class="btn btn-outline-success">view</a>

        </div>


    </div>


</div>