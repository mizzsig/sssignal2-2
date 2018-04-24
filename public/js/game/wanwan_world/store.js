// 全コンポーネントの状態を一元管理するデータストア
var store = {
    state: {
        isTitle: true,
        images: [],
        imageBase64: []
    },
    setIsTitle (value) {
        this.state.isTitle = value;
    }
};