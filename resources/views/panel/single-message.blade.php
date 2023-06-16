@extends('panel.template')

@section('title')
    مشاهده پیام {{$message->name}}
@endsection

@section('content')
    <div class="d75 center">
        <div class="card white">
            <div class="card-title">
                مشاهده پیام
            </div>
            <div class="card-body">
                <div class="d100 text-center">
                    <div class="d50 inline">
                        <span>شناسه : </span>{{$message->id}}
                        </div>
                    <div class="d50 inline">
                    <span>نام : </span>{{$message->name}}
                    </div>
                    <div class="d50 inline">
                        <span>ایمیل : </span>{{$message->email}}
                        </div>
                        <div class="d50 inline">
                            <span>تاریخ : </span>{{$message->date}}
                            </div>
                </div>
                <div class="d100"> 
                    <h4>&nbsp</h4>
                    <p>
                        {{$message->message}}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection