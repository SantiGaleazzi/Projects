/*********************
 * Lightbox
* *******************/
const lightbox = document.querySelector('.lightbox');
const container = lightbox.querySelector('.lightbox__container');

let clickeableElements = lightbox.querySelectorAll('.close, .lightbox__overlay');

clickeableElements.forEach( (object) => {

    object.addEventListener('click', () => {

        if ( lightbox.classList.contains('active') ) {
            
            container.classList.remove('active');
    
            setTimeout(() => {
                lightbox.classList.remove('active');
            }, 200);
    
        }
    
        if (document.querySelector('body').classList.contains('overflow-hidden')) document.querySelector('body').classList.remove('overflow-hidden');
    
    });

});