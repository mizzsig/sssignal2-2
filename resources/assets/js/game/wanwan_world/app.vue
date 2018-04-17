<template>
    <div id="wrapper">
        <start class="game-component"/>
        <stage class="game-component"/>
    </div>
</template>

<script>
export default {
    name: 'app',
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
}

img {
    max-width: 100%;
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
