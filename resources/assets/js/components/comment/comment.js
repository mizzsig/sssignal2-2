import Vue from 'vue';

Vue.component('comment', require('./CommentComponent.vue'));
Vue.component('showComment', require('./ShowCommentComponent.vue'));
Vue.component('writeComment', require('./WriteCommentComponent.vue'));

const comment = new Vue({
    el: '.comment',
    template: '<comment/>',
});