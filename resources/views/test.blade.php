<!DOCTYPE html>
<html>
  <head>

    

     <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google-map.apikey') }}"
                type="text/javascript" async defer ></script>

    <script type="text/javascript">
    function initialize() {
    var centerPos = new google.maps.LatLng(36.248703507932646,138.30688432812497);//地図の中心座標
    var myOptions = {
        zoom: 7,//地図の拡大or縮小
        center : centerPos,
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP //地図の種類決定
    }
    // マップを設置
    var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions); //地図を表示するid名
     
    // マーカーを準備 
    var markers = [
        ['拠点A', 38.15786310466496, 140.8732842404754],
        ['拠点B', 35.81815709999999, 139.48240480000004],
        ['拠点C', 35.75943852258432, 139.65878506994056]
    ];
 
    for (var i = 0; i < markers.length; i++) {
        createMarker(
            markers[i][0],
            markers[i][1],
            markers[i][2],
            map,
        );
    }
}
 
var hoverinfo = [];
 
// マーカーを設定
function createMarker(name,lat,lng,map){
 
    var latlng = new google.maps.LatLng(lat,lng);
    var pixelOffset = new google.maps.Size(0, -40);
 
    var marker = new google.maps.Marker({
        position: latlng,
        map: map});
 
    // マーカーにマウスを乗せたときのイベント
    marker.addListener('mouseover', function() {
 
        // infoの位置
        hoverinfo = new google.maps.InfoWindow({
            map: map,
            content: name,
            noSuppress: true,
            pixelOffset: pixelOffset
        });
 
        hoverinfo.setPosition(
            latlng 
        );
 
        // マーカーからマウスを降ろしたときのイベント
        marker.addListener('mouseout', function() {
            if(hoverinfo)
                hoverinfo.close();
        });
    });
 
}
window.onload=initialize;//地図を表示

    </script>
  </head>

  <body>
  <div id="map_canvas" style="width: 100%; height: 100vh;"></div>
  </body>

</html>
