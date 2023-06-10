<x-main-layout>
    <x-slot name="head">
        <link rel="stylesheet" href="{{ asset('/css/top.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/create.css') }}">
    </x-slot>
    <div class="first-view" style="background-image: url({{ asset('images/paper.jpg') }});">
        <h1 class="abs-center">投稿作成！！！</h1>
    </div>
    <div class="blog-container create-container">
        <div class="create-inner">
            <form action="/posts" method="POST">
                @csrf
                <div class="input-row name-input flex">
                    <h2>タイトル</h2>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                </div>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                <div class="input-row body-input flex">
                    <h2>本文</h2>
                    <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                </div>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
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
</x-main-layout>