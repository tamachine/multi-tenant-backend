import Alpine from 'alpinejs';
import queryString from "@invoate/alpine-query-string" //this plugin adds the functionallity to use x-query-string='param' which adds the param to the url: https://github.com/invoate/alpine-query-string
import Clipboard from "@ryangjchandler/alpine-clipboard"
window.Alpine = Alpine;
Alpine.plugin(Clipboard)
Alpine.plugin(queryString)
Alpine.start();

window.Pikaday = require('pikaday');

function goToError() {
    let errorDiv = document.getElementsByClassName('validation-error')[0];
    if(errorDiv){
        errorDiv.scrollIntoView({behavior: 'smooth', block: 'center', inline: 'nearest'});
    }
}

window.addEventListener('validationError', event => {
    setTimeout(goToError, 500);
});

window.addEventListener('showOverlay', event => {
    document.getElementById('overlay').style.display = 'flex';
});

window.addEventListener('hideOverlay', event => {
    document.getElementById('overlay').style.display = 'none';
});

/* Import TinyMCE */
import tinymce from 'tinymce'
window.tinymce = tinymce;

import 'tinymce/models/dom';

/* Default icons are required for TinyMCE 5.3 or above */
import 'tinymce/icons/default';

/* A theme is also required */
import 'tinymce/themes/silver';

/* Import plugins */
import 'tinymce/plugins/link';
import 'tinymce/plugins/anchor';
import 'tinymce/plugins/code';
import 'tinymce/plugins/codesample';
import 'tinymce/plugins/autolink';
import 'tinymce/plugins/charmap';
import 'tinymce/plugins/media';
import 'tinymce/plugins/image';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/visualblocks';
import 'tinymce/plugins/searchreplace';
import 'tinymce/plugins/wordcount';
import 'tinymce/plugins/table';
import * as te from 'tw-elements';

