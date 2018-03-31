// 全コンポーネントの状態を一元管理するデータストア
const store = {
    state: {
        isTitle: true
    },
    setIsTitle (value) {
        this.state.isTitle = value;
    }
};