@extends('layouts.app')

@section('app')

<div class="container">

<h1>blog.edit</h1>

{{ Form::open(['route' => ['posts.update', $post->id], 'method' => 'put']) }}
    <div>
        {{ Form::text('title', $post->title) }}
    </div>

    <div>
        {{ Form::textarea('content', $post->content) }}
    </div>

{{ Form::submit('update') }}
{{ Form::close() }}


@if($errors->has('title'))
<span class="text-danger">{{ $errors->first('title') }}</span>
@endif 
@if($errors->has('content'))
<span class="text-danger">{{ $errors->first('content') }}</span>
@endif

</div>

@endsection
