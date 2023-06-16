@extends('panel.template')

@section('title')
    پست جدید
@endsection

@section('content')
<script src="{{URL::asset('/js/ckeditor')}}/ckeditor.js"></script>
      <div class="d100 center">
          <div class="card white">
              <div class="card-title">
                  پست جدید
              </div>
              <div class="card-body text-center">
                  <form method="POST" enctype="multipart/form-data">
                      <div class="d50 center">
                          <div class="input d50 text-center">
                              <div class="upload-area">
                                  <img id="preimg">
                                  <h3 class="">برای بارگزاری تصویر <a class="text-info">کلیک</a> کنید</h3>
                                  <input type="file" id="file" name="thumbnail" hidden>
                              </div>
                          </div>
                          </div>
                      <div class="d50 center">
                    <div class="input d50">
                        <span>عنوان پست :</span>
                        <input id="title" name="title" type="text" placeholder="عنوان پست">
                    </div>
                    <div class="input d50">
                        <span>پیوند :</span>
                        <input id="slug" name="slug" type="text" placeholder="پیوند">
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
                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                            @endforeach
                        </select>
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
      </script>
@endsection