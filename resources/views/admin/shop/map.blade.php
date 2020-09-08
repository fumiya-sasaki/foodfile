<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>アナタのMAP</title>
   <style>
     #target {
       width: 800px;
       height: 500px;
       }
     .btn_return {
       margin: 2px;
     }
     
   </style>
  </head>

  <body>
      <div class="container">
        <h1 class="col-md-3 mx-auto map">アナタのMAP</h1>
        <div class="row">
          <div class="col-md-9 mx-auto">
  <a href="{{ action('Admin\Shopscontroller@index') }}" role="button" class="btn btn-primary btn_return">一覧へ戻る</a>
          <div id="target"></div>
        <form onsubmit="return false;">
          <input type="text" value="" id="address">
          <button type="button" class="btn btn-primary"value="検索" id="map_button">検索</button>
        </form>
               
     <p>住所や駅名を入力して地図を移動</p>
          </div>
        </div>
      </div>
    
      

   
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqD8_cvwnofDfl9QhwuKA-vjdL-iUFysw&callback=initMap"
  type="text/javascript"></script>

    <script src="{{ secure_asset('js/map.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-2.1.1.js" integrity="sha256-FA/0OOqu3gRvHOuidXnRbcmAWVcJORhz+pv3TX2+U6w=" crossorigin="anonymous"></script>
   
  </body>
</html>