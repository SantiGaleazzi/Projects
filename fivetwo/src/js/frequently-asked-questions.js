const questionsBlock = document.querySelector('.block-faqs')

if (questionsBlock) {
	const questions = questionsBlock.querySelectorAll('.faq-item')

	questions?.forEach(question => {
		const questionTitle = question.querySelector('.faq-question')

		questionTitle.addEventListener('click', () => {
			question.classList.toggle('active')
		})
	})
}
