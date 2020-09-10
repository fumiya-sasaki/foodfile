<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
         <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
         <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
        
        <title>foodfile</title>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqD8_cvwnofDfl9QhwuKA-vjdL-iUFysw&callback"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <h2>お店の編集</h2>
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
                            <label class="col-md-2">住所</label>
                            <div class="col-md-10">
                                <input type="text" id="address" class="form-control" name="address" value="{{ $shop_form->address }}">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2">緯度</label>
                            <div class="col-md-10">
                                 <input type="text" id="latitude" class="form-control" name="latitude" value="{{ $shop_form->latitude }}">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-2">経度</label>
                            <div class="col-md-10">
                                <input type="text" id="longitube" class="form-control" name="longitube" value="{{ $shop_form->longitube }}">
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
              <button class="btn btn-primary" id="attrLatLng">住所から緯度、経度を検索</button>
        </div>
        <script>
             $(function(){
                function attrLatLngFromAddress(address){
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({'address': address}, function(results, status){
                        if(status == google.maps.GeocoderStatus.OK) {
                            var lat = results[0].geometry.location.lat();
                            var lng = results[0].geometry.location.lng();
                            // 小数点第六位以下を四捨五入した値を緯度経度にセット、小数点以下の値が第六位に満たない場合は0埋め
                            document.getElementById("latitude").value = (Math.round(lat * 1000000) / 1000000).toFixed(6);
                            document.getElementById("longitube").value = (Math.round(lng * 1000000) / 1000000).toFixed(6);
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