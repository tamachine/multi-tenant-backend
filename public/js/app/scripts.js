selectOption = function (config) {
    return {
        selectedOption: config.selectedOption,

        select(option) {
            this.selectedOption = option
        },                
    };
}

visibilitySelector = function () {
    return {
        show: false,

        close: function() {
            this.show = false
        },

        open: function() {
            this.show = true
        },

        toggle: function() {
            this.show = !this.show
        },
        
        visibility: function() {
            return this.show
        }
    };
}
