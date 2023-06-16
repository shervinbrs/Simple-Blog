@extends('panel.template')


@section('title')
داشبورد
@endsection

@section('content')
    <div class="d100 box">
        <div class="box-information">
            <div class="box-icon">
                <i class="fa fa-newspaper"></i>
            </div>
            <div class="box-body">
                {{$information['posts']}} پست
            </div>
            <div class="box-title">تعداد پست ها</div>
        </div>
        <div class="box-information">
            <div class="box-icon">
                <i class="fa fa-list-alt"></i>
            </div>
            <div class="box-body">
                {{$information['categories']}} دسته بندی
            </div>
            <div class="box-title">تعداد دسته بندی ها</div>
        </div>
        <div class="box-information">
            <div class="box-icon">
                <i class="fa fa-users"></i>
            </div>
            <div class="box-body">
                {{$information['users']}} کاربر
            </div>
            <div class="box-title">تعداد کاربران</div>
        </div>
        <div class="box-information">
            <div class="box-icon">
                <i class="fa fa-message"></i>
            </div>
            <div class="box-body">
                {{$information['messages']}} پیام
            </div>
            <div class="box-title">تعداد پیام ها</div>
        </div>
    </div>
@endsection