<template>
    <div class="write-comment" v-resize="resize">
        <div class="section-top">
            コメント投稿
        </div>
        <transition name="fade" mode="out-in">
            <div v-if="!isSuccess" class="wrapper" key="notSuccess">
                <div class="icon">
                    <transition name="window">
                        <div class="image-window" v-show="isShowImageWindow">
                            <div class="image-container">
                                <img @click="changeImage" v-for="(image, key) in images" :key="key" :src="image.src">
                            </div>
                        </div> 
                    </transition>
                    <transition name="window">
                        <div class="image-window-allow" v-show="isShowImageWindow"></div>
                    </transition>
                    <img class="icon-image" @click="showImageWindow" :src="imageURL">
                </div>
                <div class="body">
                    <input @focus="setDefaultName" id="name" type="text" placeholder="名前（15文字以内）" v-model="name" maxlength="15" />
                    <textarea id="text" placeholder="コメント" v-model="text" maxlength="3000" />
                    <button class="submit" @click="submit">
                        投稿！
                    </button>
                </div>
            </div>
            <div v-if="isSuccess" key="isSuccess">
                <img class="thanks" :src="thanksCommentURL">
            </div>
        </transition>
    </div>
</template>

<script>
import anime from 'animejs';
import axios from 'axios';

export default {
    data: () => {
        return {
            name: '',
            text: '',
            images: [],
            imageURL: '',
            isShowImageWindow: false,
            isSubmit: false,
            isSuccess: false,
            thanksCommentURL: ''
        }
    },
    created() {
        // 画像のプリロード
        let images = [
            '/images/comment/icon/wanko.png',
            '/images/comment/icon/tyoutyo.png',
            '/images/comment/icon/ari.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
            '/images/game/wanwan_world/wanko.png',
        ];

        for (let url of images) {
            this.images.push(new Image());
            this.images[this.images.length - 1].src = url;
        }

        // デフォルトのアイコンを設定
        this.imageURL = this.images[0].src;

        // コメントありがとうのURL
        let image = new Image();
        image.src = '/images/comment/thanks_comment.png';

        this.thanksCommentURL = image.src;
    },
    mounted() {
        this.checkSubmitButton();
    },
    methods: {
        // デフォルトの名前を入れる
        setDefaultName() {
            if (this.name === '') {
                this.name = 'ななし';
            }
        },
        // 画像選択ウィンドウを表示させる
        showImageWindow() {
            this.isShowImageWindow = !this.isShowImageWindow;
        },
        // アイコン画像を変える
        changeImage(event) {
            this.isShowImageWindow = false;

            anime({
                targets: '.icon-image',
                scaleX: 0.0,
                scaleY: 0.0,
                duration: 300,
                elasticity: 0,
            }).finished.then(() => {
                this.imageURL = event.target.src;
                anime({
                    targets: '.icon-image',
                    scaleX: 1.0,
                    scaleY: 1.0,
                    duration: 300,
                    elasticity: 200,
                });
            });
        },
        // textarea の高さを調節する
        resize() {
            document.getElementById('text').style.height = '';
            document.getElementById('text').style.height = document.getElementById('text').scrollHeight + 'px';
        },
        // 投稿ボタンをアクティブにするか判定
        checkSubmitButton() {
            if ((this.name !== '') && (this.text !== '')) {
                document.getElementsByClassName('submit')[0].style.background = '#dcc1ff';
            } else {
                document.getElementsByClassName('submit')[0].style.background = '#c1ccff';
            }
        },
        // APIにリクエストを送る
        submit() {
            if (this.isSubmit === false) {
                this.isSubmit = true;

                // 値入っているかチェック
                if (!(this.name !== '') || !(this.text !== '')) {
                    this.isSubmit = false;
                    return;
                }

                // バリデートチェック
                if ((this.name.length > 15) || (this.text.length > 3000)) {
                    this.isSubmit = false;
                    return;
                }

                // APIへのリクエスト発行
                axios.put('/api/comment' + location.pathname, {
                    name: this.name,
                    body: this.text,
                    image: this.imageURL
                }).then((response) => {
                    if (response.data.result) {
                        this.isSuccess = true;
                        this.$emit('writeComment');
                    } else {
                        this.isSubmit = false;
                    }
                }).catch(() => {
                    this.isSubmit = false;
                });
            }
        }
    },
    watch: {
        name() {
            // 投稿ボタンをアクティブにするか判定
            this.checkSubmitButton();
        },
        text() {
            // textarea の高さを調節する
            this.resize();
            // 投稿ボタンをアクティブにするか判定
            this.checkSubmitButton();
        }
    },
    directives: {
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
    }
}
</script>

