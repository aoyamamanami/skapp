<x-main-layout>
    <body>
        <x-slot name="head">
            <link rel="stylesheet" href="{{ asset('/css/top.css') }}">
        </x-slot>
        <div class="first-view" style="background-image: url({{ asset('images/paper.jpg') }});">
            <h1 class="abs-center">チーム開発会へようこそ！</h1>
        </div>
        <div>
            @foreach ($posts as $post)
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <p>
                        タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </p>
                    <p>カテゴリー：<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
                </div>
            @endforeach
        </div>
        <div>
            {{ $posts->links() }}
        </div>
    </body>
</x-main-layout>
