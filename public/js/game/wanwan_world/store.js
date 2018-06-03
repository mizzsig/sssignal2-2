// 全コンポーネントの状態を一元管理するデータストア
var store = {
    state: {
        isTitle: true,
        isBattle: false,
        isEnd: false,
        steps: 0,
        images: [],
    },
    setIsTitle (value) {
        this.state.isTitle = value;
    }
};