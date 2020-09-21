require('./bootstrap');
google.maps.event.addDomListener( window, 'load', initMap );
function initMap() {
        //マップ初期表示の位置設定
          var target = document.getElementById('target');
          var centerp = {lat: 35.681236, lng: 139.767125};
          //マップ表示
            map = new google.maps.Map(target, {
              center: centerp,
              zoom: 10,
              });
        }
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
        
         google.maps.event.addListener(marker[i], 'click', (function(url){
         return function(){ open( url, "_blank"); };
         })(markerData[i]['url']));
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
         
        // 変換した緯度・経度情報を地��の中心に表示
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
  marker[i].addListener('mouseover', function() { 
  infoWindow[i].open(map, marker[i]); 
  });
  marker[i].addListener('mouseout', function() { 
  infoWindow[i].close();
  });
}

