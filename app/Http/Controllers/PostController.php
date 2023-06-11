<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Http;


class PostController extends Controller
{
    public function index(Post $post)
    {
        $user = auth()->user();
        $posts = Post::withCount('likes')->orderByDesc('updated_at')->get();
        $categories = Category::get();
        return view('posts/index')->with(['posts' => $posts, 'categories' => $categories]);
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->get();
        return view('posts/show')->with(['post' => $post, 'comments' => $comments]);
    }

    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);
    }

    public function store(Post $post, Request $request)
    {
        $input = $request['post'];
        $sentence = $input["body"];
        
        
        $key = env('DEEPL_KEY');
        
        

        $response = Http::get(
            'https://api-free.deepl.com/v2/translate',
            [
                'auth_key' => $key,
                'target_lang' => 'EN',
                'source_lang' => 'JA',
                'text' => $sentence,
            ]
            );
            
            $translation = $response->json('translations')[0]['text'];
            $input["translation"] = $translation;
            $post->fill($input)->save();
            return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }

    public function comment(Request $request, Comment $comment, Post $post)
    {
        $comment->body = $request['comment'];
        $comment->post_id = $post->id;
        $comment->user_id = Auth::id();
        $comment->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function like(Request $request)
    {
        $user_id = Auth::user()->id; // ログインしているユーザーのidを取得
        $post_id = $request->post_id; // 投稿のidを取得
    
        // すでにいいねがされているか判定するためにlikesテーブルから1件取得
        $already_liked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first(); 
    
        if (!$already_liked) { 
            $like = new Like; // Likeクラスのインスタンスを作成
            $like->post_id = $post_id;
            $like->user_id = $user_id;
            $like->save();
        } else {
            // 既にいいねしてたらdelete 
            Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        }
        // 投稿のいいね数を取得
        $post_likes_count = Post::withCount('likes')->findOrFail($post_id)->likes_count;
        $param = [
            'post_likes_count' => $post_likes_count,
        ];
        return response()->json($param); // JSONデータをjQueryに返す

    public function commentDelete(Post $post, Comment $comment)
    {
        $comment->delete();
        return redirect('/posts/'.$post->id);

    }
    
}
