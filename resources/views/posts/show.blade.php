<x-main-layout>
    <x-slot name="head">
        <link rel="stylesheet" href="{{ asset('/css/top.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Corben:700" rel="stylesheet">
    </x-slot>
        <h1>詳細画面</h1>
        <div>
            <p>タイトル：{{ $post->title }}</p>
            <p id="origin-text">本文：{{ $post->body }}</p>
            <p id="translated-text" class="text-hidden">英訳：{{ $post->translation }}</p>
            <p>カテゴリー：<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
        </div>
        <div>
            <button id="translate-btn">翻訳</button>
        </div>
        <div>
            @auth
            @if(auth()->user()->id === $post->user_id)
                <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
            @endif
            @endauth
            <a href="/">戻る</a>
        </div>
        <form  action="/comments/{{ $post->id }}" method="POST">
        @csrf
            <div>
                <h2>コメント一覧</h2>
                <textarea name="comment" rows="5" cols="100" placeholder="コメント送信"></textarea>
                <input type="submit" value="送信"/>
            </div>
        </form>
        <div>
            @foreach($comments as $comment)
                <p>{{ $comment -> body}} commentted by {{ $comment->user->name }}</p>
                @if(auth()->user()->id === $comment->user_id)
                    <form action="/comments/{{ $post->id }}/{{ $comment->id }}" id="form_{{ $comment->id }}" method="POST">
                    @csrf
                    @method("DELETE")
                        <button onclick="deleteComment({{ $comment->id }})">削除</button>
                    </form>
                    @endif
                <p>{{ $comment->created_at }}</p>
            @endforeach
        </div>
        
        <script>
            function deleteComment(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
         <script src="{{ asset('js/show.js') }}"></script>
</x-main-layout>