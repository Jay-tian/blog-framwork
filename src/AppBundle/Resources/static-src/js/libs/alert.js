class Alert {
    constructor(setting){
        this.default = {
            level: success,
            message: '发生异常',
            time: 1000,
        };

        this.setting = Object.assign(this.default, setting);
    }

    show() {
        let template = ``;
    }
}

export default Alert;