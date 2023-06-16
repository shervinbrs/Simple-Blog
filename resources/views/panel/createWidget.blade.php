@extends('panel.template')

@section('title')
    ویجت جدید
@endsection

@section('content')
<script src="{{URL::asset('/js/ckeditor')}}/ckeditor.js"></script>
      <div class="d100 center">
          <div class="card white">
              <div class="card-title">
                  ویجت جدید
              </div>
              <div class="card-body text-center">
                  <form method="POST" enctype="multipart/form-data">

                      <div class="d50 center">
                    <div class="input d50">
                        <span>عنوان ویجت :</span>
                        <input id="title" name="name" type="text" placeholder="عنوان ویجت">
                    </div>
                    <div class="input d50">
                        <span>پیوند :</span>
                        <input id="slug" name="slug" type="text" placeholder="پیوند">
                    </div>
                    <div class="input d50">
                        <span>آیکون :</span>
                        <input id="slug" name="icon" type="text" placeholder="آیکون(boxicons)">
                    </div>
                </div>
                    <div class="d75 center">
                        <textarea name="content" id="editor1">
                        </textarea>
                    </div>
                    <div class="d75 center">
                        <div class="input d25">
                            <span>نمایش : </span>
                            <input type="checkbox" name="publish" checked>
                        </div>
                    </div>
                    <div class="d75 center text-left" style="margin-top:20px;">
                        @csrf
                        <input type="submit" class="button button-success-light" value="افزودن">
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
      </script>
@endsection