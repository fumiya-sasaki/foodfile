/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import axios from 'axios';
let button = document.getElementById("button");
button.addEventListener("click", function() {
    let url = document.getElementById("url").value;
    axios.get('/api',{
        params: {
            // ここにクエリパラメータを指定する
            //左のurlはtest.bladeのidのurl 右のurlは変数url
            url: url
        }
    }).then(res => {
        let image = document.getElementById("image");
        let title = document.getElementById("title");
        title.value = res.data['title'];
        image.innerHTML = "";
        image.insertAdjacentHTML('beforebegin', '<p>' + res.data['title'] + '</p>');
        image.insertAdjacentHTML('beforebegin', '<p>' + res.data['url'] + '</p>');
        image.insertAdjacentHTML('beforebegin', '<img src=' + res.data['image'] + '>');
        console.log(res.data)
    })
});


