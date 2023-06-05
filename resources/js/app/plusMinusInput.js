/**
 * Manages the plus-minus-input
 * Optional params for config:
 *  int minimum -> minimum number accepted
 */

plusMinusInput = function (config) {
    return {

        number: 0,

        minimum: 0,

        minusDisabled: true,

        init: function() {
            
            if (config !== undefined && config.minimum !== undefined) {  
                this.minimum = config.minimum;                
            }
            
            this.number = this.minimum;
        },

        plus: function() {            
            this.number++;
            this.buttonDisabled = false;
        },                   

        minus: function() {
            if(this.number > this.minimum) {
                this.number--;
                this.buttonDisabled = false;
            } else {
                this.buttonDisabled = true;
            }         
        }
    };
}
