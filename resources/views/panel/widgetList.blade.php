@extends('panel.template')


@section('title')
لیست ویجت ها
@endsection
@section('content')
<div class="d75 center">
    <div class="card white">
        <div class="card-title">
            ویجت ها
        </div>
        <div class="card-body">
            <table class="d100 text-right">
                <thead>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>پیوند</th>
                    <th>وضعیت</th>
                    <th></th>
                </thead>
                
                <tbody>
                    @foreach ($widgets as $item)
                    <tr s-id="{{$item['id']}}">
                        <td>{{$item['id']}}</td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['slug']}}</td>
                        <td>
                            @if($item['active'])
                            فعال
                            @else
                            غیرفعال
                            @endif
                        </td>
                        <td class="text-center"><a href="/admin/widget/edit/{{$item['id']}}" class="button button-information-light">ویرایش</a> <a href="/admin/widget/delete/{{$item['id']}}" class="button button-danager-light" wire:click="$delete(5)">حذف</a></td>
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
        alertify.confirm('حذف ویجت', 'از حذف ویجت اطمینان دارید؟', function(){
            window.location = $(fbutton).attr('href');
             }
                , function(){ 
                    event.preventDefault();
                    }).set('labels',{ok:'حذف',cancel:'انصراف'});
    });
</script>
@endsection