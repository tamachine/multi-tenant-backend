selectable = function(config) {
    return {
        data: config.data,    
        
        openDropdown: false,
        
        options: {},    

        value: config.value,            

        focusedOptionIndex: null,

        init: function () {
            this.options = this.data

            if (!(this.value in this.options)) this.value = null     
            
            this.focusedOptionIndex = Object.keys(this.options).indexOf(this.value)                    
        },

        selectOption: function () {
            if (!this.openDropdown) return this.toggleListboxVisibility()

            this.value = Object.keys(this.options)[this.focusedOptionIndex]   
            
            this.$refs.inputSelectedValue.value = this.value
            
            this.showOption()

            this.closeListbox()                
        },    

        showOption: function() {
            this.$refs.showSelectedOption.innerHTML = Object.values(this.options)[this.focusedOptionIndex];
        },                    
        
        toggleListboxVisibility: function () {     
                    
            if (this.openDropdown) return this.closeListbox()

            this.focusedOptionIndex = Object.keys(this.options).indexOf(this.value)

            if (this.focusedOptionIndex < 0) this.focusedOptionIndex = 0

            this.openDropdown = true
            
            this.$nextTick(() => {                    
                this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
                    block: "center"
                })
            })
        },

        closeListbox: function () {
            this.openDropdown = false

            this.focusedOptionIndex = null
        },
    }
}  
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
