const arrowUp = document.querySelector('.scroll-top');

arrowUp.addEventListener('click', function (element) {

    scrollToTop(350);

});

function scrollToTop(scrollDuration) {

    const scrollStep = -window.scrollY / (scrollDuration / 15);
    const scrollInterval = setInterval(function () {
        
        if (window.scrollY != 0) {

            window.scrollBy(0, scrollStep);

        } else {

            clearInterval(scrollInterval);

        }

    }, 15);

}
