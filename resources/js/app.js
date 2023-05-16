import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect'
window.Alpine = Alpine;
Alpine.plugin(intersect)
Alpine.start();

require('@fortawesome/fontawesome-free/js/all.min.js');

import { easepick, RangePlugin, TimePlugin } from '@easepick/bundle';
window.easepick = easepick;
window.RangePlugin = RangePlugin;
window.TimePlugin = TimePlugin;

import { Loader } from '@googlemaps/js-api-loader';
window.loader = new Loader({ /* https://googlemaps.github.io/js-api-loader/interfaces/LoaderOptions.html */
    apiKey: "AIzaSyDOJeKapn-5psUDAdol_nbnywoLWI6kYyw",
    version: "weekly",
    libraries: ["places"]
});
import 'tw-elements';

function goToError() {
    let errorDiv = document.getElementsByClassName('validation-error')[0];
    if(errorDiv){
        errorDiv.scrollIntoView({behavior: 'smooth', block: 'center', inline: 'nearest'});
    }
}

window.addEventListener('validationError', event => {
    setTimeout(goToError, 500);
});

window.addEventListener('goToTop', event => {
    window.scrollTo(0, 0);
});


/* ALTURA DEL VIEWPORT */
/* Se crea una variable vh para utilizar en las hojas de estilo */

let vh;

const variableVh = () => {
    vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
}

window.addEventListener('load', variableVh)
window.addEventListener('resize', variableVh)
