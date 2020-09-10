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
    
      

    <!-- MarkerCluster -->
    

    <!-- Google MAP API KEY -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqD8_cvwnofDfl9QhwuKA-vjdL-iUFysw&callback=initMap"
  type="text/javascript"></script>

    <script src="https://code.jquery.com/jquery-2.1.1.js" integrity="sha256-FA/0OOqu3gRvHOuidXnRbcmAWVcJORhz+pv3TX2+U6w=" crossorigin="anonymous"></script>

    <script>
        function initMap() {
        //マップ初期表示の位置設定
          var target = document.getElementById('target');
          var centerp = {lat: 35.681236, lng: 139.767125};
          //マップ表示
            map = new google.maps.Map(target, {
              center: centerp,
              zoom: 13,
              });
              
        };
      var markerD = [];
      // DB情報の取得
      $(function(){
        $.ajaxSetup({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
          });
        $.ajax({
          type: "POST",
          url: "/admin/shop/mapmarker",
          dataType: "json",
          success: function(data){
            markerD = data;
            setMarker(markerD);
          },
          error: function(XMLHttpRequest, textStatus, errorThrown){
            alert('Error : ' + errorThrown);
          }
          });
      });
      var map;
      var marker = [];
      var infoWindow = [];
      function setMarker(markerData) {
        // console.log(markerData);
        // console.log(markerData.length);
        //マーカー生成
        var sidebar_html = "";
        var icon;
        for (var i = 0; i < markerData.length; i++) {
          var latNum = parseFloat(markerData[i]['latitude']);
          var lngNum = parseFloat(markerData[i]['longitube']);
          // マーカー位置セット
          var markerLatLng = new google.maps.LatLng({
            lat: latNum,
            lng: lngNum
          });
          // マーカーのセット
          marker[i] = new google.maps.Marker({
            position: markerLatLng,          // マーカーを立てる位置を指定
            map: map,                        // マーカーを立てる地図を指定
            icon: icon                      // アイコン指定
          });
          
          infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
          content: markerData[i]['name']  // 吹き出しに表示する内容
          });
          markerEvent(i);
        }
      }
      
      var getMap = (function() {
  function codeAddress(address) {
    // google.maps.Geocoder()コンストラクタのインスタンスを生成
    var geocoder = new google.maps.Geocoder();
 
    
 
    
     
    // geocoder.geocode()メソッドを実行 
    geocoder.geocode( { 'address': address}, function(results, status) {
       
      // ジオコーディングが成功した場合
      if (status == google.maps.GeocoderStatus.OK) {
         
        // 変換した緯度・経度情報を地図の中心に表示
        map.setCenter(results[0].geometry.location);
         
        
        
      // ジオコーディングが成功しなかった場合
      } else {
        console.log('Geocode was not successful for the following reason: ' + status);
      }
     
    });
    
   
  }
   
  //inputのvalueで検索して地図を表示
  return {
    getAddress: function() {
      // ボタンに指定したid要素を取得
      var button = document.getElementById("map_button");
       
      // ボタンが押された時の処理
      button.onclick = function() {
        // フォームに入力された住所情報を取得
        var address = document.getElementById("address").value;
        // 取得した住所を引数に指定してcodeAddress()関数を実行
        codeAddress(address);
      }
       
      //読み込まれたときに地図を表示
      window.onload = function(){
        // フォームに入力された住所情報を取得
        var address = document.getElementById("address").value;
        // 取得した住所を引数に指定してcodeAddress()関数を実行
        codeAddress(address);
      }
    }
   
  };
  
 
})();
getMap.getAddress();
      
      function markerEvent(i) {
        marker[i].addListener('click', function() { // マーカーをクリックしたとき
        infoWindow[i].open(map, marker[i]); // 吹き出しの表示
        });
      }
      
    </script>
  </body>
</html>