<style lang="scss" scoped>
button, input, textarea {
    font-family : inherit;
    font-size : 100%;
    outline: none;
}

.fade-enter-active, .fade-leave-active {
    transition: opacity 0.2s ease;
}
.fade-enter, .fade-leave-to {
    opacity: 0;
}

.write-comment {
    $margin-size: 10px;

    background-color: rgba(#FFFFFF, 0.8);
    border: 3px solid rgb(120, 120, 235);
    border-radius: 8px;
    box-sizing: border-box;
    padding: 20px;
    margin: $margin-size 0px;

    .section-top {
        display: inline-block;
        border-bottom: 2px dashed rgb(137, 137, 223);
        padding: 10px 0px;
        margin-bottom: 15px;
        font-size: 18px;
        width: 90%;
    }

    .thanks {
        border-radius: 2px;
    }

    .wrapper {
        width: 100%;

        .icon {
            display: inline-block;
            vertical-align: top;
            margin: $margin-size;
            position: relative;
            cursor: pointer;

            .window-enter-active, .window-leave-active {
                transition: opacity 0.1s;
            }

            .window-enter, .window-leave-to {
                opacity: 0;
            }

            .image-window {
                position: absolute;
                top: -270px;
                left: -40px;
                width: 190px;
                height: 250px;
                background: #CCE;
                border-radius: 4px;
                cursor: default;
                margin: 5px;

                .image-container {
                    width: 180px;
                    height: 240px;
                    text-align: left;
                    overflow: scroll;
                    margin: 5px 0px 0px 5px;

                    img {
                        margin: 2.5px;
                        width: 55px;
                        height: 55px;
                        border-radius: 4px;
                        cursor: pointer;
                    }
                }
            }

            .image-window-allow {
                content: "";
                position: absolute;
                margin-top: -15px;
                margin-left: 50px;
                border: 10px solid transparent;
                border-top: 10px solid #CCE;
            }

            .icon-image {
                display: inline-block;
                width: 120px;
                height: 120px;
                cursor: pointer;
                border-radius: 8px;

                &:hover {
                    animation: focusImage 1s ease-in-out 0s infinite;
                }

                @keyframes focusImage {
                    0% {
                        transform: rotate(0deg);
                    }
                    25% {
                        transform: rotate(4deg);
                    }
                    75% {
                        transform: rotate(-4deg);
                    }
                    100% {
                        transform: rotate(0deg);
                    }
                }
            }
        }

        .body {
            display: inline-block;
            vertical-align: top;
            max-width: 500px;
            background: rgb(223, 229, 255);
            position: relative;
            border-radius: 4px;
            box-sizing: border-box;

            @media only screen and (max-width:550px) {
                width: 95%;
                &::before {
                    content: "";
                    position: absolute;
                    left: 47%;
                    margin-top: -20px;
                    border: 10px solid transparent;
                    border-bottom: 10px solid rgb(223, 229, 255);
                    box-sizing: border-box;
                }
            }

            @media only screen and (min-width:551px) {
                width: 70%;
                &::before {
                    content: "";
                    position: absolute;
                    top: 30px;
                    margin-left: -20px;
                    border: 10px solid transparent;
                    border-right: 10px solid rgb(223, 229, 255);
                    box-sizing: border-box;
                }
            }

            #name, #text {
                width: calc(100% - #{$margin-size * 2});
                box-sizing: border-box;
                margin: $margin-size;
                color: #505050;
                border: none;
                border-radius: 4px;
                background-color: rgb(245, 246, 255);
                padding: $margin-size;
                resize: none;

                &:focus {
                    animation: focusScale1 0.3s ease;
                }
            }

            #text {
                overflow: hidden;
            }

            #url {
                display: none;
            }

            @keyframes focusScale1 {
                0% {
                    transform: scale(1.0);
                }
                50% {
                    transform: scale(1.05);
                }
                100% {
                    transform: scale(1.0);
                }
            }

            .submit {
                padding: 10px 30px;
                cursor: pointer;
                border: none;
                border-radius: 8px;
                display: block;
                margin: $margin-size auto;
                background-color: #c1ccff;

                transition: all 0.3s ease;
                &:focus, &:hover {
                    animation: focusScale2 0.3s ease;
                }
                &:active {
                    animation: buttonActive 0.2s ease;
                }
            }

            @keyframes focusScale2 {
                0% {
                    transform: scale(1.0);
                }
                50% {
                    transform: scale(1.15);
                }
                100% {
                    transform: scale(1.0);
                }
            }

            @keyframes buttonActive {
                0% {
                    transform: scale(1.0);
                }
                50% {
                    transform: scale(1.15);
                }
                100% {
                    transform: scale(1.0);
                }
            }
        }
    }
}
</style>
