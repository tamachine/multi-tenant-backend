copyToClipboard = function (config) {
    return {
        text: config.text,        

        initialText: config.text,

        click: function() {
            this.text = 'Copied!'
            
            setInterval(() => {
                this.text = this.initialText
            }, 3000);
        },
    }
}