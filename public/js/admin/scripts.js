copyToClipboard = function () {
    return {
        text: 'Copy url to clipboard',        

        click: function() {
            this.text = 'Copied!'
            
            setInterval(() => {
                this.text = 'Copy to clipboard'
            }, 3000);
        },
    }
}