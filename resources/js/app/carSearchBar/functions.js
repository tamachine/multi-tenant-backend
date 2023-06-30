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