import Vue from 'vue';

// <app/> で app.vue コンポーネントを呼ぶ
Vue.component('app', require('./app.vue'));
Vue.component('start', require('./start.vue'));
Vue.component('stage', require('./stage.vue'));
Vue.component('character', require('./character.vue'));
Vue.component('status', require('./status.vue'));

const app = new Vue({
    el: '#app',
    template: '<app/>'
});