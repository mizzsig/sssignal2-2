<template>
    <transition name="anime">
        <div class="wrapper" v-if="!state.isTitle && !state.isEnd">
            <character ref="character" />
            <characterEnemy ref="characterEnemy" />
            <status @reset="resetBackgroundImage" ref="status" />
            <info ref="info" />
        </div>
    </transition>
</template>

<script>
import anime from 'animejs';

export default {
    name: 'stage',
    data() {
        return {
            state: store.state,
            randomEvent: 0,
            battleTimer: null,
            walkingTimer: null,
            backgroundImg: null,

            battleMoveFlag: 5,
        }
    },
    methods: {
        meInit() {
            setTimeout(() => {
                this.$refs.status.meInit();
            }, 0);
        },
        resetBackgroundImage() {
            this.$emit('bgimageFromChild', '');
        },
        startWalking(message) {
            // $refsはrenderされるまで参照ができないらしいので、その対策 https://jp.vuejs.org/v2/api/index.html#ref
            setTimeout(() => {
                this.$refs.info.flowMessage(message);
            }, 0);

            // メインの歩く処理、１歩歩くたびに確率でイベントが起きる
            this.walkingTimer = setInterval(() => {
                // 歩数を進める
                this.$refs.info.steps++;
                this.state.steps = this.$refs.info.steps;

                // 歩数に応じて背景を変える
                if ((this.$refs.info.steps % 100) == 0) {
                    switch ((this.$refs.info.steps / 100) % 3) {
                        case 0:
                            this.backgroundImg = this.state.images.sougen.src;
                            break;
                        case 1:
                            this.backgroundImg = this.state.images.machi.src;
                            break;
                        case 2:
                            this.backgroundImg = this.state.images.night.src;
                            break;
                    }
                    this.$emit('bgimageFromChild', this.backgroundImg);
                }

                // 確率で発生するイベント
                this.randomEvent = (this.randomEvent + Math.floor(Math.random() * 300)) % 100;
                if (this.randomEvent < 30) {
                } else if (this.randomEvent < 50) {
                } else if (this.randomEvent < 80) {
                    // どっちの道に進むかイベント
                } else if (this.randomEvent < 90) {
                    // 回復するかもしれないイベント
                } else if (this.randomEvent < 100) {
                    clearInterval(this.walkingTimer);
                    // 戦い用のタイマーを起動する
                    this.startBattle();
                }
            }, 500);
        },
        startBattle() {
            // 敵ステータスの初期化
            let enemy = this.$refs.status.enemyInit(Math.floor(this.$refs.info.steps / 100) % 3);
            this.$refs.characterEnemy.character_image = enemy.waitImage.src;
            this.$refs.info.flowMessage('あれは ' + enemy.name + ' わん！');

            // 戦いの最初はちょっと待つ
            let battlePromise = new Promise((resolve, reject) => {
                setTimeout(resolve, 600);
                this.state.isBattle = true;
            });
            
            let stage = this;
            battlePromise.then(function myAttack(resolve) {
                // 自分の攻撃
                // 攻撃用画像に切り替え
                stage.$refs.character.character_image = store.state.images.wanko_attack.src;
                // this.$refs.characterEnemy.character_image = store.state.images.tentou_damage.src;

                stage.$refs.status.enemyHpNowBack -= Math.floor((Math.random() * 5) + 3);

                let myEffect = anime({
                    targets: '.characterEnemy',
                    translateX: stage.battleMoveFlag,
                    duration: 1000,
                    elasticity: 100000,
                });

                // 敵が倒れてないなら戦いを続ける
                if (stage.$refs.status.enemyHpNowBack > 0) {
                    return myEffect.finished.then(function enemyAttack(resolve) {
                        // 相手の攻撃
                        stage.battleMoveFlag *= -1;
                        stage.$refs.character.character_image = store.state.images.wanko_damage.src;
                        // this.$refs.characterEnemy.character_image = store.state.images.tentou_attack.src;
                        
                        stage.$refs.status.hpNowBack -= Math.floor((Math.random() * 5) + 3);

                        // 相手の攻撃
                        let enemyEffect = anime({
                            targets: '.character',
                            translateX: stage.battleMoveFlag,
                            duration: 1000,
                            elasticity: 100000,
                        });

                        // 自分がやられてたらゲーム終了
                        if (stage.$refs.status.hpNowBack <= 0) {
                            return;
                        }

                        // 自分がやられてなければ続ける
                        return enemyEffect.finished.then(myAttack);
                    });
                } else {
                    // 戦いが終わった
                    // 勝った時は歩いていく
                    stage.$refs.status.expNowBack += 5;
                    stage.$refs.status.enemyHpNowBack = 0;
                    stage.state.isBattle = false;
                    stage.startWalking(enemy.name + 'は逃げ出しわん！！！');

                    return myEffect.finished.then(() => {
                        // 勝った時は画像を戻す
                        stage.$refs.character.character_image = store.state.images.wanko_wait.src;
                    });
                }
            });
        }
    }
}
</script>

<style lang="scss" scoped>
.anime-enter-active {
    transition: all 0.3s;
}

.anime-enter {
    opacity: 0;
}
</style>
