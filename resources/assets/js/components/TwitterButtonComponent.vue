<template>
 <div class="twitter-button" v-show="divShow" @mouseenter="mouseenter" @mouseleave="mouseleave" v-scroll="scroll" v-resize="resize" :style="{height: (width * 1.25) + 'px'}">
  <a href="https://twitter.com/mizzsig" target="_blank">
   <div :style="{width: width + 'px', bottom: width + 'px', height: (width / 4) + 'px'}">
    <img class="twitter-button-serif" :src="serifUrl">
   </div>
   <div :style="{width: width + 'px'}">
     <img class="twitter-button-image" :src="imageUrl">
   </div>
  </a>
 </div>
</template>

<script>
import anime from 'animejs';

export default {
    data: function () {
        return {
            images: [],
            imageUrl: '',
            serifUrl: '',
            state: 'wait',
            isShow: false,
            divShow: (document.documentElement.clientWidth > 800),
            width: document.documentElement.clientWidth * 0.25 > 300 ? 300 : document.documentElement.clientWidth * 0.25,
        }
    },
    directives: {
        scroll: {
            inserted: (el, binding) => {
                let f = function (evt) {
                    if (binding.value(evt, el)) {
                        window.removeEventListener('scroll', f);
                    }
                };
                window.addEventListener('scroll', f);
            }
        },
        resize: {
            inserted: (el, binding) => {
                let f = function (evt) {
                    if (binding.value(evt, el)) {
                        window.removeEventListener('resize', f);
                    }
                };
                window.addEventListener('resize', f);
            }
        }
    },
    methods: {
        mouseenter(event) {
            if (this.state == 'wait') {
                // 回転して喜んでる画像になる
                this.state = 'hover';
                anime({
                    targets: '.twitter-button-serif',
                    scaleX: 0.0,
                    duration: 75,
                    easing: 'linear',
                }).finished.then(() => {
                    this.serifUrl = this.images.hoverSerif.src;
                    anime({
                        targets: '.twitter-button-serif',
                        scaleX: 1.0,
                        duration: 75,
                        easing: 'linear',
                    });
                });

                this.imageUrl = this.images.hover.src;
                // ぴょん！ってする
                anime({
                    targets: '.twitter-button-image',
                    bottom: 30,
                    duration: 100,
                    easing: 'linear',
                }).finished.then(() => {
                    anime({
                        targets: '.twitter-button-image',
                        bottom: 0,
                        duration: 100,
                        easing: 'linear',
                    });
                });
            }
        },
        mouseleave(event) {
            if (this.state == 'hover') {
                // 回転してしょんぼりした画像になる
                this.state = 'wait';
                anime({
                    targets: '.twitter-button-image , .twitter-button-serif',
                    scaleX: 0.0,
                    duration: 75,
                    easing: 'linear',
                }).finished.then(() => {
                    this.imageUrl = this.images.wait.src;
                    this.serifUrl = this.images.waitSerif.src;
                    anime({
                        targets: '.twitter-button-image , .twitter-button-serif',
                        scaleX: 1.0,
                        duration: 75,
                        easing: 'linear',
                    });
                });
            }
        },
        scroll(event) {
            if ((document.documentElement.scrollTop + document.documentElement.clientHeight) > 0.9 * document.documentElement.scrollHeight) {
                if (!this.isShow) {
                    // 右から表れる
                    this.isShow = true;
                    document.getElementsByClassName('twitter-button')[0].style.right = '-100px';
                    anime({
                        targets: '.twitter-button',
                        right: 10,
                        opacity: 1.0,
                        duration: 200,
                        easing: 'linear'
                    }).finished.then(() => {
                        anime({
                            targets: '.twitter-button',
                            right: 0,
                            duration: 100,
                            easing: 'linear'
                        });
                    });
                }
            } else if (this.isShow) {
                // 右へ去ってゆく
                this.isShow = false;
                anime({
                    targets: '.twitter-button',
                    right: 10,
                    duration: 100,
                    easing: 'linear'
                }).finished.then(() => {
                    anime({
                        targets: '.twitter-button',
                        right: -100,
                        opacity: 0.0,
                        duration: 200,
                        easing: 'linear'
                    }).finished.then(() => {
                        document.getElementsByClassName('twitter-button')[0].style.right = '-300px';
                    });
                });
            }
        },
        resize(event) {
            // ツイッタータイムラインと同じ横幅にする
            this.divShow = document.documentElement.clientWidth > 800;
            this.width = document.documentElement.clientWidth * 0.25 > 300 ? 300 : document.documentElement.clientWidth * 0.25;
        }
    },
    mounted() {
        // 画像のプリロード
        let images = {
            wait : '/images/twitter_button.png',
            waitSerif : '/images/twitter_button_serif.png',
            hover : '/images/twitter_button2.png',
            hoverSerif : '/images/twitter_button_serif2.png',
        };

        for (let key of Object.keys(images)) {
            this.images[key] = new Image();
            this.images[key].src = images[key];
        }

        this.imageUrl = this.images.wait.src;
        this.serifUrl = this.images.waitSerif.src;
    }
}
</script>

<style lang="scss" scoped>
.twitter-button {
    max-height: 500px;
    max-width: 300px;
    margin: 0px;
    position: fixed;

    bottom: 0px;
    right: -300px;
    opacity: 0;

    user-select: none;
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
    -webkit-user-drag: none;
}

.twitter-button-image, .twitter-button-serif {
    position: relative;
}
</style>
