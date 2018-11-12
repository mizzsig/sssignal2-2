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
                        <div v-bind:class="{ 'serif-notadmin': !comment.isAdmin, 'serif-admin': comment.isAdmin }">
                            <div class="name" v-bind:class="{ 'name-notadmin': !comment.isAdmin, 'name-admin': comment.isAdmin }">
                                {{ comment.name }}
                            </div>
                            <div class="comment-body" v-html="comment.body">
                            </div>
                            <div class="comment-date">
                                {{ comment.date }}
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
        image.src = '/images/comment/no_comment.png';

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

        .serif-notadmin {
            display: inline-block;
            position: relative;
            border-radius: 4px;
            vertical-align: top;
            padding: $margin-size;
            margin-bottom: $margin-size;
            text-align: left;
            word-break: break-all;
            background: rgb(255, 223, 229);

            @media only screen and (max-width: 550px) {
                width: calc(100% - 15px);
                &::before {
                    content: "";
                    position: absolute;
                    left: 47%;
                    margin-top: -30px;
                    border: 10px solid transparent;
                    border-bottom: 10px solid rgb(255, 223, 229);
                    box-sizing: border-box;
                }
            }

            @media only screen and (min-width: 551px) {
                max-width: calc(100% - 160px);
                margin-top: $margin-size;
                &::before {
                    content: "";
                    position: absolute;
                    top: 30px;
                    margin-left: -30px;
                    border: 10px solid transparent;
                    border-right: 10px solid rgb(255, 223, 229);
                    box-sizing: border-box;
                }
            }
        }

        .serif-admin {
            display: inline-block;
            position: relative;
            border-radius: 4px;
            vertical-align: top;
            padding: $margin-size;
            margin-bottom: $margin-size;
            text-align: left;
            word-break: break-all;
            background: rgb(223, 229, 255);

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
                max-width: calc(100% - 160px);
                margin-top: $margin-size;
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
        }

        .name-notadmin {
            background: rgb(252, 201, 201);
            border-bottom: 2px solid rgb(223, 137, 137);
        }

        .name-admin {
            background: rgb(201, 201, 252);
            border-bottom: 2px solid rgb(137, 137, 223);
        }

        .name {
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

        .comment-date {
            font-size: 12px;
            padding: 5px $margin-size 0px $margin-size;
            opacity: 0.5;
        }
    }
}
</style>
