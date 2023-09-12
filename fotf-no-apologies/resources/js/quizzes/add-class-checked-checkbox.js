const quizContent = document.querySelector('.wpProQuiz_content')

if (quizContent) {
	const allQuestionsWrapper = quizContent.querySelector('ul.wpProQuiz_questionList')
	const allCheckboxOptions = allQuestionsWrapper?.querySelectorAll('li.wpProQuiz_questionListItem')

	setTimeout(() => {
		allCheckboxOptions?.forEach(option => {
			if (option.querySelector('input[type=checkbox]').checked === true) {
				option.querySelector('label').classList.add('is-selected')
			}
		})
	}, 300)
}
