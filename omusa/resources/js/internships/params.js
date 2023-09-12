
// Checks if the internOption exists as parameter and then clicks the coresponding menu option.
function getUrlParams() {

    const urlString = window.location.search;
    const params = new URLSearchParams( urlString );

   if ( params.has( 'internOption' ) ) {

        const iternOption = params.get( 'internOption' );
        const internship_nav_menu = document.getElementById( 'internship-form-nav' );
        const menu_options = internship_nav_menu.querySelectorAll( '.internship-menu-option' );

        menu_options.forEach( ( option ) => {

            if ( option.dataset.internshipOption == iternOption ) {

                setTimeout(() => {

                    option.click();
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;

                });

            }

        });
        
    }

}

getUrlParams();