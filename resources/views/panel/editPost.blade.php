@extends('panel.template')

@section('title')
    ویرایش پست
@endsection

@section('content')
<script src="{{URL::asset('/js/ckeditor')}}/ckeditor.js"></script>
      <div class="d100 center">
          <div class="card white">
              <div class="card-title">
                  ویرایش پست
              </div>
              <div class="card-body text-center">
                  <form method="POST" enctype="multipart/form-data">
                    <div class="d50 center">
                        <div class="input d50 text-center">
                            <div class="upload-area">
                                <img id="preimg" src="/storage/{{$post['thumbnail']}}">
                                <h3 class="">برای بارگزاری تصویر <a class="text-info">کلیک</a> کنید</h3>
                                <input type="file" id="file" name="thumbnail" hidden>
                            </div>
                        </div>
                        </div>
                      <div class="d50 center">
                    <div class="input d50">
                        <span>عنوان پست :</span>
                        <input id="title" name="title" type="text" placeholder="عنوان پست" value="{{$post['title']}}">
                    </div>
                    <div class="input d50">
                        <span>پیوند :</span>
                        <input id="slug" name="slug" type="text" placeholder="پیوند" value="{{$post['slug']}}">
                    </div>
                </div>
                <div class="d25 center inline">
                    <div class="input d100">
                        <span>تاریخ انتشار :</span>
                        <input name="publish_date" type="text" class="dateinput">
                    </div>
                </div>
                <div class="d25 center inline">
                    <div class="input d100">
                        <span>دسته بندی :</span>
                        <select name="category_id" class="d100">
                            @foreach ($categories as $item)
                            @if($item['id'] == $post['category_id'])
                            <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
                            @else
                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                    <div class="d75 center">
                        <input type="text" id="content" value="{{$post['content']}}" hidden>
                        <textarea class="texter" name="content" id="editor1" value="testtt">
                        </textarea>
                    </div>
                    <div class="d75 center">
                        <div class="input d25">
                            <span>نمایش : </span>
                            <input type="checkbox" name="publish" @if($post['publish']) checked @endif>
                        </div>
                    </div>
                    <div class="d75 center text-left" style="margin-top:20px;">
                        @csrf
                        <input type="submit" class="button button-success-light" value="ویرایش">
                    </div>
                    <script>
                                            document.getElementById('file').addEventListener("change", function(event) {
                        var file = event.target.files[0];
                        var reader = new FileReader();
                        reader.onload = function(e) {
                        document.getElementById('preimg').src = e.target.result;
                        // $('.upload-area h3').hide()
                        };
                            reader.readAsDataURL(file);
                        })
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
$('.dateinput').val('{{$post['publish_date']}}');
var editor = CKEDITOR.instances.editor1;
if (editor) {
  editor.setData($('#content').val());
}
      </script>
@endsection