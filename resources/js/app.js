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

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
