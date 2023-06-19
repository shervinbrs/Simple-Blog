@extends('panel.template')

@section('title')
    ویرایش ویجت
@endsection

@section('content')
<script src="{{URL::asset('/js/ckeditor')}}/ckeditor.js"></script>
      <div class="d100 center">
          <div class="card white">
              <div class="card-title">
                  ویرایش ویجت
              </div>
              <div class="card-body text-center">
                  <form method="POST" enctype="multipart/form-data">

                      <div class="d50 center">
                    <div class="input d50">
                        <span>عنوان ویجت :</span>
                        <input id="title" name="name" type="text" placeholder="عنوان ویجت" value="{{$widget['name']}}">
                    </div>
                    <div class="input d50">
                        <span>پیوند :</span>
                        <input id="slug" name="slug" type="text" placeholder="پیوند" value="{{$widget['slug']}}">
                    </div>
                    <div class="input d50">
                        <span>آیکون :</span>
                        <input id="slug" name="icon" type="text" placeholder="آیکون(boxicons)" value="{{$widget['icon']}}">
                    </div>
                    <div class="d75 center">
                        <div class="input d100">
                            <span>توضیحات متا : </span>
                            <input type="text" name="meta_desc" placeholder="ترجیحا بین 100 تا 160 کلمه" maxlength="200" value="{{$widget['meta_desc']}}">
                        </div>
                    </div>
                </div>
                    <div class="d75 center">
                        <input type="text" id="content" value="{{$widget['content']}}" hidden>
                        <textarea name="content" id="editor1">
                        </textarea>
                    </div>
                    <div class="d75 center">
                        <div class="input d25">
                            <span>نمایش : </span>
                            <input type="checkbox" name="publish" @if($widget['active']) checked @endif>
                        </div>
                    </div>
                    <div class="d75 center text-left" style="margin-top:20px;">
                        @csrf
                        <input type="submit" class="button button-success-light" value="ویرایش">
                    </div>
                    <script>
                        CKEDITOR.replace( 'editor1' ,{
                            language:'fa'
                        });
                        function convertToSlug(Text) {
                            return Text.replace(/[\s\\]/gi, '-').
                            replace(/-+/g, '-').
                            replace(/^-|-$/g, '');
                            }
                        $('#title').on('keyup',function()
                        {
                            $('#slug').val(convertToSlug($('#title').val()));
                        });
                        $('.upload-area').on('click',function()
                        {
                            document.getElementById('file').click();
                        })

                    </script>
                  </form>
              </div>
          </div>
      </div>
      <script>
              $('.dateinput').persianDatepicker({
    format: 'YYYY-MM-DD',
    calendar:{
        persian: {
            locale: 'en'
        }
    }
});
var editor = CKEDITOR.instances.editor1;
if (editor) {
  editor.setData($('#content').val());
}
      </script>
@endsection