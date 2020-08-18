<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>foodfile</title>
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->
    </head>
    <body>
        <div class="container">
        <h1 class>登録画面</h1>
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
                            <label class="col-md-2" for="title">お店の名前</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name"  placeholder="お店の名前" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <lavel class="col-md-2" for="title">URL</lavel>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="url" placeholder="URL" value="{{ old('url') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <lavel class="col-md-2" for="title">ジャンル</lavel>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="genre" placeholder="ジャンル" value="{{ old('genre') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <lavel class="col-md-2" for="title">画像</lavel>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="image" placeholder="画像" value="{{ old('image') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <lavel class="col-md-2" for="title">緯度</lavel>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="latitude" placeholder="緯度" value="{{ old('latitude') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <lavel class="col-md-2" for="title">経度</lavel>
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
    </body>
</html>