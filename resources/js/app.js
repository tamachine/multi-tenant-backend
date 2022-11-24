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


