<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Http;


class PostController extends Controller
{
    public function index(Post $post)
    {
        $categories = Category::get();
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit(), 'categories' => $categories]);
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
    
    public function commentDelete(Post $post, Comment $comment)
    {
        $comment->delete();
        return redirect('/posts/'.$post->id);
    }
    
}
