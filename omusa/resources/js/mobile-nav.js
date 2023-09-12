/*********************
 * Add span to the <li> with the class of menu-item-has-children
* *******************/
if ( document.documentElement.clientWidth < 767 ) {

    const mobileNav = document.querySelector('.navigation');
    
    if ( mobileNav != null) {
    
        const menuChildren = mobileNav.getElementsByClassName('menu-item-has-children');
    
        Array.prototype.forEach.call(menuChildren, function (itemInMenu) {
    
            itemInMenu.innerHTML = itemInMenu.innerHTML + ' <span class="nav-indicator"></span>';
            const toggleIndicator = itemInMenu.querySelector('span');
    
            itemInMenu.addEventListener('click', (e) => {
    
                let subMenu = itemInMenu.querySelector('.dropdown-content');
                e.preventDefault();
    
                // Stop children from having <a> default behavior
                subMenu.addEventListener('click', (e) => {

                    e.stopPropagation();

                });
    
                if ( subMenu.classList.contains('is-active') ) {
    
                    hide(subMenu);
                    toggleIndicator.classList.remove('is-open');
    
                    return;

                }
    
                show(subMenu);
                toggleIndicator.classList.add('is-open');
    
            });
    
        });
    
        /*********************
         * Gets the height of the element
        * *******************/
        function getHeight(element) {
    
            let height;
    
            element.style.display = 'block';
            height = element.scrollHeight + 'px';
            element.style.display = '';
    
            return height;

        }
    
        /*********************
         * Shows the selected element
        * *******************/
        function show( element ) {
    
            let height;
    
            height = getHeight(element);
            element.classList.add('is-active');
            element.style.height = height;

            element.style.padding = "0.5rem 0rem";
    
            window.setTimeout(() => {
                
                element.style.height = '';

            }, 350);
    
        }
    
        /*********************
         * Hides the selected Element
        * *******************/
        function hide( element ) {
    
            element.style.height = element.scrollHeight + 'px';
            element.style.padding = "0rem";
    
            window.setTimeout(() => {
                
                element.style.height = '0px';

            }, 1);
    
            window.setTimeout(() => {

                element.classList.remove('is-active');
                
            }, 350);
    
        }
    
    }
    
}