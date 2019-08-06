@extends('layouts.app')

@section('content')

<h1>posts.index</h1>

        <ul>
        @foreach ($posts as $post)
            <li>
                {{ link_to_route('posts.create', '[new post]') }}
                {{ link_to_route('posts.show', $post->title, [$post->id]) }}
                {{ link_to_route('posts.edit', '[Edit]', [$post->id]) }}
                {{ Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete', 'name' => 'delete_' . $post->id, 'style' => 'display:inline;']) }}
                    <a href="javascript:document.{{ 'delete_' . $post->id }}.submit()" onclick="return confirm('削除しますか？');">[Delete]</a>
                {{ Form::close() }}
            </li>
        @endforeach

        <!-- @if (Session::has('flash_message'))
                {{ Session::get('flash_message') }}
        @endif -->
    　@if(Session::has('message'))
       <!-- <div class="alert alert-success"> -->
          {{ session('message') }}
      <!-- </div> -->
    　@endif

     <!-- \Session::flash('flash_message', '記事を更新しました。'); -->


        {{ Form::open(['route' => ['posts.index'], 'method' => 'get']) }}
    <li>
      {{ Form::text('keyword', null) }}
      {{ Form::submit('検索') }}
    {{ Form::close() }}
    </li>

    </ul>

@endsection
