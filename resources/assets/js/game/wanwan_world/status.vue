<template>
    <div class="wrapper">
        <transition name="enemy-anime">
            <div class="enemy" v-show="state.isBattle">
                <div class="width-100per name">{{enemyName}}</div>
                <div id="hp" class="width-100per">
                    <div class="inline-block" style="width:35px">HP</div>
                    <svg class="inline-block" :viewBox="enemyHpViewBox">
                        <rect class="bar-status max" :width="enemyHpMax" :height="enemyHpViewBoxHeight" :rx="enemyHpRadius" :ry="enemyHpRadius"></rect>
                        <rect class="bar-status now" id="hp-now" :width="enemyHpNow" :height="enemyHpViewBoxHeight" :rx="enemyHpRadius" :ry="enemyHpRadius"></rect>
                        <text :x="enemyHpMax / 2" :y="enemyHpViewBoxHeight * 0.8" text-anchor="middle" :font-size="enemyHpViewBoxHeight * 0.8">{{ enemyHpNow.toFixed() }} / {{ enemyHpMax }}</text>
                    </svg>
                </div>
            </div>
        </transition>
        <div class="mine">
            <div class="width-100per name">わんこ Lv:{{level}}</div>
            <div id="hp" class="width-100per">
                <div class="inline-block" style="width:35px">HP</div>
                <svg class="inline-block" :viewBox="hpViewBox">
                    <rect class="bar-status max" :width="hpMax" :height="hpViewBoxHeight" :rx="hpRadius" :ry="hpRadius"></rect>
                    <rect class="bar-status now" id="hp-now" :width="hpNow" :height="hpViewBoxHeight" :rx="hpRadius" :ry="hpRadius"></rect>
                    <text :x="hpMax / 2" :y="hpViewBoxHeight * 0.8" text-anchor="middle" :font-size="hpViewBoxHeight * 0.8">{{ hpNow.toFixed() }} / {{ hpMax }}</text>
                </svg>
            </div>
            <div id="exp" class="width-100per">
                <div class="inline-block" style="width:35px">EXP</div>
                <svg class="inline-block" :viewBox="expViewBox">
                    <rect class="bar-status max" :width="expMax" :height="expViewBoxHeight" :rx="expRadius" :ry="expRadius"></rect>
                    <rect class="bar-status now" id="exp-now" :width="expNow" :height="expViewBoxHeight" :rx="expRadius" :ry="expRadius"></rect>
                    <text :x="expMax / 2" :y="expViewBoxHeight * 0.8" text-anchor="middle" :font-size="expViewBoxHeight * 0.8">{{ expNow.toFixed() }} / {{ expMax }}</text>
                </svg>
            </div>
        </div>
    </div>
</template>

<script>
import {TweenLite} from 'gsap';

