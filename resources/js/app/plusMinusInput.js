/**
 * Manages the plus-minus-input
 * Optional params for config:
 *  int minimum  -> minimum number accepted
 *  int starting -> number where the input will start
 *  string livewireListener -> the livewire listener to update the number
 */

plusMinusInput = function (config) {
    return {

        number: 0,

        minimum: 0,

        starting: 0,

        minusDisabled: true,

        livewireListener: 'update_number',

        init: function() {
            
            if (config !== undefined && config.minimum !== undefined) {  
                this.minimum = config.minimum;                
            }

            if (config !== undefined && config.starting !== undefined) {  
                this.starting = config.starting;                            
            }

            if (config !== undefined && config.livewireListener !== undefined) {  
                this.livewireListener = config.livewireListener;                            
            }
            
            this.number = this.starting;
        },

        plus: function() {            
            this.number++;
            this.buttonDisabled = false;
            this.update_number_in_livewire();
        },                   

        minus: function() {
            if(this.number > this.minimum) {
                this.number--;
                this.buttonDisabled = false;
                this.update_number_in_livewire();
            } else {
                this.buttonDisabled = true;
            }         
        },

        /**
         * Calls the livewire listener in order to update the number value in livewire
         */
        update_number_in_livewire() {
            Livewire.emit(this.livewireListener, this.number);
        }
    };
}

