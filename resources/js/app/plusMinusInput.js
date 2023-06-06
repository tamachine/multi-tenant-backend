/**
 * Manages the plus-minus-input
 * Optional params for config:
 *  int minimum  -> minimum number accepted
 *  int starting -> number where the input will start
 */

plusMinusInput = function (config) {
    return {

        number: 0,

        minimum: 0,

        starting: 0,

        minusDisabled: true,

        init: function() {
            
            if (config !== undefined && config.minimum !== undefined) {  
                this.minimum = config.minimum;                
            }

            if (config !== undefined && config.starting !== undefined) {  
                this.starting = config.starting;                            
            }
            
            this.number = this.starting;
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
