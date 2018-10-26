<template>
    <div class="show-comment">
        <div class="section-top">
            コメント一覧
        </div>
        <transition name="fade" mode="out-in">
            <div v-if="comments.length > 0" key="comment">
                <transition-group name="fade" tag="div">
                    <div class="comment" v-for="comment in comments" :key="comment.id">
                        <img class="icon" :src="comment.image">
                        <div class="serif">
                            <div class="name-date">
                                {{ comment.name }}
                            </div>
                            <div class="comment-body" v-html="comment.body">
                            </div>
                        </div>
                    </div>
                </transition-group>
            </div>
            <div v-if="firstLoad && (comments.length === 0)" key="noComment">
                <img class="no-comment" :src="noCommentURL">
            </div>
        </transition>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data: () => {
        return {
            noCommentURL: '',
            comments: [],
            firstLoad: false
        }
    },
    created() {
        let image = new Image();
        image.src = '/images/comments/no_comment.png';

        this.noCommentURL = image.src;
    },
    // DOM要素作成完了後
    mounted() {
        this.getAllComment();
    },
    methods: {
        // コメントを取得する
        getAllComment() {
            axios.get(location.protocol + '//' + location.host + '/api/comment' + location.pathname)
                .then(response => {
                    this.comments = response.data;
                    this.firstLoad = true;
                });
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

    .no-comment {
        border-radius: 2px;
        margin-bottom: 15px;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity 0.2s ease;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
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
            margin-right: 15px;

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
            text-align: left;
            word-break: break-all;

            @media only screen and (max-width: 550px) {
                width: calc(100% - 15px);
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
                width: 100%;
                max-width: calc(100% - 160px);
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
