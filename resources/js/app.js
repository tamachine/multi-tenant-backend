import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect'

window.Alpine = Alpine;
Alpine.plugin(intersect)
Alpine.start();

require('@fortawesome/fontawesome-free/js/all.min.js');

window.Pikaday = require('pikaday');

import { easepick, RangePlugin, AmpPlugin, PresetPlugin } from '@easepick/bundle';

window.easepick = easepick;
window.RangePlugin = RangePlugin;
window.AmpPlugin = AmpPlugin;
window.PresetPlugin = PresetPlugin;

