@extends('panel.template')

@section('title')
تنظیمات
@endsection


@section('content')
<div class="d75 center">
    <div class="card white d100">
        <div class="card-title">
            تنظیمات
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="d100">
                <div class="input d50">
                    <span>عنوان وبلاگ : </span>
                    <input type="text" placeholder="عنوان" name="title" value="{{$setting['title']}}">
                </div>
                <div class="input d25">
                    <span>لوگو : </span>
                    <input type="file" placeholder="لوگو" name="logo" value="{{$setting['title']}}">
                </div>
                <div class="input d25">
                    <span>فاوآیکون : </span>
                    <input type="file" placeholder="فاوآیکون" name="favicon" value="{{$setting['title']}}">
                </div>
            </div>
            <div class="text-left">
                <input type="submit" value="ذخیره" class="button button-success-light">
            </div>
            @csrf
            </form>
        </div>
    </div>
</div>
@endsection