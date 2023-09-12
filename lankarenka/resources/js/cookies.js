/*********************
 * Cookies
* *******************/
const lightbox = document.querySelector('.lightbox');
const container = lightbox.querySelector('.lightbox__container');

// Set the cookie name, value and expiration date
function setCookie(cookieName, cookieValue, expiration) {

    const today = new Date();

    today.setTime(today.getTime() + (expiration * 24 * 60 * 60 * 1000));
    document.cookie = cookieName + '=' + cookieValue + '; expires=' + today.toUTCString() + '; path=/';

}

// Get the cookie value 
function getCookie(cookieName) {

    const name = cookieName + '=';
    let cookiesArray = document.cookie.split(';');

    for(let i = 0; i < cookiesArray.length; i++) {

        let cookie = cookiesArray[i];

        while (cookie.charAt(0) == ' ') {

            cookie = cookie.substring(1);

        }

        if (cookie.indexOf(name) == 0) {

            return cookie.substring(name.length, cookie.length);

        }

    }

    return '';

}

// Check if the cookie exists on the browser
function checkCookie() {

    const cookie = getCookie('lankarenka');

    if (!cookie) {

        setCookie('lankarenka', 'lightbox', 3);
        lightbox.classList.add('active')
        document.querySelector('body').classList.add('overflow-hidden');

        setTimeout(() => {
            container.classList.add('active');
        }, 200);
        return;
    } 
        
    lightbox.classList.remove('active')
    container.classList.remove('active');
    document.querySelector('body').classList.remove('overflow-hidden');

}

checkCookie();