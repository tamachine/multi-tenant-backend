function locationsSelector(config) {

    return {
        
        selectedLocations: {'pickup': null, 'dropoff': null},        

        init : function() {
            this.sameLocation = config.sameLocation,
            this.locations    = JSON.parse(config.locations)
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
        },

        equalizeLocations: function() {
            this.selectedLocations['dropoff'] = this.selectedLocations['pickup'];

            this.setValuesToInputs()
        },

        setValuesToInputs: function() {            

            const pickupInput  = document.getElementById('pickup-location')
            const dropoffInput = document.getElementById('return-location')

            pickupInput.value  = this.locations[this.selectedLocations['pickup']]
            dropoffInput.value = this.locations[this.selectedLocations['dropoff']]
            
        }
    }
}