
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.toastr = require('toastr');

$.ajaxSetup({
    headers:
    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import NewMessage from './components/NewMessage.vue';

new Vue({
    el: '#app',
    components: {NewMessage}
});

var socket = io.connect('http://localhost:8890');
socket.on('message', function (data) {
	let response = JSON.parse(data);
	let lastSent = $('.messages .username:last-of-type').html()
    if(response.username == lastSent){
    	$('.messages').append('<p>'+response.message+'</p>');
    } else {
    	$('.messages').append('<h3 class="username">'+response.username+'</h3><p>'+response.message+'</p>');
    }
});