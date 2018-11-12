<template>
    <div class="comment">
        <writeComment @writeComment="writeComment" />
        <showComment ref="showComment" />
    </div>
</template>

<script>
export default {
    methods: {
        // コメント投稿が完了したら、再度一覧を取得させる
        writeComment() {
            this.$refs.showComment.getAllComment();
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
