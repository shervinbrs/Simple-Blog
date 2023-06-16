@extends('panel.template')


@section('title')
لیست دسته بندی ها
@endsection
@section('content')
<div class="d75 center">
    <div class="card white">
        <div class="card-title">
            دسته بندی ها
        </div>
        <div class="card-body">
            @if(count($categories) == 0)
            <div class="text-center">
                در حال حاضر دسته بندی وجود ندارد <a class="text-info" href="/admin/category/create">دسته بندی جدید</a> ایجاد کنید
            </div>
            @endif
            <table class="d100 text-right">
                <thead>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>پیوند</th>
                    <th></th>
                </thead>
                
                <tbody>
                    @foreach ($categories as $item)
                    <tr s-id="{{$item['id']}}">
                        <td>{{$item['id']}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['slug']}}</td>
                        <td class="text-center"><a href="/admin/category/edit/{{$item['id']}}" class="button button-information-light">ویرایش</a> <a href="/admin/category/delete/{{$item['id']}}" class="button button-danager-light" wire:click="$delete(5)">حذف</a></td>
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
        alertify.confirm('حذف دسته بندی', 'از حذف دسته بندی اطمینان دارید؟', function(){
            window.location = $(fbutton).attr('href');
             }
                , function(){ 
                    event.preventDefault();
                    }).set('labels',{ok:'حذف',cancel:'انصراف'});
    });
</script>
@endsection