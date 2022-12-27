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