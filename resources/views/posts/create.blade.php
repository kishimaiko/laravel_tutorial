@extends('layouts.app')
@section('app')

        <div class="container-fluid">
            <div class="p-3 mb-2 bg-info text-white">
                <h1>NewBlog</h1>
            </div>
        </div>
<div class="container_add2">
        <div class="container-fluid">
                    {{ Form::open(['route'=>'posts.store']) }}
                    {{ csrf_field() }}
        </div>

        <div class="container-fluid">
                    {{ Form::text('title', $post->title) }}
        </div>

        <div class="container-fluid">
                    {{ Form::textarea('content', $post->content) }}
        </div>
        </div>

    <div class="container-fluid">
                <div class="float-left">
                        <div class="button_add">
                                <button type="button" class="btn btn-outline-info">
                                    {{ Form::submit('create') }}
                                    {{ Form::close() }}
                                <div>
                                <button type="button" class="btn btn-outline-info">
                                    {{ Form::submit('back') }}
                                    {{ Form::close() }}
                                </div>
                        </div>
                </div>
        </div>

    {{ link_to_route('posts.index','[Back]') }}

        <div class="button_add3">
            @if($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
            @if($errors->has('content'))
                <span class="text-danger">{{ $errors->first('content') }}</span>
            @endif

            @if(Session::has('flash_message'))
                {{ Session::get('flash_message') }}
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









