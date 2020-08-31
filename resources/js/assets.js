/**
 * Sets the behaviour of the carrusel container
 */
function carrusel() {
    var texts = [
        'Find the latest releases from the cinema world',
        'Enjoy a different experience while looking for a movie or tv series',
        'Expactacular movies and TV Series',
        'Interesting information and facts',
        'Feel free to share your feedback <a href="#" class="carrusel__link">CONTACT US</a>'
    ]
    var count = 1
    setInterval(() => {
        count = count > 5 ? 1 : count
        $('.carrusel__img').animate({opacity: 0, transition: '.4s'})
        $('.carrusel__img').attr('src',`images/carrusel/image${count}.jpg`)
        $('.carrusel__img').animate({opacity: 1, transition: '.4s'})
        $('#phrase').html(texts[count])
        count++;
    }, 15000);
}

function isConnected(evt) {
    const connected = navigator.onLine
    if(!connected) {
        $('.connection').show()
        evt.preventDefault()
    }else{
        $('.connection').hide()    
    }
}

$("form").submit(function(evt) {
    isConnected(evt)
})

$('.connection').hide()    

carrusel()