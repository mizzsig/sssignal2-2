<template>
    <div class="show-comment" v-resize="resize">
        <div class="section-top">
            コメント一覧
        </div>
        <!-- 下のやつをforで回す -->
        <div class="comment">
            <img class="icon" src="/images/game/wanwan_world/wanko.png">
            <div class="serif">
                <div class="name-date">
                    ななし
                </div>
                <div class="comment-body">
                    また 髪の話　してる・・・
                </div>
            </div>
        </div>
        <div class="comment">
            <img class="icon" src="/images/game/wanwan_world/wanko.png">
            <div class="serif">
                <div class="name-date">
                    mizzsig@管理人
                </div>
                <div class="comment-body">
                    わたしが髪です
                </div>
            </div>
        </div>
        <div class="comment">
            <img class="icon" src="/images/game/wanwan_world/wanko.png">
            <div class="serif">
                <div class="name-date">
                    ななし
                </div>
                <div class="comment-body">
                    arisan tokotoko tokotoko arisan tokotoko tokotoko arisan tokotoko tokotoko arisan tokotoko tokotoko
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => {

    },
    // インスタンス作成後
    created() {
        this.getAllComment();
    },
    // DOM要素作成完了後
    mounted() {
        this.resize();
    },
    methods: {
        // コメントを取得する
        getAllComment() {

        },
        // コメント吹き出しの横幅を調整する
        resize(event) {
            let width = document.getElementsByClassName('show-comment')[0].clientWidth;
            let serifs = document.getElementsByClassName('serif');

            for (let i = 0; i < serifs.length; i++) {
                if (document.documentElement.clientWidth > 550) {
                    serifs[i].style.maxWidth = width - 230 + 'px';
                } else {
                    serifs[i].style.maxWidth = '';
                }
            }
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
.show-comment {
    $margin-size: 10px;

    background-color: rgba(#FFFFFF, 0.8);
    border: 3px solid rgb(120, 120, 235);
    border-radius: 8px;
    box-sizing: border-box;
    padding: 20px 20px 0px 20px;
    margin: $margin-size 0px;

    .section-top {
        display: inline-block;
        border-bottom: 2px dashed rgb(137, 137, 223);
        padding: 10px 0px;
        margin-bottom: 15px;
        font-size: 18px;
        width: 90%;
    }

    .comment {
        margin: 10px;

        @media only screen and (min-width:551px) {
            text-align: left;
        }

        .icon {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            margin: 10px;

            @media only screen and (max-width: 550px) {
                display: block;
                margin: 10px auto 15px auto;
            }

            @media only screen and (min-width: 551px) {
                display: inline-block;
            }
        }

        .serif {
            display: inline-block;
            background: rgb(223, 229, 255);
            position: relative;
            border-radius: 4px;
            vertical-align: top;
            padding: $margin-size;
            margin-bottom: $margin-size;

            @media only screen and (max-width: 550px) {
                &::before {
                    content: "";
                    position: absolute;
                    left: 47%;
                    margin-top: -30px;
                    border: 10px solid transparent;
                    border-bottom: 10px solid rgb(223, 229, 255);
                    box-sizing: border-box;
                }
            }

            @media only screen and (min-width: 551px) {
                &::before {
                    content: "";
                    position: absolute;
                    top: 30px;
                    margin-left: -30px;
                    border: 10px solid transparent;
                    border-right: 10px solid rgb(223, 229, 255);
                    box-sizing: border-box;
                }
            }

            .name-date {
                background: rgb(201, 201, 252);
                border-bottom: 2px solid rgb(137, 137, 223);
                border-radius: 4px;
                padding: 5px 10px;
                position: absolute;
                top: -10px;
                left: -10px;
            }

            .comment-body {
                margin-top: 15px;
                padding: $margin-size;
                word-wrap: break-word;
            }
        }
    }
}
</style>
