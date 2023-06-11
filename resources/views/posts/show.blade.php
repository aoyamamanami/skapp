<x-main-layout>
    <x-slot name="head">
        <link rel="stylesheet" href="{{ asset('/css/top.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Corben:700" rel="stylesheet">
    </x-slot>

        <div class="first-view" style="background-image: url({{ asset('images/space.jpg') }});">
            <div class="fv-inner">
                <h1 class="abs-center back-title">Team Development</h1>
                <h1 class="title abs-center">
                  <span>T</span>
                  <span>e</span>
                  <span>a</span>
                  <span>m</span>
                  <span>　</span>
                  <span>D</span>
                  <span>e</span>
                  <span>v</span>
                  <span>e</span>
                  <span>l</span>
                  <span>o</span>
                  <span>p</span>
                  <span>m</span>
                  <span>e</span>
                  <span>n</span>
                  <span>t</span>
                </h1>
            </div>

        </div>

        <div class="show-content">
            <h1>{{ $post->title }}<span>{{ $post->category->name }}</span></h1>
            <div class="show-text">
                <p id="origin-text">【原文】<br>{{ $post->body }}</p>
                <p id="translated-text" class="text-hidden">【翻訳文】<br>{{ $post->translation }}</p>

            </div>
            <div class="btn-elem">
                
            </div>
            <div class="btn-flex">
                <div class="btn-flex-inner flex">
                    
            @auth
                @if(auth()->user()->id === $post->user_id)
                    <a href="/posts/{{ $post->id }}/edit">編集</a>
                @endif
            @endauth
                    <button id="translate-btn">翻訳</button>
                    @auth
                        @if(auth()->user()->id === $post->user_id)
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn" type="button" onclick="deletePost({{ $post->id }})">削除</button> 
                        </form>
                        @endif
                    @endauth
                    <a href="/">戻る</a>
                </div>
            </div>
            <form  action="/comments/{{ $post->id }}" method="POST">
            @csrf
                <div class="comment-block">
                    <h2>コメント一覧</h2>
                    @error('comment')
                        <p>{{ $message }}</p>
                    @enderror
                    <textarea name="comment" rows="5" cols="100" placeholder="コメント送信"></textarea>
                    <div class="submit-elem">
                        <input type="submit" value="送信"/>
                    </div>
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
        </div>
        
        
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
            function deleteComment(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
         <script src="{{ asset('js/show.js') }}"></script>
         <script src="{{ asset('js/top.js') }}"></script>
</x-main-layout>