<template>
    <div>
        <img class="character" @click="click" :src="character_image">
    </div>
</template>

<script>
import anime from 'animejs'

export default {
    name: 'character',
    data: function () {
        return {
            character_image: '/images/game/wanwan_world/wanko_dummy.png',
            isJumping: false
        }
    },
    methods: {
        click: function (event) {
            if (!this.isJumping) {
                let character = this;
                character.isJumping = true;
                character.character_image = '/images/game/wanwan_world/wanko_start_dummy.png';

                anime({
                    targets: event.target,
                    translateY: [
                        { value: -50, duration: 120},
                        { value: 0, duration: 120}
                    ],
                    easing: 'linear',
                    complete: function() {
                        character.character_image = '/images/game/wanwan_world/wanko_dummy.png';
                        character.isJumping = false;
                    }
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
}
</style>