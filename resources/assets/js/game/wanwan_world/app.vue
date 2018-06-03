<template>
    <div style="width:100%; height:100%;">
        <img :src="backgroundImage" style="position:fixed; top:0px; left:0px; width:100%; height:100%; object-fit:cover;" />
        <div id="wrapper">
            <start class="game-component" @set="startGame"/>
            <stage class="game-component" @bgimageFromChild="setBackgroundImage" ref="stage"/>
            <end class="game-component" @setImage="setImage"/>
        </div>
    </div>
</template>

<script>
export default {
    name: 'app',
    data: function() {
        return {
            state: store.state,
            backgroundImage: '/images/game/wanwan_world/sougen.gif',
        }
    },
    methods: {
        startGame() {
            if (this.state.isTitle) {
                store.setIsTitle(false);
                this.$refs.stage.meInit();
                this.$refs.stage.startWalking('散歩に行くわん！');
            }
        },
        setBackgroundImage(image) {
            this.backgroundImage = image;
        },
        setImage() {
            this.backgroundImage = '/images/game/wanwan_world/sougen.gif';
        }
    }
}
</script>

<style lang="scss">
* {
    margin: 0px;
    padding: 0px;
}

html, body, #wrapper {
    width: 100%;
    height: 100%;
    background-color: #55FF55;
    top: 0px;
    left: 0px;

    user-select: none;
    -ms-user-select: none;
    -moz-user-select: none;
    -webkit-user-select: none;
    -webkit-touch-callout: none;
}

img {
    max-width: 100%;

    user-select: none;
    -ms-user-select: none;
    -moz-user-select: none;
    -webkit-user-select: none;
    -webkit-touch-callout: none;
}

.game-component {
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
}

.inline-block {
    display: inline-block;
    vertical-align: middle;
}
</style>
