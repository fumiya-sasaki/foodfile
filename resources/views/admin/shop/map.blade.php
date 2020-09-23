<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/map.css') }}" rel="stylesheet">
        <title>food file</title>
    </head>
    <body>
        <div id="content_wrap">
            <div class="content">
                <div class="container">
                    <div class="col-12 clearfix text-center">
                        <h1 class="col-md-5 mx-auto mt-2 title">Yours MAP</h1>
                        <p class="float-right">food file</p>
                    </div>
                    <hr class="border border-primary">
                    <div class="row">
                        <div class="col-md-9 mx-auto">
                            <a href="{{ action('Admin\Shopscontroller@index') }}" role="button" class="btn btn-success btn_return mb-3">一覧へ戻る</a>
                            <p>ピンを押すと登録したURLへ！</p>
                            <div class="gmap">
                                <div id="target" ></div>
                            </div>
                            <form onsubmit="return false;">
                                <input class="mt-4" type="text" value="" id="address">
                                <button type="button" class="btn btn-success"value="検索" id="map_button">検索</button>
                            </form>
                            <p class="col-md-5 mt-2">住所や駅名を入力して地図を移動</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/map.js') }}" defer></script>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google-map.apikey') }}"
                type="text/javascript" async defer ></script>
        <script src="https://code.jquery.com/jquery-2.1.1.js" integrity="sha256-FA/0OOqu3gRvHOuidXnRbcmAWVcJORhz+pv3TX2+U6w=" crossorigin="anonymous"></script>
    </body>
</html>