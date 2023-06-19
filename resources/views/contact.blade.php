@extends('template')

@section('title')
تماس با من
@endsection


@section('content')
<div class="contact">
    <div class="contact-title">
        <h1>تماس با من</h1>
        @if($errors->any())
        <div style="width:100%;background:#ff0000cc;color:white;border-radius:5px;padding:10px 0px;">
            {{$errors->first()}}
        </div>
        @endif
        @if(session('success'))
        <div style="width:100%;background:green;color:white;border-radius:5px;padding:10px 0px;">
            {{session('success')}}
        </div>
        @endif
    </div>
    <div class="contact-inputs">
    <form method="POST">
        <span>نام شما : </span>
        <input type="text" name="name" placeholder="نام شما" required maxlength="30">
        <span>ایمیل شما : </span>
        <input type="email" name="email" placeholder="پست الکترونیک" required maxlength="100">
        <span>پیام شما : </span>
        <textarea name="message" id="" cols="30" rows="10" placeholder="پیام شما" required maxlength="1000"></textarea>
        @csrf
        <input type="submit" class="button button-success" value="ارسال">
    </form>
</div>
</div>
@endsection