@extends('panel.template')


@section('title')
ویرایش کاربر
@endsection

@section('content')
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
            ویرایش کاربر
        </div>
        <div class="card-body text-center">
            <form method="POST">
              <div class="input d25 block center">
                  <span>نام کاربر :</span>
                  <input type="text" name="name" placeholder="نام کاربر" value="{{$user['name']}}">
              </div>
              <div class="input d25 block center">
                  <span>ایمیل :</span>
                  <input type="email" name="email" placeholder="ایمیل" value="{{$user['email']}}">
              </div>
              <div class="input d25 block center">
                <span>رمز عبور :</span>
                <input type="text" name="password" placeholder="رمز عبور">
            </div>
              <div class="d25 center">
                  <div class="input d25 block center">
                      @csrf
                  <input type="submit" class="button button-success-light" value="ویرایش">
                  </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection