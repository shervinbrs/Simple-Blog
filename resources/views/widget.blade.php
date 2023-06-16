@extends('template')

@section('title')
{{$widget['name']}}
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