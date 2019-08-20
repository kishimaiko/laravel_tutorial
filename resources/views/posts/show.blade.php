@extends('layouts.app')
@section('app')

    <div class="container">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
    </div>
            <!-- {{ Form::submit('back') }}
            {{ Form::close() }} -->

      <div class="container">
            <div class="row">
                <div class="float-left">
                      <div class="row">
                          <div class="button_add">
                              <div class="row">
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
                </div>
          </div>
      </div>


      <div class="p-3 mb-2 bg-info text-white">
        <div class="button_add">
        </div>
      </div>

      
@endsection
