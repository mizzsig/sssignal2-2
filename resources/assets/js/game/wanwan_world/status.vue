<template>
    <div class="wrapper">
        <div class="width-100per name">{{enemyName}}</div>
        <div id="hp" class="width-100per" style="margin-bottom:30px;">
            <div class="inline-block" style="width:35px">HP</div>
            <svg class="inline-block" :viewBox="enemyHpViewBox">
                <rect class="bar-status max" :width="enemyHpMax" :height="enemyHpViewBoxHeight" :rx="enemyHpRadius" :ry="enemyHpRadius"></rect>
                <rect class="bar-status now" id="hp-now" :width="enemyHpNow" :height="enemyHpViewBoxHeight" :rx="enemyHpRadius" :ry="enemyHpRadius"></rect>
                <text :x="enemyHpMax / 2" :y="enemyHpViewBoxHeight * 0.8" text-anchor="middle" :font-size="enemyHpViewBoxHeight * 0.8">{{ enemyHpNow }} / {{ enemyHpMax }}</text>
            </svg>
        </div>
        <div class="width-100per name">わんこ Lv:{{level}}</div>
        <div id="hp" class="width-100per">
            <div class="inline-block" style="width:35px">HP</div>
            <svg class="inline-block" :viewBox="hpViewBox">
                <rect class="bar-status max" :width="hpMax" :height="hpViewBoxHeight" :rx="hpRadius" :ry="hpRadius"></rect>
                <rect class="bar-status now" id="hp-now" :width="hpNow" :height="hpViewBoxHeight" :rx="hpRadius" :ry="hpRadius"></rect>
                <text :x="hpMax / 2" :y="hpViewBoxHeight * 0.8" text-anchor="middle" :font-size="hpViewBoxHeight * 0.8">{{ hpNow }} / {{ hpMax }}</text>
            </svg>
        </div>
        <div id="exp" class="width-100per">
            <div class="inline-block" style="width:35px">EXP</div>
            <svg class="inline-block" :viewBox="expViewBox">
                <rect class="bar-status max" :width="expMax" :height="expViewBoxHeight" :rx="expRadius" :ry="expRadius"></rect>
                <rect class="bar-status now" id="exp-now" :width="expNow" :height="expViewBoxHeight" :rx="expRadius" :ry="expRadius"></rect>
                <text :x="expMax / 2" :y="expViewBoxHeight * 0.8" text-anchor="middle" :font-size="expViewBoxHeight * 0.8">{{ expNow }} / {{ expMax }}</text>
            </svg>
        </div>
    </div>
</template>

<script>
export default {
    name: 'status',
    data: function() {
        return {
            state: store.state,
            // 自分
            hpMax: 500,
            hpNow: 200,
            expMax: 400,
            expNow: 200,
            level: 1,

            // 敵
            enemyName: 'てんとう',
            enemyHpMax: 100,
            enemyHpNow: 76,
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
    bottom: 30px;
    left: 30px;
    width: 100%;
    max-width: 450px;

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
</style>
