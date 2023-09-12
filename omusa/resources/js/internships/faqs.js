const all_questions = document.querySelectorAll('.individual-question');

if ( all_questions != null ) {

    all_questions.forEach( (faq) => {

        const question = faq.querySelector('.question');

        question.addEventListener('click', () => {

            all_questions.forEach( (faq) => {

                faq.classList.remove('is-open');

            });

            faq.classList.toggle('is-open');

        });

    });

}