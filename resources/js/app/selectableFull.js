selectableFull = function(config) {
    return {
        show: false,

        value: config.value,

        title: config.title,

        selectedTitle: config.title,

        allValue: config.allValue,

        clickItem: function(selectableFullItem) {                
            this.value = selectableFullItem.value
            this.selectedTitle = (this.value == this.allValue) ? this.title : selectableFullItem.text
            this.toggleVisibility()

        },

        toggleVisibility: function() {
            this.show = !this.show
        }
    }
}