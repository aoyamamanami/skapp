<x-main-layout>
    <x-slot name="head">
        <link rel="stylesheet" href="{{ asset('/css/top.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Corben:700" rel="stylesheet">
    </x-slot>
    <body>
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
        <div class="blog-container">
            <div class="bc-inner">
                <h2>-Post List-</h2>
                <div class="top-navigation flex">
                    @auth
                        <a class="to-create" href='/create'>新規投稿</a>
                    @else
                        <a class="to-create" href='/login'>新規投稿</a>
                    @endauth
                    <div class="category-nav">
                        <ul class="b-flex">
                            @foreach($categories as $category)
                                <li><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="posts flex">
                    @foreach ($posts as $post)
                        <div class="post-content">
                            <a href="/posts/{{ $post->id }}">
                                <div class="post-img-box">
                                    <img class="post-img" src="{{ asset('images/paper.jpg') }}">
                                </div>
                                <div class="post-text">
                                    <h5 class="post-title">{{ $post->title }}</h5>
                                    <p class="post-body">{{ $post->body }}</p>
                                </div>
                            </a>
                            <div class="post-bottom">
                                @auth
                                <!-- Post.phpに作ったisLikedByメソッドをここで使用 -->
                                @if (!$post->isLikedBy(Auth::user()))
                                    <span class="likes">
                                        <i class="fas fa-heart like-toggle" data-post-id="{{ $post->id }}"></i>
                                    <span class="like-counter">{{$post->likes_count}}</span>
                                    </span><!-- /.likes -->
                                @else
                                    <span class="likes">
                                        <i class="fas fa-heart heart like-toggle liked" data-post-id="{{ $post->id }}"></i>
                                    <span class="like-counter">{{$post->likes_count}}</span>
                                    </span><!-- /.likes -->
                                @endif
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
        <script src="{{ asset('js/top.js') }}"></script>
    </body>
</x-main-layout>