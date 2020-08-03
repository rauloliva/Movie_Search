var Popper = require('@popperjs/core')

/**
 * Creates a new tooltip to target element
 * @param {*} target 
 * @param {*} tooltip 
 */
function createTooltip(target, tooltip, position, showEvents, hideEvents) {
    Popper.createPopper(target, tooltip, {
      placement: position
    });

    showEvents.forEach(e => {
      target.addEventListener(e, () => tooltip.setAttribute('data-show', ''));
    });

    hideEvents.forEach(e => {
      target.addEventListener(e, () => tooltip.removeAttribute('data-show'));
    });
}

var element = document.querySelector('#btn_search_movie');
var tooltip = document.querySelector('#btn_search_movie_tooltip');

createTooltip(element, tooltip, 'right', ['mouseenter', 'focus'], ['mouseleave', 'blur']);
  
// create tooltip for textfield

function validateForm(event) {
    var content = document.querySelector('#txt_search_movie').value;
    if(content.trim() === ""){
        var tooltip = document.querySelector('#txt_search_movie_tooltip');
        createTooltip(e, tooltip, 'bottom', [], ['mouseleave', 'blur']);
        tooltip.setAttribute('data-show', '')
        event.preventDefault()
    }
}

// validate the textfield search before submitting
document.querySelector('#form').addEventListener('submit', validateForm);