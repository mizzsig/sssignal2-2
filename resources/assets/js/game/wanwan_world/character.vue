<template>
    <div>
        <img class="character" @click="click" :src="character_image">
    </div>
</template>

<script>
import anime from 'animejs';

export default {
    name: 'character',
    data: function () {
        return {
            character_image: store.state.images.wanko_wait.src,
            isJumping: false,
            state: store.state,
        }
    },
    methods: {
        click: function (event) {
            if (!this.isJumping && !this.state.isBattle) {
                let character = this;
                character.character_image = store.state.images.wanko_jump.src;
                character.isJumping = true;

                anime({
                    targets: event.target,
                    translateY: [
                        { value: -50, duration: 120},
                        { value: 0, duration: 120}
                    ],
                    easing: 'linear',
                }).finished.then(() => {
                    character.character_image = store.state.images.wanko_wait.src;
                    character.isJumping = false;
                });
            }
        }
    }
}
</script>

<style lang="scss" scoped>
.character {
    position: fixed;
    right: 30px;
    bottom: -50px;

    max-height: 600px;
    
    user-select: none;
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
    -webkit-user-drag: none;
    user-drag: none;
}
</style>