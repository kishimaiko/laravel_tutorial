<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\validationPost;

class PostsController extends Controller
{
    // public function index()
    // {
    //     $posts = Post::all();

    //     return view('posts.index', compact('posts'));
    // }

// 検索処理の実装

public function index(Request $request)
    {
        $keyword = $request->keyword;

        if($keyword == null){
            $posts = Post::all();
        }else{
            $posts = Post::where('title', 'like', '%' . $keyword . '%')->get();
        }
        
        return view('posts.index', compact('posts'));
    }
    // ログイン機能実装


   public function create()
    {
        $post = new Post();

        return view('posts.create', compact('post'));
    }

   public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(validationPost $request, Post $post)
    {
        $post->update($request->all());

        return redirect()->route('posts.index');
    }
   public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
       {
         return view('posts.show', compact('post','comments'));
    }

    public function store(validationPost $request)
    {
        $post = Post::create($request->all());
        $post ->save();
        $request->session()->flash('message','記事の登録が完了しました。');
        
        // return redirect()->route('posts.show',[$post->id]); flashメッセージ未確認保留コメントアウト
         return redirect()->route('posts.index'); 
    }
    
}

// {{ Form::open(['route'=> 'posts.index', 'method' => 'get']) }}
//             <div class="form-inline">
//               <span>日付絞り込み</span>
//                 {{ Form::checkbox('dateCheck', 'true', false, ['id'=> 'date_check']) }}
//                {{ Form::date('fromDate', $fromDate, ['class' => 'form-control','placeholder' => 'YYYY/MM/DD']) }}
//                   <span>〜</span>  {{ Form::date('toDate', $toDate, ['class' => 'form-control','placeholder' => 'YYYY/MM/DD']) }}
//                 {{ Form::text('keywords', '', ['type' => 'search', 'class' => 'form-control', 'placeholder' => 'タイトル・内容']) }}
//                 {{ Form::submit('search', ['class' => 'btn']) }}
//             </div>
// {{ Form::close() }}
