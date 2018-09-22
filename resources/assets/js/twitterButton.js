import Vue from 'vue';

Vue.component('twitter-button', require('./components/TwitterButtonComponent.vue'));

const twitterButton = new Vue({
    el: '.twitter-button',
    template: '<twitter-button/>',
});