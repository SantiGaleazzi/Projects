/*********************
 * Hamburger
* *******************/
const hamburger = document.querySelector('.hamburger');
const navigation = document.querySelector('.mobile-header');

if ( hamburger !== null ) {

    hamburger.addEventListener('click', () => {

        hamburger.classList.toggle('open');
        navigation.classList.toggle('open');
        document.querySelector('body').classList.toggle('overflow-hidden');

    });

}