require('./bootstrap');

function initMap() {
        //マップ初期表示の位置設定
          var target = document.getElementById('target');
          var centerp = {lat: 35.681236, lng: 139.767125};
          //マップ表示
            map = new google.maps.Map(target, {
              center: centerp,
              zoom: 15,
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
      function markerEvent(i) {
        marker[i].addListener('click', function() { // マーカーをクリックしたとき
        infoWindow[i].open(map, marker[i]); // 吹き出しの表示
        });
      }
