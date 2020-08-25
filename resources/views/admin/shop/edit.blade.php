<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
         <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
         <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
        
        <title>foodfile</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <h2>お店の編集</h2>
                    <form action="{{ action('Admin\Shopscontroller@update') }}" method="post" enctype="multipart/form-data">
                        @if (count($errors) > 0 )
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <div class="form-group row">
                            <label class="col-md-2">お店の名前</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" value="{{ $shop_form->name }}">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2">url</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="url" value="{{ $shop_form->url }}">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2">ジャンル</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="genre" value="{{ $shop_form->genre }}">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2">画像</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="image" value="{{ $shop_form->image }}">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2">緯度</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="latitude" value="{{ $shop_form->latitude }}">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2">経度</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="longitube" value="{{ $shop_form->longitube }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="hidden" name="id" value="{{ $shop_form->id }}">
                                <input type="submit" class="btn btn-primary" value="更新">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>    