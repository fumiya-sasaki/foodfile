<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/create.css') }}" rel="stylesheet">
        <title>foodfile</title>
    </head>
    <body>
        <div id="content_wrap">
            <div class="content">
                <div class="container">
                    <div class="col-12 clearfix text-center">
                        <h1 class="col-md-5 mt-5 mx-auto title">Add Shop</h1>
                        <p class="float-right">food file</p>
                    </div>
                    <a href="{{ action('Admin\Shopscontroller@index') }}" role="button" class="btn btn-success">一覧へ戻る</a>
                    <hr class="border">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <form action="{{ action('Admin\Shopscontroller@create') }}" method="post" enctype="multipart/form-data">
                                @if (count($errors) > 0)
                                    <ul>
                                        @foreach($errors->all() as $e)
                                            <li>{{ $e }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="form-group row">
                                    <label class="logo col-md-2" for="title">URL</label>
                                    <div class="col-md-9">
                                        <input type="text" id="url" class="form-control" name="url" placeholder="URL  *必須" value="{{ old('url') }}">
                                        <button class="btn btn-success col-md-5 mt-2" type="button" id="button">URLから名前と画像取得</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="logo col-md-2" for="title">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="title" class="form-control" name="name"  placeholder="お店の名前  *必須" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <lavel class="logo col-md-2" for="title">Image</lavel>
                                    <div class="col-md-9">
                                        <p id="image_open"></p>
                                        <input type="text" id="image" class="form-control" name="image" placeholder="画像アドレスから画像を取得" value="{{ old('image') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <lavel class="logo col-md-2" for="title">Genre</lavel>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="genre" placeholder="ジャンル  *必須" value="{{ old('genre') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="logo col-md-2" for="title">Address</label>
                                    <div class="col-md-9">
                                        <input type="text" id="address" class="form-control" name="address" placeholder="住所を入力したらMAPナンバーを取得" value="{{ old('address') }}">
                                        <button class="btn btn-success col-md-5 mt-2" type="button" id="attrLatLng">MAPナンバーを取得</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <lavel class="logo col-md-2" for="title">MAP.No</lavel>
                                    <div class="col-md-9">
                                       <input type="text" id="longitube" class="form-control" name="longitube" placeholder="MAPナンバーでMAPにピンが立つ" value="">
                                    </div>
                                </div>
                                <input type="hidden" id="latitude" class="form-control" name="latitude" placeholder="緯度" value="">
                                {{ csrf_field() }}
                                <p><input type="submit" class="btn btn-success" value="登録"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google-map.apikey') }}&callback"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="{{ asset('js/create.js') }}" defer></script>
    </body>
</html>