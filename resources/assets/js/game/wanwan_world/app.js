import Vue from 'vue';
import anime from 'animejs';

// <app/> で app.vue コンポーネントを呼ぶ
Vue.component('app', require('./app.vue'));
Vue.component('start', require('./start.vue'));

const app = new Vue({
    el: '#app',
    template: '<app/>'
});

// 全コンポーネントの状態を一元管理するデータストア
const store = {
    state: {
        isTitle: true
    },
    setIsTitle (value) {
        this.state.isTitle = value;
    }
};