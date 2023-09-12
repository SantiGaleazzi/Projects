// Buttons with class which has been added directly to the code.
const internships_buttons = document.querySelectorAll('.internships-related');

if ( internships_buttons != null ) {

    internships_buttons.forEach((button) => {

        button.addEventListener('click', (event) => {

            event.preventDefault();

            const menu_options = document.querySelectorAll('.internship-menu-option');

            menu_options.forEach((option) => {

                if ( event.target.dataset.internshipOption == option.dataset.internshipOption ) {

                    option.click();
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                    
                }

            });

        });

    });

}