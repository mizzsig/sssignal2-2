import Vue from 'vue';
// import axios from 'axios';

// <app/> で app.vue コンポーネントを呼ぶ
Vue.component('app', require('./app.vue'));
Vue.component('start', require('./start.vue'));
Vue.component('stage', require('./stage.vue'));
Vue.component('character', require('./character.vue'));
Vue.component('characterEnemy', require('./characterEnemy.vue'));
Vue.component('status', require('./status.vue'));
Vue.component('info', require('./info.vue'));
Vue.component('end', require('./end.vue'));

const app = new Vue({
    el: '#app',
    template: '<app/>',

    // 使う画像のプリロード
    mounted: () => {
        let images = {
            wanko_wait : '/images/game/wanwan_world/wanko_wait.png',
            wanko_jump : '/images/game/wanwan_world/wanko_jump.png',
            wanko_attack : '/images/game/wanwan_world/wanko_attack.png',
            wanko_damage : '/images/game/wanwan_world/wanko_damage.png',
            ari_wait : '/images/game/wanwan_world/ari_wait.png',
            gaitou_wait : '/images/game/wanwan_world/gaitou_wait.png',
            kankan_wait : '/images/game/wanwan_world/kankan_wait.png',
            koinobori_wait : '/images/game/wanwan_world/koinobori_wait.png',
            koumori_wait : '/images/game/wanwan_world/koumori_wait.png',
            nyako_wait : '/images/game/wanwan_world/nya-ko_wait.png',
            tentou_wait : '/images/game/wanwan_world/tentou_wait.png',
            tentou_damage : '/images/game/wanwan_world/tentou_damage.png',
            tentou_attack : '/images/game/wanwan_world/tentou_attack.png',
            tyoutyo_wait : '/images/game/wanwan_world/tyoutyo_wait.png',
            zassou_wait : '/images/game/wanwan_world/zassou_wait.png',
            sougen : '/images/game/wanwan_world/sougen.gif',
            machi : '/images/game/wanwan_world/machi.gif',
            night : '/images/game/wanwan_world/night.gif',
            end : '/images/game/wanwan_world/end.png',
        };

        for (let key of Object.keys(images)) {
            store.state.images[key] = new Image();
            store.state.images[key].src = images[key];
        }
    }
});