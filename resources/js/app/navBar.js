navBar = function () {
    return {
        show: false,

        lastScrollPos: 0, 
        
        scrolledUp: false,     
        
        atTop: false, 

        disableTransition: false,        

        init: function() {
            this.setAtTop();

            this.scrollEvent();
        },

        scrollEvent: function() {
            window.addEventListener('scroll', () => { 
                this.disableTransition = false;
                
                this.scrollDetection();
                
                this.setAtTop();                
            });
        },

        scrollDetection: function() {
            this.scrolledUp = window.scrollY < this.lastScrollPos;
            this.lastScrollPos = window.scrollY;
        },

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
        },

        navbarVisibility: function() {
            return (this.atTop || this.scrolledUp) && (!this.disableTransition);
        },

        clickAway: function() {                        
            if(!isMobile) this.disableTransition = !this.atTop;            
        },

        setAtTop: function() {
            this.atTop = (window.scrollY === 0);
        },

        scrollingUp: function() {
            return this.scrolledUp && !this.disableTransition && !this.atTop;
        }
    };
}