export default {
    name: 'status',
    data: function() {
        return {
            state: store.state,
            // 自分
            hpMax: 200,
            hpNow: 200,
            hpNowBack: 200,
            expMax: 10,
            expNow: 0,
            expNowBack: 0,
            level: 1,

            // 敵
            enemyName: '',
            enemyHpMax: 10,
            enemyHpNow: 10,
            enemyHpNowBack: 10,
            enemies: [
                [
                    {
                        name : 'あり',
                        waitImage : store.state.images.ari_wait
                    },
                    {
                        name : 'てんとう',
                        waitImage : store.state.images.tentou_wait
                    },
                    {
                        name : 'ざっそう',
                        waitImage : store.state.images.zassou_wait
                    }
                ],
                [
                    {
                        name : 'こいのぼり',
                        waitImage : store.state.images.koinobori_wait
                    },
                    {
                        name : 'ちょうちょ',
                        waitImage : store.state.images.tyoutyo_wait
                    },
                    {
                        name : 'かんかん',
                        waitImage : store.state.images.kankan_wait
                    }
                ],
                [
                    {
                        name : 'がいとう！',
                        waitImage : store.state.images.gaitou_wait
                    },
                    {
                        name : 'こうもり',
                        waitImage : store.state.images.koumori_wait
                    },
                    {
                        name : 'にゃーこ',
                        waitImage : store.state.images.nyako_wait
                    }
                ]
            ]
        }
    },
    methods: {
        /**
         * 戦いが始まる時に呼ばれて、敵のステータスを初期化する
         * @param  int  stage  0:草むら  1:昼の町  2:夜の町
         * @return void
         */
        enemyInit: function(stage) {
            let random = Math.round(Math.random() * 3 + 0.5);
            this.enemyHpMax = 10;
            this.enemyHpNow = 10;
            this.enemyHpNowBack = 10;

            this.enemyName = this.enemies[stage][random - 1].name;
            return this.enemies[stage][random - 1];
        },
        meInit: function() {
            this.hpMax = 140;
            this.hpNow = 140;
            this.hpNowBack = 140;
            this.expMax = 10;
            this.expNow = 0;
            this.expNowBack = 0;
            this.level = 1;
        }
    },
    watch: {
        hpNowBack (newValue) {
            TweenLite.to(this.$data, 0.5, { hpNow: newValue});
        },
        hpNow (newValue) {
            if (newValue <= 0) {
                this.state.isBattle = false;
                this.state.isEnd = true;
                this.$emit('reset', '');
            }
        },
        expNowBack (newValue) {
            TweenLite.to(this.$data, 0.5, { expNow: newValue});
        },
        expNow (newValue) {
            // レベルアップ時の処理
            if (newValue >= this.expMax) {
                this.expNow = 0;
                this.expNowBack -= this.expMax;
                this.expMax += 10;
                this.hpMax += 20;
                this.hpNowBack += 20;
                this.level++;
            }
        },
        enemyHpNowBack (newValue) {
            TweenLite.to(this.$data, 0.5, { enemyHpNow: newValue});
        }
    },
    computed: {
        // 自分
        hpViewBox: function() {
            return '0 0 ' + this.hpMax + ' ' + this.hpViewBoxHeight;
        },
        hpViewBoxHeight: function() {
            return this.hpMax * 20 / 400;
        },
        hpRadius: function() {
            return this.hpViewBoxHeight * 0.1;
        },
        expViewBox: function() {
            return '0 0 ' + this.expMax + ' ' + this.expViewBoxHeight;
        },
        expViewBoxHeight: function() {
            return this.expMax * 20 / 400;
        },
        expRadius: function() {
            return this.expViewBoxHeight * 0.1;
        },

        // 敵
        enemyHpViewBox: function() {
            return '0 0 ' + this.enemyHpMax + ' ' + this.enemyHpViewBoxHeight;
        },
        enemyHpViewBoxHeight: function() {
            return this.enemyHpMax * 20 / 400;
        },
        enemyHpRadius: function() {
            return this.enemyHpViewBoxHeight * 0.1;
        },
    }
}
</script>

<style lang="scss" scoped>
.wrapper {
    position: fixed;
    bottom: 10px;
    left: 30px;
    width: 100%;
    max-width: 450px;

    border-radius: 5px;
    background: rgba($color: #FFFFFF, $alpha: 0.6);
    padding: 10px;

    .enemy {
        border-radius: 5px;
        background: rgba($color: #FF0000, $alpha: 0.4);
        padding: 10px;
        margin-bottom: 30px;
    }

    .mine {
        border-radius: 5px;
        background: rgba($color: #0000FF, $alpha: 0.4);
        padding: 10px;
    }

    .width-100per {
        width: 100%;
    }

    .name {
        font-size: 20px;
    }
}

svg {
    width: calc(100% - 80px) !important;
    max-width: 400px;
    max-height: 20px;

    .max {
        fill: #666666;
    }
    .now {
        fill: #00AA00;
    }
}

.enemy-anime-enter-active, .enemy-anime-leave-active {
    transition: opacity 0.6s;
}

.enemy-anime-enter, .enemy-anime-leave-to {
    opacity: 0;
}
</style>
