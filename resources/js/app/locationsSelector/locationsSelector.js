function locationsSelector(config) {

    return {
        
        selectedLocations: {'pickup': null, 'dropoff': null},  
        
        pickupInput: null,

        dropoffInput: null,

        init : function() {
            this.sameLocation = config.sameLocation,
            this.locations    = JSON.parse(config.locations)

            this.pickupInput  = document.getElementById('pickup-location')
            this.dropoffInput = document.getElementById('return-location')
        },

        toggleLocations: function () {      

            this.sameLocation = !this.sameLocation      
            
            if(this.sameLocation) this.equalizeLocations()
            
        },

        locationSelected: function(type, location) {            
            this.selectedLocations[type] = location;

            if (this.sameLocation && type == 'pickup') {
                this.selectedLocations['dropoff'] = location;    
            } 
            
            this.setValuesToInputs()

            this.setInputsActive()
        },

        equalizeLocations: function() {
            this.selectedLocations['dropoff'] = this.selectedLocations['pickup'];

            this.setValuesToInputs()
        },

        setValuesToInputs: function() {                        
            this.pickupInput.value  = this.locations[this.selectedLocations['pickup']]
            this.dropoffInput.value = this.locations[this.selectedLocations['dropoff']]            
        },

        setInputsActive: function() {
            const inputs       = document.getElementsByClassName('search-input-set')
            const inputsParent = document.getElementById('location-inputs')

            if(this.selectedLocations['pickup']) {
                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].classList.add('active')
                }
                inputsParent.classList.add('active')
            } else{
                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].classList.remove('active')
                }
                inputsParent.classList.remove('active')
            }
        }        
    }
}