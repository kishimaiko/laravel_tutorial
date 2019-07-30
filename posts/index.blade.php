@extends('layouts.app')
@section('title','記事一覧')
@section('content')
<table>
<tr>
<th>title</th>
<th>content</th>
<th>created_at</th>
</tr>
@foreach($posts as $post)
<tr>
<td><li>{{ $post->title }}</li></td>
<td>{{ $post->content }}</td>
<td>{{ $post->created_at }}</td>
</tr>
@endforeach
</table>
@endsection

