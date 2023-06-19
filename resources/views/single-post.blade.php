@extends('template')

@section('title')
{{$post['title']}}
@endsection

@section('header')
<meta name="description" content="{{$post['meta_desc']}}">
<meta property="og:title" content="{{$post['title']}}" />
<meta property="og:url" content="{{URL::asset('/post/')}}/{{$post['slug']}}" />
<meta property="og:image" content="{{URL::asset('/storage/')}}/{{$post['thumbnail']}}" />
<meta property="og:type" content="article" />
<meta property="og:description" content="{{$post['meta_desc']}}" />
<meta property="og:locale" content="fa_IR" />
<meta name="robots" content="index, follow"/>
@endsection

@section('content')
<div class="article">
    <div class="article-information">
        <div class="article-image">
        <img src="{{URL::asset('/storage')}}/{{$post['thumbnail']}}" alt="{{$post['title']}}">
        </div>
        <h1>{{$post['title']}}</h1>
        <span>{{$post->category->name}}</span>   <span>{{$post['publish_date']}}</span>   <span>{{$post->user->name}}</span>
    </div>
    <p>{!! $post['content'] !!}</p>
</div>
@endsection