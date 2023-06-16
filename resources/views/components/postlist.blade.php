
<div class="posts">
    @foreach ($posts as $post)
    <div class="post">
        <a href="/post/{{$post['slug']}}">
        <img src="{{URL::asset('/storage')}}/{{$post['thumbnail']}}" alt="{{$post['title']}}">
        <h2>{{$post['title']}}</h2>
        <p>{{Str::words(strip_tags($post['content']),40)}}</p>
    <div class="author">
        <span>{{$post->category->name}}</span>
        <span>{{$post->user->name}}</span>
    </div>  
    </div>
</a>
    @endforeach
</div>

<div class="paginate">
    {{-- <a class="active-page" href="">1</a> --}}
    @if ($posts->lastPage() != 1)
    @for ($i = 1; $i <= $posts->lastPage();$i++)
    @if ($i == $posts->currentPage())
    <a class="active-page" href="?page={{$i}}">{{$i}}</a>
        @else
        <a href="?page={{$i}}">{{$i}}</a>
    @endif
    @endfor
    @endif
</div>