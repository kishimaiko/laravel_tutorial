@extends('layouts.app')
@section('app')
<h1>NewBlog</h1>
{{ Form::open(['route'=>'posts.store']) }}
{{ csrf_field() }}
<div>
{{ Form::text('title', $post->title) }}
</div>
<div>
{{ Form::textarea('content', $post->content) }}
</div>
<button type="button" class="btn btn-outline-info">
{{ Form::submit('create') }}
{{ Form::close() }}
<div>
<button type="button" class="btn btn-outline-info">
{{ link_to_route('posts.index', '[Back]') }}
</div>
@endsection

@if($errors->has('title'))
<span class="text-danger">{{ $errors->first('title') }}</span>
@endif
@if($errors->has('content'))
<span class="text-danger">{{ $errors->first('content') }}</span>
@endif