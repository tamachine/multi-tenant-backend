extraPopup = function () {
    return {
        show: false,

        open: function() {
            this.show = true;
            this.setHtmlOverflowHIdden();
            this.moveToTheTop();
        },                   

        close: function() {
            this.show = false;
            this.setHtmlOverflowHIdden();
        },

        setHtmlOverflowHIdden: function() {
            this.htmlOverflowHidden = this.show;
            
        },

        moveToTheTop: function() {
            window.scrollTo(0, 0);
        },

        visibility: function() {
            return this.show;
        }
    };
}

extraPrice = function () {
    return {
        selected: false,

        toggle: function() {
            this.selected = !this.selected
        },                   
    };
}

initSwiper = function (selector, params) {
    const swiperEl = document.querySelector(selector);

    // now we need to assign all parameters to Swiper element
    Object.assign(swiperEl, params);

    // and now initialize it
    swiperEl.initialize();
}   
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
selectableFull = function(config) {
    return {
        show: false,

        value: config.value,

        title: config.title,

        selectedTitle: config.title,

        allValue: config.allValue,

        isSelected: false,

        clickItem: function(selectableFullItem) {                   
            this.value = selectableFullItem.value
            this.selectedTitle = (this.value == this.allValue) ? this.title : selectableFullItem.text            
            this.toggleVisibility()   
            this.setIsSelected()               
        },

        toggleVisibility: function() {
            this.show = !this.show
        },

        clickAway: function() {
            this.show = false
        },

        setIsSelected: function() {                        
            this.isSelected = (this.value != this.allValue)
        }
        
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
