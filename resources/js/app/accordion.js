function accordion(config) {
    return { 
        open: false,

        showPlus: true,

        showMinus: false,       
        
        group : null,

        init() {
            this.group = config.group
        },

        click() {
            this.open = !this.open                
            
            this.toggleIcon()
        },    

        plusClick() { 
            if(this.group) this.$dispatch('close-accordion-'+this.group) //close all other accordions in the group
        },
        
        close() {
            this.open = false

            this.toggleIcon()
        },

        toggleIcon() {
            setTimeout(
                () => {
                    
                    this.showMinus = this.open
                
                    this.showPlus  = !this.open
                    
                }                        
            , 300
            )
        }
    }
}