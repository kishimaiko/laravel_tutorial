@extends('layouts.app')
@section('app')
<h1>posts.create</h1>
{{ Form::open(['route'=>'posts.store']) }}
{{ csrf_field() }}
<div>
{{ Form::text('title', $post->title) }}
</div>
<div>
{{ Form::textarea('content', $post->content) }}
</div>
{{ Form::submit('create') }}
{{ Form::close() }}
@endsection

@if($errors->has('title'))
<span class="text-danger">{{ $errors->first('title') }}</span>
@endif
@if($errors->has('content'))
<span class="text-danger">{{ $errors->first('content') }}</span>
@endif