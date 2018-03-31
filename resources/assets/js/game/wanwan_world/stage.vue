<template>
    <transition name="anime">
        <div class="wrapper" v-if="!state.isTitle">
            <div class="title">
                <img src="/images/game/wanwan_world/title.png">
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: 'stage',
    data: function() {
        return {
            state: store.state
        }
    },
}
</script>

<style lang="scss" scoped>
.anime-enter-active {
    transition: all 0.3s;
}

.anime-enter {
    opacity: 0;
}
</style>
