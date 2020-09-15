<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>foodfile</title>
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/edit.css') }}" rel="stylesheet">
    </head>
    <body>
    <div id="content_wrap">
	    <div class="content">
            <div class="container">
                <div class="col text-center">
                    <h1 class="col-md-5 mt-5 mx-auto title">Shop Edit</h1>
                </div>
                    <a href="{{ action('Admin\Shopscontroller@index') }}" role="button" class="btn btn-success">一覧へ戻る</a>
                    <hr class="border border-primary">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <form action="{{ action('Admin\Shopscontroller@update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if (count($errors) > 0 )
                                    <ul>
                                        @foreach($errors->all() as $e)
                                            <li>{{ $e }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="form-group row">
                                    <label class="logo col-md-2">URL</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="url" name="url" value="{{ $shop_form->url }}">
                                        <button class="btn btn-success col-md-5 mt-2" type="button" id="button">urlから名前と画像取得</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="logo col-md-2">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="title" name="name" value="{{ $shop_form->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="logo col-md-2">Genre</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="genre" value="{{ $shop_form->genre }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="logo col-md-2">Image</label>
                                    <div class="col-md-8">
                                        <p id="image_open" ><img src="{{ $shop_form->image }}" width="457" height="309"></img></p> 
                                        <input type="text" class="form-control" id="image" name="image" placeholder="画像アドレスから画像を取得" value="{{ $shop_form->image }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="logo col-md-2" for="title">Address</label>
                                    <div class="col-md-8">
                                        <input type="text" id="address" class="form-control" name="address" placeholder="住所を入力したらMAPナンバーを取得" value="{{ $shop_form->address }}">
                                        <button class="btn btn-success col-md-5 mt-2" type="button" id="attrLatLng">MAPナンバーを取得</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <lavel class="logo col-md-2" for="title">MAP.No</lavel>
                                    <div class="col-md-8">
                                        <input type="text" id="longitube" class="form-control" name="longitube" placeholder="MAPナンバーでMAPにピンが立つ" value="{{ $shop_form->longitube }}">
                                        <input type="hidden" id="latitude" class="form-control" name="latitude"  value="">
                                    </div>
                                </div>
                                <div class="d-flex flex-row pb-5">
                                    <div class="col-md-2">
                                        <input type="hidden" name="id" value="{{ $shop_form->id }}">
                                        <input type="submit" class="btn btn-success" value="更新">
                                    </div>
                            </form>
                                    <div class="col-md-5">
                                        <form class="delete_btn" method="GET" action="/admin/shop/delete/{{ $shop_form->id }}">    
                                            {{ csrf_field() }}
                                            <input type="submit" value="このお店を削除" class="btn btn-danger  btn-dell offset-md-11">
                                        </form>
                                    </div>    
                                </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google-map.apikey') }}&callback"></script>
    <script src="{{ secure_asset('js/edit.js') }}" defer></script>
    </body>
</html>    