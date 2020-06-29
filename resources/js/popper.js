var Popper = require('@popperjs/core')

const button = document.querySelector('#search_movie');
const tooltip = document.querySelector('#tooltip');

Popper.createPopper(button, tooltip, {
    placement: 'right'
});


function show() {
    tooltip.setAttribute('data-show', '');
  }
  
  function hide() {
    tooltip.removeAttribute('data-show');
  }
  
  const showEvents = ['mouseenter', 'focus'];
  const hideEvents = ['mouseleave', 'blur'];
  
  showEvents.forEach(event => {
    button.addEventListener(event, show);
  });
  
  hideEvents.forEach(event => {
    button.addEventListener(event, hide);
  });