<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
         <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
         <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
        
        <title>foodfile</title>
        
        <style>
        body {
              border: solid;
              border-radius: 8px; 
              border-color: #6cb4e4;
              
             }
        h1 {
            color: #6cb4e4;
            text-align: center;
            padding: 0.25em;
            border-top: solid 2px #6cb4e4;
            border-bottom: solid 2px #6cb4e4;
            background: -webkit-repeating-linear-gradient(-45deg, #f0f8ff, #f0f8ff 3px,#e9f4ff 3px, #e9f4ff 7px);
            background: repeating-linear-gradient(-45deg, #f0f8ff, #f0f8ff 3px,#e9f4ff 3px, #e9f4ff 7px);
            }
        .logo {
              color: #505050;/*文字色*/
              padding: 0.5em;/*文字周りの余白*/
              display: inline-block;/*おまじない*/
              line-height: 1.3;/*行高*/
              background: #dbebf8;/*背景色*/
              vertical-align: middle;
              border-radius: 25px 0px 0px 25px;/*左側の角を丸く*/
            }
            
            .logo:before {
              content: '●';
              color: white;
              margin-right: 8px;
            }
        </style>
        
    </head>
    <body>
        <div class="container">
        <h1 class="col-md-2 mt-4 mx-auto">登録画面</h1>
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <h2>アナタのお店登録</h2>
                    <form action="{{ action('Admin\Shopscontroller@create') }}" method="post" enctype="multipart/form-data">
                        @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <div class="form-group row">
                            <label class="logo col-md-2" for="title">お店の名前</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name"  placeholder="お店の名前" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <lavel class="logo col-md-2" for="title">URL</lavel>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="url" placeholder="URL" value="{{ old('url') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <lavel class="logo col-md-2" for="title">ジャンル</lavel>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="genre" placeholder="ジャンル" value="{{ old('genre') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <lavel class="logo col-md-2" for="title">画像</lavel>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="image" placeholder="画像" value="{{ old('image') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <lavel class="logo col-md-2" for="title">緯度</lavel>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="latitude" placeholder="緯度" value="{{ old('latitude') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <lavel class="logo col-md-2" for="title">経度</lavel>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="longitube" placeholder="経度" value="{{ old('longitube') }}">
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <p><input type="submit" class="btn btn-primary" value="登録"></p>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
    </body>
</html>