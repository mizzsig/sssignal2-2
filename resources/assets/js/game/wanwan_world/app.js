import Vue from 'vue';
import anime from 'animejs';

// <app/> で app.vue コンポーネントを呼ぶ
Vue.component('app', require('./app.vue'));
Vue.component('start', require('./start.vue'));
Vue.component('stage', require('./stage.vue'));

const app = new Vue({
    el: '#app',
    template: '<app/>'
});