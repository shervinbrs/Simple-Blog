@extends('panel.template')


@section('title')
پیام ها
@endsection
@section('content')
<div class="d75 center">
    <div class="card white">
        <div class="card-title">
            پیام ها
        </div>
        <div class="card-body">
            @if(count($messages) == 0)
            <div class="text-center">
                در حال حاضر پیامی وجود ندارد
            </div>
            @endif
            <table class="d100 text-right">
                <thead>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>تاریخ</th>
                    <th>وضعیت</th>
                    <th></th>
                </thead>
                
                <tbody>
                    @foreach ($messages as $item)
                    <tr s-id="{{$item['id']}}">
                        <td>{{$item['id']}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['email']}}</td>
                        <td>{{$item['date']}}</td>
                        <td>
                            @switch($item['seen'])
                                @case(0)
                                    خوانده نشده
                                    @break
                                @case(1)
                                    خوانده شده
                                    @break
                                @default
                                    
                            @endswitch
                        </td>
                        <td class="text-center"><a href="/admin/message/show/{{$item['id']}}" class="button button-information-light">مشاهده</a> <a href="/admin/message/delete/{{$item['id']}}" class="button button-danager-light" wire:click="$delete(5)">حذف</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $('.button-danager-light').on('click',function(event)
    {
        let fbutton = this;
        event.preventDefault();
        alertify.confirm('حذف پیام', 'از حذف پیام اطمینان دارید؟', function(){
            window.location = $(fbutton).attr('href');
             }
                , function(){ 
                    event.preventDefault();
                    }).set('labels',{ok:'حذف',cancel:'انصراف'});
    });
</script>
@endsection