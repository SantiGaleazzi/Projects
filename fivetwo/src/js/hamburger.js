/*********************
 * Hamburger
* *******************/
const hamburger = document.querySelector('.hamburger');

if ( hamburger !== null ) {

    const navigation = document.querySelector('.walker-nav');

    hamburger.addEventListener('click', () => {

        hamburger.classList.toggle('open');
        navigation.classList.toggle('is-active');
    
    });

}