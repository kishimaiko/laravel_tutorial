@extends('layouts.app')
@section('app')


            <div class="p-3 mb-2 bg-info text-white">
                <h1>NewBlog</h1>
            </div>

        <div class="container">
                    {{ Form::open(['route'=>'posts.store']) }}
                    {{ csrf_field() }}
        </div>
        <div class="container">
                    {{ Form::text('title', $post->title) }}
        </div>
        <div class="container">
                    {{ Form::textarea('content', $post->content) }}
        </div>
    <div class="container">
            <div class="row">
                <div class="float-left">
                    <div class="row">
                        <div class="button_add">
                                <button type="button" class="btn btn-outline-info">
                                    {{ Form::submit('create') }}
                                    {{ Form::close() }}
                                <div>
                                <button type="button" class="btn btn-outline-info">
                                    {{ link_to_route('posts.index', '[Back]') }}
                                </div>
                        </div>
                    </div  >
                </div>
            </div>
        </div>
@endsection
    </div>

                @if($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                @if($errors->has('content'))
                <span class="text-danger">{{ $errors->first('content') }}</span>
@endif