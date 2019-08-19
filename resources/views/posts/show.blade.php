@extends('layouts.app')
@section('app')

<div class="container">
<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>

<!-- {{ Form::submit('back') }}
{{ Form::close() }} -->

 {{ link_to_route('posts.edit', '[Edit]', [$post->id]) }}
 {{ Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete', 'name' => 'delete_' . $post->id, 'style' => 'display:inline;']) }}
   <a href="javascript:document.{{ 'delete_' . $post->id }}.submit()" onclick="return confirm('削除しますか？');">[Delete]</a>
 {{ link_to_route('posts.index', '[Back]') }}

</container>
@endsection
