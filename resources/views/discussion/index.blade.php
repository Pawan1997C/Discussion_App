@extends('layouts.app')

@section('content')

@if($discussions->count() > 0)

@foreach($discussions as $discussion)
<div class="card mb-4">

    @include('partial.discussion-header')

    <div class="card-body">

        <div class="text-center">

            <strong>{{$discussion->title}}</strong>

        </div>

    </div>
</div>
@endforeach

@else

<div class="card">
    <div class="card-header">
        <h3 class="text-center">No Discussions Yet</h3>
    </div>
</div>

@endif

{{$discussions->appends(['channel'=> request()->query('channel')])->links()}}
@endsection