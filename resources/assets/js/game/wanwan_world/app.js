import Vue from 'vue';
// import axios from 'axios';

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
        let images = {
            wanko_wait : '/images/game/wanwan_world/wanko_dummy.png',
            wanko_jump : '/images/game/wanwan_world/wanko_start_dummy.png',
        };

        for (let key of Object.keys(images)) {
            store.state.images[key] = new Image();
            store.state.images[key].src = images[key];
            // axios.get(images[key], {responseType: 'arraybuffer'})
            //      .then((response) => {
            //          let imageBase64 = new Buffer(response.data, 'binary').toString('base64');
            //          store.state.imageBase64[key] = 'data:image/png;base64,' + imageBase64;
            //      });
        }

        console.log(store.state.images);
    }
});