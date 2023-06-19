@extends('template')

@section('title')
{{$widget['name']}}
@endsection

@section('header')
<meta name="description" content="{{$widget['meta_desc']}}">
<meta property="og:title" content="{{$widget['name']}}" />
<meta property="og:url" content="{{URL::asset('/w/')}}/{{$widget['slug']}}" />
<meta property="og:description" content="{{$widget['meta_desc']}}" />
<meta property="og:locale" content="fa_IR" />
<meta name="robots" content="index, follow"/>
@endsection


@section('content')
<div class="article">
    <div class="article-information">
        {{-- <div class="article-image">
        <img src="{{URL::asset('/storage')}}/{{$post['thumbnail']}}" alt="عکس مطلب">
        </div> --}}
        <h1>{{$widget['name']}}</h1>
        {{-- <span>{{$post->category->name}}</span>   <span>{{$post['publish_date']}}</span>   <span>{{$post->user->name}}</span> --}}
    </div>
    <p>{!! $widget['content'] !!}</p>
</div>
@endsection