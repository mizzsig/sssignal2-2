<template>
    <div class="wrapper" v-if="state.isEnd">
        <img src="/images/game/wanwan_world/end.png" />
        <div class="buttons">
            <div @click="toTitle" class="button">わん！ もあちゃんす</div>
            <div @click="tweet" class="button">ツイッターに わん！</div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'end',
    data: function() {
        return {
            state: store.state,
        }
    },
    methods: {
        toTitle() {
            this.$emit('setImage');
            this.state.isEnd = false;
            this.state.isTitle = true;
        },
        tweet() {
            window.open('https://twitter.com/intent/tweet?text=' + this.state.steps + '歩わん！&url=https://sssignal.com/game/wanwan_world&via=mizzsig', '_blank', 'width=0,height=0');
        }
    }
}
</script>

<style lang="scss" scoped>
.wrapper {
    width: 100%;
    height: 100%;
    text-align: center;
    position: fixed;

    img {
        width: 100%;
        height: 100%;
        left: 0px;
        position: fixed;
        object-fit: cover;
        object-position: 50% 0%;
        z-index: -1;
    }

    .buttons {
        position: relative;
        top: 80%;
        z-index: 10;
    }
}

.button {
    display: inline-block;
    font-size: 16px;

    text-align: center;
    width: 80%;
    max-width: 350px;

    padding: 10px 30px;
    margin: 10px 20px;
    background-color: rgba(224, 94, 94, 0.795);
    border-radius: 5px;
    border: 3px solid rgba(238, 68, 68, 0.795);

    transition: all 0.1s linear;

    &:hover {
        cursor: pointer;
        background-color: rgba(224, 211, 94, 0.795);
        border: 3px solid rgba(235, 218, 64, 0.795);

        transform: scale(1.1);
    }
}
</style>
