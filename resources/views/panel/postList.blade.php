@extends('panel.template')


@section('title')
لیست پست ها
@endsection
@section('content')
<div class="d100 center">
    <div class="card white">
        <div class="card-title">
            پست ها
        </div>
        <div class="card-body">
            @if(count($posts) == 0)
            <div class="text-center">
                در حال حاضر پستی وجود ندارد <a class="text-info" href="/admin/post/create">پست جدید</a> ایجاد کنید
            </div>
            @endif
            <table class="d100 text-right">
                <thead>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>پیوند</th>
                    <th>نویسنده</th>
                    <th>دسته بندی</th>
                    <th>تاریخ</th>
                    <th>نمایش</th>
                    <th></th>
                </thead>
                
                <tbody>
                    @foreach ($posts as $item)
                    <tr s-id="{{$item['id']}}">
                        <td>{{$item['id']}}</td>
                        <td>{{$item['title']}}</td>
                        <td>{{$item['slug']}}</td>
                        <td>@if ($item->user()->exists())
                            {{$item->user->name}}
                        @else
                            (کاربر حذف شده)
                        @endif</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item['publish_date']}}</td>
                        <td>{{$item->publish()}}</td>
                        <td class="text-center"><a href="/admin/post/edit/{{$item['id']}}" class="button button-information-light">ویرایش</a> <a href="/admin/post/delete/{{$item['id']}}" class="button button-danager-light" wire:click="$delete(5)">حذف</a></td>
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
        alertify.confirm('حذف پست', 'از حذف پست اطمینان دارید؟', function(){
            window.location = $(fbutton).attr('href');
             }
                , function(){ 
                    event.preventDefault();
                    }).set('labels',{ok:'حذف',cancel:'انصراف'});
    });
</script>
@endsection