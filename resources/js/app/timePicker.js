function timePicker(config) {
    return {

        times:[],

        time: '12:00',

        meridian: 'AM',

        inputElementSelector: '',

        inputElement: null,

        currentValue: 24,

        init() {

            this.setTimes()
            
            this.setInputElement()            

        },

        changeValue: function(event) {

            this.currentValue = event.target.value

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

            for($i = 0; $i <= 47; $i++) {            
            
                $hour       = Math.floor($i / 2);
                $minute     = ($i % 2 == 0) ? "00" : "30";
                $meridian   = ($hour >= 12) ? "PM" : "AM";
    
                if ($hour == 0) {
                    $hour  = 12;
                } else if ($hour > 12) {
                    $hour -= 12;
                }            
    
                $time = $hour + ":" + $minute;            
    
                this.times.push({ 'hour': $hour, 'minute': $minute, 'time': $time, 'meridian': $meridian });
            }
    
        },

        setInputElement() {

            this.inputElement = document.querySelector(config.inputElementSelector)

        }
    }
};
