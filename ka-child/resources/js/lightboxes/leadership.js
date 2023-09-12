const leaders = document.querySelectorAll('.leader')

leaders?.forEach(leader => {
	leader.addEventListener('click', () => {
		const lightbox = document.querySelector('.leadership-lightbox')
		const closeBoundries = lightbox.querySelectorAll('.dismiss')
		const leaderLoading = leader.querySelector('.js-leader-image')

		leaderLoading?.insertAdjacentHTML(
			'beforeend',
			`<div class="loader tw-flex tw-items-center tw-justify-center tw-absolute tw-inset-0 tw-bg-orange-500/60 tw-backdrop-blur-sm">
				<svg class="tw-w-8 tw-h-8 tw-text-white tw-animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
					<circle class="tw-opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
					<path class="tw-opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
				</svg>
			</div>`
		)

		fetch(`/wp-json/kidsalive-api/v1/team-members/${leader.dataset.leaderId}`)
			.then(response => response.json())
			.then(member => {
				leaderLoading?.querySelector('.loader').remove()
				lightbox.classList.add('is-open')
				document.body.classList.add('tw-overflow-hidden')

				if (member.feature_image !== null) {
					lightbox.querySelector('.js-leader-bio').insertAdjacentHTML(
						'afterbegin',
						`<div class="js-leader-feature-image tw-text-center tw-mb-4">
							<img src="${member.feature_image}" alt="${member.post_title}" class="tw-w-40 md:tw-w-full tw-inline-block">
						</div>`
					)
				}

				document.querySelector('.js-leader-name').innerHTML = member.post_title
				document.querySelector('.js-leader-position').innerHTML = member.position
				document.querySelector('.js-leader-info').innerHTML = member.post_content
			})

		document.addEventListener('keyup', event => {
			if (event.key === 'Escape') {
				lightbox.classList.remove('is-open')
				lightbox.querySelector('.js-leader-feature-image').remove()
				document.body.classList.remove('tw-overflow-hidden')
			}
		})

		closeBoundries.forEach(dismiss => {
			dismiss.addEventListener('click', () => {
				lightbox.classList.remove('is-open')
				lightbox.querySelector('.js-leader-feature-image').remove()
				document.body.classList.remove('tw-overflow-hidden')
			})
		})
	})
})
