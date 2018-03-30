import Vue from 'vue';
import anime from 'animejs';

// <app> で app.vue コンポーネントを呼ぶ
Vue.component('app', require('./app.vue'));

const app = new Vue({
    el: '#app',
    template: '<app></app>'
});
