<x-main-layout>
    <x-slot name="head">
        <link rel="stylesheet" href="{{ asset('/css/top.css') }}">
    </x-slot>
    <body>
        <div class="first-view" style="background-image: url({{ asset('images/paper.jpg') }});">
            <h1 class="abs-center">チーム開発会へようこそ！</h1>
        </div>
        <div class="blog-container">
            <div class="bc-inner">
                <h2>-Post List-</h2>
                <div class="top-navigation flex">
                    <a class="to-create" href='/posts/create'>新規投稿</a>
                    <div class="category-nav">
                        <ul class="b-flex">
                            @foreach($categories as $category)
                                <li><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                @foreach ($posts as $post)
                    <a href="/posts/{{ $post->id }}">
                    <div class="blog-content">
                        <p>
                            タイトル：{{ $post->title }}
                        </p>
                    </div>
                    </a>
                @endforeach
                <div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </body>
</x-main-layout>