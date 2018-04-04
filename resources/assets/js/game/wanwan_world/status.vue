<template>
    <div class="wrapper">
        <div id="hp">
            <div class="inline-block">
                <div class="inline-block" style="width:35px">HP</div>
                <div class="inline-block">:</div>
            </div>
            <svg class="inline-block" width="100" height="20" viewBox="0 0 100 20">
                <rect class="bar-status" x1="0" y1="0" :width="100" height="20" rx="3" ry="3" fill="#666666"></rect>
                <rect class="bar-status" id="hp-now" x1="0" y1="0" width="50" height="20" rx="3" ry="3" fill="#00AA00"></rect>
            </svg>
            <div class="inline-block">{{ now }} / {{ max }}</div>
        </div>
        <div>
            <div class="inline-block">
                <div class="inline-block" style="width:35px">EXP</div>
                <div class="inline-block">:</div>
            </div>
            <svg class="inline-block" width="100" height="20" viewBox="0 0 100 20">
                <rect class="bar-status" x1="0" y1="0" :width="100" height="20" rx="3" ry="3" fill="#666666"></rect>
                <rect class="bar-status" id="exp-now" x1="0" y1="0" width="50" height="20" rx="3" ry="3" fill="#00AA00"></rect>
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
</style>
