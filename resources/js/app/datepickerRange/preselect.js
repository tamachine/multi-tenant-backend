/**
 * Manages the visibiliity of the input values for the movile version
 * @param {date} start 
 */
function mobileInputDatesVisibility(start) {
    const emptyInputMobile  = document.getElementById('mobile-empty-dates')
    const datesMobile       = document.querySelectorAll('.mobile-dates')

    if(start) {                                   
        if (vWidth <= 767) {
            emptyInputMobile.classList.add('hidden');

            for (let i = 0; i < datesMobile.length; i++) {
                datesMobile[i].classList.remove('hidden');
            }                
        }         
    } else {            
        if (vWidth <= 767) {
            emptyInputMobile.classList.remove('hidden');
            datesMobile.classList.add('hidden');
        }        
    }
}

/**
 * Manages the visibiliity of the search/continue buttons
 * @param {date} start 
 * @param {date} end 
 */
function buttonsVisibility(start, end) {
    const searchButton   = document.getElementById('search__button');
    const continueButton = document.getElementById('continue-date__button')

    if(start) {
        document.getElementById('set-dates').classList.add('active')
        searchButton.setAttribute('disabled')
        continueButton.setAttribute('disabled')
        
        if(end) {
            searchButton.removeAttribute('disabled')
            continueButton.removeAttribute('disabled')
        }           
    } else {
        document.getElementById('set-dates').classList.remove('active')
        searchButton.setAttribute('disabled')
        continueButton.setAttribute('disabled')           
    }
}

/**
 * Sets the dates in the inputs toggling its class
 * @param {date} start 
 * @param {date} end 
 */
function setDateInputs(start, end) {
    setDateInput(start, '.start-date');
    setDateInput(end, '.end-date');
}

/**
 * Sets the date in the input defined by the selector string and toggles the class
 * @param {date} date 
 * @param {String} selector 
 */
function setDateInput(date, selector) {        
    const elements = document.querySelectorAll(selector)

    for (let i = 0; i < elements.length; i++) {
        if (date) {
            elements[i].value = date.format( 'DD-MM-YYYY', appLocale())
        } else {
            elements[i].value = ''
        }

        toggleClassToInputGroup(elements[i], 'active', date)
    }  
}    

/**
 * Toggle the date inputs class
 * @param {element} input 
 * @param {String} klass 
 * @param {boolean} add 
 */
function toggleClassToInputGroup(input, klass, add = true) {				
    if (add) {
        input.parentElement.classList.add(klass)
    } else {
        input.parentElement.classList.remove(klass)
    }
}	