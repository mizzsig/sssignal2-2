<template>
    <transition name="anime">
        <div class="wrapper" @click="setIsTitle" v-if="state.isTitle">
            <div class="title">
                <img src="/images/game/wanwan_world/title.png">
            </div>
            <div class="howto">
                <img src="/images/game/wanwan_world/howto.png">
            </div>
            <div class="logo">
                <img src="/images/game/wanwan_world/logo.png">
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: 'start',
    data: function() {
        return {
            // show_flag: true
            state: store.state
        }
    },
    methods: {
        setIsTitle () {
            store.setIsTitle(false)
        }
    }
}
</script>

<style lang="scss" scoped>
.wrapper {
    width: 100%;
    height: 100%;
    position: relative;
    text-align: center;
}

.title {
    position: relative;
}

.howto {
    position: relative;
    top: 10%;
}

.logo {
    position: fixed;
    bottom: 0px;
    right: 0px;
}

img {
    max-height: 200px;
}

.anime-leave-active {
    transition: all 0.3s;
}

.anime-leave-to {
    opacity: 0;
}
</style>
