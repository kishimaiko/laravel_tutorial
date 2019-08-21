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
        // $keyword = $request->keyword;

        // if($keyword == null){
        //     $posts = Post::all();
        // }else{
        //     $posts = Post::where('title', 'like', '%' . $keyword . '%')->get();
        // }
        
        // return view('posts.index', compact('posts'));

        // ↓日付絞り込み機能
        $keywords = $request->get('keywords');
        $fromDate = $request->get('fromDate');
        $toDate = $request->get('toDate');
        $dateCheck = $request->get('dateCheck');
        $keywords = preg_split("/[\s+]/", str_replace('　', ' ', $keywords));
        $posts = Post::where(function ($query) use($keywords, $fromDate, $toDate, $dateCheck) {
            foreach($keywords as $word){
                if($word){
                    $query->where('content', 'like', "%{$word}%");
                }
            }
            if($dateCheck){
                if($fromDate){
                    $query->whereDate('created_at','>=' ,$fromDate);
                }
                if($toDate){
                    $query->whereDate('created_at', '<=', $toDate);
                }
            }
        })->latest('created_at')->paginate(20);
        return view('posts.index', compact('posts','fromDate', 'toDate'));




    }
    // ログイン機能実装


    public function create()
    {
        $post = new Post();
        return view('posts.create',compact('post'));
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
        
        return redirect()->route('posts.show', [$post->id]);
         return redirect()->route('posts.index'); 
    }
    
}
