@extends('layouts.app')
@section('app')

    <div class="container">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
    </div>
            <!-- {{ Form::submit('back') }}
            {{ Form::close() }} -->

      <div class="container">
            <div class="button_add2">
                    <div class="float-left">
                              <button type="button" class="btn btn-outline-info">
                                    {{ link_to_route('posts.edit', '[Edit]', [$post->id]) }}
                              </div>
                              <button type="button" class="btn btn-outline-info">
                                    {{ Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete', 'name' => 'delete_' . $post->id, 'style' => 'display:inline;']) }}
                                    <a href="javascript:document.{{ 'delete_' . $post->id }}.submit()" onclick="return confirm('削除しますか？');">[Delete]</a>
                              </div>
                                    <button type="button" class="btn btn-outline-info"> 
                                    {{ link_to_route('posts.index', '[Back]') }}
                        </div>
                  </div>
            </div>
      </div>
  
  
      <div class="container">
                  <div class="p-3 mb-2 bg-info text-white">
                        <div class="button_add">
                              <div class=float-right>
                                    <p>tutorial_lesson</p>
                              </div>
                        </div>
                  </div>
      </div>


      
@endsection
