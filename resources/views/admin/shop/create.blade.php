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
            
            body {
                background-image: url(https://kumamoto-so-on.com/wp-content/uploads/2019/12/IMG_8045-1024x683.jpeg);
                background-size: cover;
            }
        </style>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqD8_cvwnofDfl9QhwuKA-vjdL-iUFysw&callback"></script>
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
                                <input type="text" id="title" class="form-control" name="name"  placeholder="お店の名前" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <lavel class="logo col-md-2" for="title">URL</lavel>
                            <div class="col-md-10">
                                <input type="text" id="url" class="form-control" name="url" placeholder="URL" value="{{ old('url') }}">
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
                                <input type="text" id="image" class="form-control" name="image" placeholder="画像" value="{{ old('image') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="logo col-md-2" for="title">住所</label>
                            <div class="col-md-10">
                                <input type="text" id="address" class="form-control" name="adress" placeholder="住所" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <lavel class="logo col-md-2" for="title">緯度</lavel>
                            <div class="col-md-10">
                                <input type="text" id="latitude" class="form-control" name="latitude" placeholder="緯度" value="{{ old('latitude') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <lavel class="logo col-md-2" for="title">経度</lavel>
                            <div class="col-md-10">
                                <input type="text" id="longitube" class="form-control" name="longitube" placeholder="経度" value="{{ old('longitube') }}">
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <p><input type="submit" class="btn btn-primary" value="登録"></p>
                    </form>
                             <button id="button">おしてください</button>
                             <input type="button" value="住所から緯度経度を入力する" id="attrLatLng">
                </div>
            </div>
        </div>
        <a href="{{ action('Admin\Shopscontroller@index') }}" role="button" class="btn btn-primary">一覧へ戻る</a>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <script type="text/javascript">
            $(function(){
                function attrLatLngFromAddress(address){
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({'address': address}, function(results, status){
                        if(status == google.maps.GeocoderStatus.OK) {
                            var lat = results[0].geometry.location.lat();
                            var lng = results[0].geometry.location.lng();
                            // 小数点第六位以下を四捨五入した値を緯度経度にセット、小数点以下の値が第六位に満たない場合は0埋め
                            document.getElementById("latitude").value = (Math.round(lat * 1000000) / 1000000).toFixed(6);
                            document.getElementById("longitube").value = (Math.round(lat * 1000000) / 1000000).toFixed(6);
                        }
                    });
                }
                $('#attrLatLng').click(function(){
                    var address = document.getElementById("address").value;
                    attrLatLngFromAddress(address);
                });
            });
        </script>
    </body>
</html>