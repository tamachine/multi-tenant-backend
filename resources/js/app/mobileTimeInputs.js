function mobileTimeInputs() {    

    return {
        startTime: '12:00 AM',

        endTime: '12:00 AM',

        startHour: '12:00',
        
        startMeridian: 'AM',

        endHour: '12:00',
        
        endMeridian: 'AM',

        init: function() {
            const urlStartTime = getUrlParams().get('hours[start]')
            const urlEndTime   = getUrlParams().get('hours[end]')

            if(getTimesKeyByValue(urlStartTime) != null) this.startTime = urlStartTime

            if(getTimesKeyByValue(urlEndTime) != null) this.endTime = urlEndTime

            this.setHoursAndMeridians()
            
        },        

        setHoursAndMeridians: function() {
            this.startHour = this.startTime.split(" ")[0]
            this.endtHour  = this.endTime.split(" ")[0]

            this.startMeridian = this.startTime.split(" ")[1]
            this.endMeridian   = this.endTime.split(" ")[1]
        }
    }
}
