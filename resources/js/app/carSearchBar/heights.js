document.addEventListener('DOMContentLoaded', () => {    

    function calendarHeight() {
        const calendarLayer = document.getElementById('calendar__layer');
        const calendar = document.getElementById('calendar');

        let calendarLayerHeight = calendarLayer.offsetHeight;

        calendar.style.height = calendarLayerHeight + 'px';        
    }

    new ResizeObserver(calendarHeight).observe(calendar__layer);
});