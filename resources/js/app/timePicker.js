function timePicker(config) {
    return {

        times:[],

        time: '12:00',

        meridian: 'AM',

        inputElementSelector: '',

        inputElement: null,

        currentValue: 24,

        timeFromUrl: null,

        init() {            
            this.setTimes()
            
            this.setInputElement()          
            
            this.setTimeFromUrl()

            if(this.timeFromUrl) {
                const timesKey = getTimesKeyByValue(this.timeFromUrl);

                if(timesKey) this.changeValue(timesKey)
            }

        },       

        changeValue: function(value) {     
            
            this.currentValue = value

            this.setValues()

            this.setInput()           

            this.moveBulletValueElement()
        },

        setValues() {
            let time = this.times[this.currentValue];
            
            this.time     = time.time
            this.meridian = time.meridian
        },

        setInput() {

            this.inputElement.value = this.time + ' ' + this.meridian

            this.inputElement.parentElement.classList.add('active');
            this.inputElement.parentElement.parentElement.classList.add('active');

        },

        moveBulletValueElement() {

            let bulletPosition = (this.currentValue / this.$refs.rangeInput.max)
            const widthInputRange = this.$refs.rangeInput.offsetWidth;
            let leftPosition = (bulletPosition * (widthInputRange - 80));  //El 80 son los pixels que mide el bolo rosa. Su medida está en .range-input::-webkit-slider-thumb
            
            this.$refs.bulletValueElement.style.left = leftPosition + 'px'
            this.$refs.bulletValueElement.style.transform = 'none'
            
        },        

        setTimes() {

            this.times = getTimes()            

        },

        setInputElement() {

            this.inputElement = document.querySelector(config.inputElementSelector)

        },

        setTimeFromUrl() {
           
            this.timeFromUrl = getUrlParams().get(config.urlElementParam)

        }
    }
};
