<x-main-layout>
    <body>
        <x-slot name="head">
            <link rel="stylesheet" href="{{ asset('/css/top.css') }}">
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
        <script src="{{ asset('js/top.js') }}"></script>
    </body>
</x-main-layout>
