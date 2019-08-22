@extends('layouts.app')

@section('app')


    <div class="container-fluid">
    <div class="buttan_add">
        <div class="p-3 mb-2 bg-info text-white">


                    <h1>blog.edit</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
                    {{ Form::open(['route' => ['posts.update', $post->id], 'method' => 'put']) }}
                    <div>
                        {{ Form::text('title', $post->title) }}
                    </div>

                    <div>
                        {{ Form::textarea('content', $post->content) }}
                    </div>

                <button type="button" class="btn btn-outline-info">
                {{ Form::submit('update') }}
                {{ Form::close() }}
                </div>


                @if($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif 
                @if($errors->has('content'))
                <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif

    </div>

    <div class="container-fluid">
                  <div class="p-3 mb-2 bg-info text-white">
                        <div class="button_add">
                              <div class=float-right>
                                    <p>tutorial_lesson</p>
                              </div>
                        </div>
                  </div>
      </div>

@endsection
