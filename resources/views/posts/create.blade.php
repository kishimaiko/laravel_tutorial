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
{{ Form::submit('create') }}
{{ Form::close() }}
{{ link_to_route('posts.index', '[Back]') }}
@endsection

@if($errors->has('title'))
<span class="text-danger">{{ $errors->first('title') }}</span>
@endif
@if($errors->has('content'))
<span class="text-danger">{{ $errors->first('content') }}</span>
@endif