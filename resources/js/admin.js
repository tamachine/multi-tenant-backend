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
