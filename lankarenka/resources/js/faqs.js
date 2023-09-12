const faqs_questions = document.querySelector('.faqs-questions');

if ( faqs_questions !== null) {

    const all_questions = faqs_questions.querySelectorAll('.question');

    all_questions.forEach( (question) => {

        const action_button = question.querySelector('.action');

        action_button.addEventListener('click', (event) => {

            question.classList.toggle('is-open');

        })

    });

}