<template>
    <div class="wrapper">
        <div id="hp">
            <div class="inline-block" style="width:35px">HP</div>
            <svg class="inline-block">
                <rect class="bar-status max" width="100" height="20" rx="3" ry="3"></rect>
                <rect class="bar-status now" id="hp-now" :width="50" height="20" rx="3" ry="3"></rect>
            </svg>
            <div class="inline-block">{{ now }} / {{ max }}</div>
        </div>
        <div>
            <div class="inline-block" style="width:35px">EXP</div>
            <svg class="inline-block">
                <rect class="bar-status max" width="100" height="20" rx="3" ry="3"></rect>
                <rect class="bar-status now" id="exp-now" :width="50" height="20" rx="3" ry="3"></rect>
            </svg>
            <div class="inline-block">50 / 100</div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'status',
    data: function() {
        return {
            state: store.state
        }
    },
}
</script>

<style lang="scss" scoped>
.wrapper {
    position: fixed;
    bottom: 30px;
    left: 30px;
}

svg {
    width: 200px;
    height: 20px;

    .max {
        fill: #666666;
    }
    .now {
        fill: #00AA00;
    }
}

.bar-status {
    width: 300px;
}
</style>
