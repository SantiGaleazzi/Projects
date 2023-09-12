const internship_nav_menu = document.getElementById('internship-form-nav');

if ( internship_nav_menu != null ) {
    
    const menu_options = internship_nav_menu.querySelectorAll('.internship-menu-option');
    const content_options = document.querySelectorAll('.internships-content');

    menu_options.forEach((option) => {

        option.addEventListener('click', (event) => {

            // Remove active class from navigation
            menu_options.forEach((brother) => {

                brother.classList.remove('active');

            });

            event.target.classList.add('active');

            content_options.forEach((content) => {

                content.classList.add('hidden');

                if ( content.dataset.internshipContent == option.dataset.internshipOption ) {

                    content.classList.remove('hidden');

                }

            });

        }); 

    });

}