import Vue from 'vue';
import axios from 'axios';

// <app/> で app.vue コンポーネントを呼ぶ
Vue.component('app', require('./app.vue'));
Vue.component('start', require('./start.vue'));
Vue.component('stage', require('./stage.vue'));
Vue.component('character', require('./character.vue'));
Vue.component('status', require('./status.vue'));
Vue.component('info', require('./info.vue'));

const app = new Vue({
    el: '#app',
    template: '<app/>',
    
    // 使う画像のプリロード
    mounted: () => {
        const images = [
            '/images/game/wanwan_world/wanko_dummy.png',
            '/images/game/wanwan_world/wanko_start_dummy.png',
        ];

        images.forEach((value) => {
            axios.get(value);
        });
    }
});