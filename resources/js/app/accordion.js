function accordion() {
    return { 
        open: false,

        showPlus: true,

        showMinus: false,

        onClick() {
            this.open = !this.open
            
            setTimeout(
                () => {
                    
                    this.showMinus = this.open
                
                    this.showPlus  = !this.open
                    
                }                        
            , 300
            )
        },           
    }
}