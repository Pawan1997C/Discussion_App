@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Add Discussion</div>

    <div class="card-body">

        <form action="{{route('discussion.store')}}" method="post">
            @csrf

            <div class="form-group">

                <label for="title">Title</label>

                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}">

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="form-group">

                <label for="channel">Channels</label>

                <select name="channel_id" id="channel" class="form-control @error('channel_id') is-invalid @enderror">

                    <option value="">Select Channel</option>

                    @foreach($channels as $channel)

                    <option value="{{$channel->id}}">{{$channel->name}}</option>

                    @endforeach

                </select>
                @error('channel_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="form-group">

                <label for="content">Content</label>

                <textarea name="content" id="summernote" cols="5" rows="5"
                    class="form-control @error('content') is-invalid @enderror">{{old('content')}}</textarea>

                @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="form-group">

                <button type="submit" class="btn btn-outline-info">Add Discussion</button>

            </div>
        </form>

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