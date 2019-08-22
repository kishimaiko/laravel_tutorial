@extends('layouts.app')

@section('app')

    <div class="container-fluid">
        <div class="p-3 mb-2 bg-info text-white">
              <h1>blog list</h1>
        </div>
    </div>

    <div class="container">
            <div class="table-responsive">
                    <table class="table">
                            <tr>
                                    <th>タイトル</th><<th>編集</th><th>消去</th>
                            </tr>
                            @foreach ($posts as $post)
                            <tr>
                                        <td> {{ link_to_route('posts.show', $post->title, [$post->id]) }}</td> 
                                        <td> <span class="badge badge-secondary">
                                                {{ link_to_route('posts.edit', '[Edit]', [$post->id]) }}
                                                </span>
                                        </td> 
                                        <td><span class="badge badge-danger">
                                                {{ Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete', 'name' => 'delete_' . $post->id, 'style' => 'display:inline;']) }}
                                                    <a href="javascript:document.{{ 'delete_' . $post->id }}.submit()" onclick="return confirm('削除しますか？');">[Delete]</a>
                                                {{ Form::close() }}
                                                </span>
                                        </td> 
                                </tr>
                            @endforeach
                    </table>
            </div>
    </div>
                                 
                           
 

            <div class="container-fluid">
                    <div class="button_add">
                            <div class="float-left">
                                <button type="button" class="btn btn-outline-info">
                                    {{ link_to_route('posts.create', '[new post]') }}   
                                </div>
                                <button type="button" class="btn btn-outline-info">
                                    {{ link_to_route('posts.index', '[back]') }}
                                </div>
                            </div>
                    </div>
            </div> 

        



            @if (Session::has('flash_message'))
                        {{ Session::get('flash_message') }}
                @endif

            　@if(Session::has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            　@endif

            <!-- \Session::flash('flash_message', '記事を更新しました。'); -->


                <!-- {{ Form::open(['route' => ['posts.index'], 'method' => 'get']) }}
            <li>
            {{ Form::text('keyword', null) }}
            {{ Form::submit('検索') }}
            {{ Form::close() }}
            </li> -->


        <div class="container-fluid">
            <div class="p-3 mb-2 bg-info text-white">
                         <div class="button_add"> 
                                    <!-- ↓日付絞り込み機能 -->
                                    <div class="form-inline">
                                    {{ Form::open(['route'=> 'posts.index', 'method' => 'get']) }}
                                    <span>日付絞り込み</span>
                                        {{ Form::checkbox('dateCheck', 'true', false, ['id'=> 'date_check']) }}
                                    {{ Form::date('fromDate', $fromDate, ['class' => 'form-control','placeholder' => 'YYYY/MM/DD']) }}
                                        <span>〜</span>  {{ Form::date('toDate', $toDate, ['class' => 'form-control','placeholder' => 'YYYY/MM/DD']) }}
                                        {{ Form::text('keywords', '', ['type' => 'search', 'class' => 'form-control', 'placeholder' => 'タイトル・内容']) }}
                                        {{ Form::submit('search', ['class' => 'btn']) }}
                                    {{ Form::close() }}
                                    </div>
                            </div>
                                    <div class="paginate">
                                                {{ $posts->links() }}
                                    </div>
                </div>
        </div>




@endsection
