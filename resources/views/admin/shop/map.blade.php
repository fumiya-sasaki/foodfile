<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Up to World</title>
   <style>
     #target {
 width: 700px;
   height: 400px;
     }
   </style>
  </head>

  <body>
    <div id="header">Google Maps - 世界最大・世界最長リスト</div>
    <table>
      <tr>
        <td><div id="target"></div></td>
        <td><div id="sidebar"></div></td>
      </tr>
    </table>

    <!-- MarkerCluster -->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>

    <!-- Google MAP API KEY -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqD8_cvwnofDfl9QhwuKA-vjdL-iUFysw&callback=initMap"
  type="text/javascript"></script>

    <script src="https://code.jquery.com/jquery-2.1.1.js" integrity="sha256-FA/0OOqu3gRvHOuidXnRbcmAWVcJORhz+pv3TX2+U6w=" crossorigin="anonymous"></script>

    <script>
        function initMap() {
        //マップ初期表示の位置設定
        var target = document.getElementById('target');
        var centerp = {lat: 37.67229496806523, lng: 137.88838989062504};
        //マップ表示
        map = new google.maps.Map(target, {
          center: centerp,
          zoom: 15,
        });
      };
      var markerD = [];
      // DB情報の取得
      $(function(){
        $.ajax({
          type: "GET",
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
          console.log(latNum);
          // マーカー位置セット
          var markerLatLng = new google.maps.LatLng({
            lat: latNum,
            lng: lngNum
          });
          
          // マーカーのセット
          marker[i] = new google.maps.Marker({
            position: markerLatLng,          // マーカーを立てる位置を指定
            map: map,                        // マーカーを立てる地図を指定
            icon: icon                       // アイコン指定
          });
          
        }
        
      }
      
     
    </script>
  </body>
</html>