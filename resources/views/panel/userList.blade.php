@extends('panel.template')


@section('title')
لیست کاربران
@endsection
@section('content')
<div class="d75 center">
    <div class="card white">
        <div class="card-title">
            کاربران
        </div>
        <div class="card-body">
            <table class="d100 text-right">
                <thead>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th></th>
                </thead>
                
                <tbody>
                    @foreach ($users as $item)
                    <tr s-id="{{$item['id']}}">
                        <td>{{$item['id']}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['email']}}</td>
                        <td class="text-center"><a href="/admin/user/edit/{{$item['id']}}" class="button button-information-light">ویرایش</a> @if($item['id'] != Auth::user()['id'])<a href="/admin/user/delete/{{$item['id']}}" class="button button-danager-light" wire:click="$delete(5)">حذف</a>@endif</td>
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
        alertify.confirm('حذف کاربر', 'از حذف کاربر اطمینان دارید؟ در صورت حذف کاربر پست های مربوطه غیرفعال خواهند شد', function(){
            window.location = $(fbutton).attr('href');
             }
                , function(){ 
                    event.preventDefault();
                    }).set('labels',{ok:'حذف',cancel:'انصراف'});
    });
</script>
@endsection