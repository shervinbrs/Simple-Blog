@extends('template')

@section('title')
{{$post['title']}}
@endsection

@section('content')
<div class="article">
    <div class="article-information">
        <div class="article-image">
        <img src="{{URL::asset('/storage')}}/{{$post['thumbnail']}}" alt="عکس مطلب">
        </div>
        <h1>{{$post['title']}}</h1>
        <span>{{$post->category->name}}</span>   <span>{{$post['publish_date']}}</span>   <span>{{$post->user->name}}</span>
    </div>
    <p>{!! $post['content'] !!}</p>
</div>
@endsection