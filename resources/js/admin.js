import Alpine from 'alpinejs';
window.Alpine = Alpine;
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





