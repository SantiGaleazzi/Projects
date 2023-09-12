const quizContent = document.querySelector('.wpProQuiz_content')

if (quizContent) {
	const quizResultsActions = quizContent.querySelector('.wpProQuiz_results .ld-quiz-actions')
	const ViewQuestionsButton = quizResultsActions.querySelector(
		'input.wpProQuiz_button[name=reShowQuestion]'
	)

	ViewQuestionsButton.value = 'View Answers'
}
