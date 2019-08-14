@extends('layouts.app')
@section('app')
<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>

<!-- {{ Form::submit('back') }}
{{ Form::close() }} -->


 {{ link_to_route('posts.index', '[back]') }}


@endsection
