let vWidth   = window.innerWidth;
let vHeight  = window.innerHeight;

let isMobile = (vWidth <= 767);

const numberCalendar = () => {
    if (isMobile) {
        return 24;
    } else {
        return 2;
    }
}

const structureCalendar = () => {    
    if (isMobile) {
        return 1;
    } else {
        return 2;
    }
}

window.addEventListener('load',   numberCalendar, structureCalendar)
window.addEventListener('resize', numberCalendar, structureCalendar)