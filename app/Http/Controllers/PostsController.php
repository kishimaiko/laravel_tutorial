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

