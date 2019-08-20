@extends('layouts.app')

@section('app')

<div class="container">
    <div class="p-3 mb-2 bg-info text-white">
        <h1>blog list</h1>
    </div>
    <h2>タイトル　日付<h2>

    <!-- <div class="line">　 -->
        <ul>
        @foreach ($posts as $post)
                <li>
                    {{ link_to_route('posts.show', $post->title, [$post->id]) }}
                    <!-- <button type="button" class="btn btn-outline-info"> -->
                    {{ link_to_route('posts.edit', '[Edit]', [$post->id]) }}
                    <!-- </div> -->
                <!-- <button type="button" class="btn btn-outline-info"> -->
                    {{ Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete', 'name' => 'delete_' . $post->id, 'style' => 'display:inline;']) }}
                        <a href="javascript:document.{{ 'delete_' . $post->id }}.submit()" onclick="return confirm('削除しますか？');">[Delete]</a>
                    {{ Form::close() }}
                    <!-- </div> -->
                </li>
        @endforeach
            </ul>
    <!-- </div> -->

            <div button type="button" class="btn btn-outline-info">
                {{ link_to_route('posts.create', '[new post]') }}   
            </div>
            <div button type="button" class="btn btn-outline-info">
                {{ link_to_route('posts.index', '[back]') }}
            </div>

    </div>



        @if (Session::has('flash_message'))
                {{ Session::get('flash_message') }}
        @endif

    <!-- 　@if(Session::has('message')) -->
       <!-- <div class="alert alert-success"> -->
          <!-- {{ session('message') }} -->
      <!-- </div> -->
    <!-- 　@endif -->

     <!-- \Session::flash('flash_message', '記事を更新しました。'); -->


        <!-- {{ Form::open(['route' => ['posts.index'], 'method' => 'get']) }}
    <li>
      {{ Form::text('keyword', null) }}
      {{ Form::submit('検索') }}
    {{ Form::close() }}
    </li> -->
    <div class="container">
    <!-- ↓日付絞り込み機能 -->
    {{ Form::open(['route'=> 'posts.index', 'method' => 'get']) }}
        <div class="form-inline">
              <span>日付絞り込み</span>
                {{ Form::checkbox('dateCheck', 'true', false, ['id'=> 'date_check']) }}
               {{ Form::date('fromDate', $fromDate, ['class' => 'form-control','placeholder' => 'YYYY/MM/DD']) }}
                  <span>〜</span>  {{ Form::date('toDate', $toDate, ['class' => 'form-control','placeholder' => 'YYYY/MM/DD']) }}
                {{ Form::text('keywords', '', ['type' => 'search', 'class' => 'form-control', 'placeholder' => 'タイトル・内容']) }}
                {{ Form::submit('search', ['class' => 'btn']) }}
            </div>
        </div>
{{ Form::close() }}
<div class="container">
<div class="paginate">
{{ $posts->links() }}
</div>
</div>



@endsection
