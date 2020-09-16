/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import axios from 'axios';
let button = document.getElementById("button");
$(document).on("click", function() {
    let url = document.getElementById("url").value;
    axios.get('/admin/shop/api',{
        params: {
            // ここにクエリパラメータを指定する
            //左のurlはcreate.bladeのidのurl 右のurlは変数url
            url: url
        }
    }).then(res => {
        let image = document.getElementById("image");
        let title = document.getElementById("title");
        title.value = res.data['title'];
        image.value = res.data['image'];
        image.innerHTML = "";
         $('#image_open').html('<img src=' + res.data['image'] + ' width="457" height="309" >');
        console.log(res.data);
    });
});

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

