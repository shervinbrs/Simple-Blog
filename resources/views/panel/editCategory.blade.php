@extends('panel.template')

@section('title')
    ویرایش دسته بندی
@endsection

@section('content')
      <div class="d100 center">
          <div class="card white">
              <div class="card-title">
                ویرایش دسته بندی
              </div>
              <div class="card-body text-center">
                  <form method="POST">
                    <div class="input d25 block center">
                        <span>نام دسته بندی :</span>
                        <input type="text" id="title" name="name" placeholder="نام دسته بندی" value="{{$category['name']}}">
                    </div>
                    <div class="input d25 block center">
                        <span>پیوند :</span>
                        <input type="text" id="slug" name="slug" placeholder="پیوند" value="{{$category['slug']}}">
                    </div>
                    <div class="d25 center">
                        <div class="input d25 block center">
                            @csrf
                        <input type="submit" class="button button-success-light" value="ویرایش">
                        </div>
                    </div>
                  </form>
              </div>
          </div>
      </div>
      <script>
           function convertToSlug(Text) {
            return Text.replace(/[\s\\]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
             }
          $('#title').on('keyup',function()
          {
              $('#slug').val(convertToSlug($('#title').val()));
          });

      </script>
@endsection