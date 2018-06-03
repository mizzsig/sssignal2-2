<template>
    <div class="wrapper">
        <div class="steps"><span class="steps-number">{{ steps }}</span>歩</div>
        <div id="flowMessage">{{ message }}</div>
    </div>
</template>

<script>
import anime from 'animejs';

export default {
    name: 'info',
    data: function() {
        return {
            steps: 0,
            message: '',
        }
    },
    methods: {
        flowMessage (message) {
            var info = this;
            
            // 今あるメッセージが流される
            anime({
                targets: '#flowMessage',
                opacity: 0,
                marginLeft: '-20px',
                duration: 300,
                easing: 'linear',
                complete() {
                    info.message = message;
                    // 新しいメッセージが流れてくる
                    anime({
                        targets: '#flowMessage',
                        marginLeft: ['20px', '0px'],
                        opacity: 1,
                        delay: 300,
                        duration: 300,
                        easing: 'linear',
                    });
                }
            });
        }
    }
}
</script>

<style lang="scss" scoped>
.wrapper {
    position: fixed;
    width: 100%;
    color: #FF8888;

    div {
        display: inline-block;
    }
}

.steps {
    min-width: 130px;
    margin-right: 20px;

    .steps-number {
        margin-left: 20px;
        margin-right: 5px;
        font-size: 36px;
    }
}
</style>
