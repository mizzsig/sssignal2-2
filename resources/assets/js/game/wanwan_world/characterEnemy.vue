<template>
    <transition name="anime">
        <div v-if="state.isBattle">
            <img class="characterEnemy" :src="character_image">
        </div>
    </transition>
</template>

<script>
import anime from 'animejs';

export default {
    name: 'characterEnemy',
    data: function () {
        return {
            character_image: store.state.images.nyako_wait.src,
            state: store.state,
        }
    },
    methods: {
        attack: function() {
            return anime({
                targets: '.characterEnemy',
                translateX: '10px',
                duration: 3000,
                elasticity: 1000,
            }).finished;
        }
    }
}
</script>

<style lang="scss" scoped>
.characterEnemy {
    position: fixed;
    top: 60px;
    left: 60px;

    max-height: 600px;

    user-select: none;
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
    -webkit-user-drag: none;
    user-drag: none;
}

.anime-enter-active, .anime-leave-active {
    transition: opacity 0.6s;
}

.anime-enter, .anime-leave-to {
    opacity: 0;
}
</style>