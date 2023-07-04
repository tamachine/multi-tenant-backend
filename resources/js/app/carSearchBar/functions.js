function locationsOpenTransition() {
    
    const locationsLayer = document.getElementById('locations__layer');
    const locations      = document.getElementById('locations');

    let locationsLayerHeight = getHiddenHeight(locationsLayer);
    
    locations.style.height =  locationsLayerHeight + 'px';

    setTimeout(function(){
        locations.style.height = 'auto'
    }, 200);
    
}

function getHiddenHeight(el) {
    if(!el?.cloneNode) {
        console.log('null');
        return null;
    }

    const clone = el.cloneNode(true);        
    
    Object.assign(clone.style, {
        overflow: 'visible',
        height: 'auto',
        maxHeight: 'none',
        opacity: '0',
        visibility: 'hidden',
        display: 'block',
    });
   
    el.after(clone);
    const height = clone.offsetHeight;

    clone.remove();

    return height;
}

function getTimes() {
    let times = [];

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

        times.push({ 'hour': $hour, 'minute': $minute, 'time': $time, 'meridian': $meridian });
    }

    return times;
}

function getTimesKeyByValue(value) {
    const times = getTimes();

    try {
        const time     = value.split(" ")[0]
        const meridian = value.split(" ")[1]

        for (let i = 0; i < times.length; i++) {
            
            if(times[i].time == time && times[i].meridian == meridian) {                
                return i                    
            }
        }

        return null
    }catch (error) {        
        return null
    }
}