<x-main-layout>
    <x-slot name="head">
        <link rel="stylesheet" href="{{ asset('/css/top.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/create.css') }}">
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
    <div class="blog-container create-container">
        <div class="create-inner">
            
            <form action="/posts" method="POST">
                @csrf
                
                @error('post.title')
                    <p>{{ $message }}</p>
                @enderror
                
                @error('post.body')
                    <p>{{ $message }}</p>
                @enderror
            
                <div class="input-row name-input flex">
                    <h2>タイトル</h2>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                </div>
                <div class="input-row body-input flex">
                    <h2>本文</h2>
                    <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                </div>
                <div class="input-row category-input flex">
                    <h2>カテゴリー</h2>
                    <select name="post[category_id]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="submit-btn">
                    <button type="submit">作成する</button>
                </div>
            </form>
            <div class="back-btn">
                <a href="/">トップへ戻る</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/top.js') }}"></script>
</x-main-layout>