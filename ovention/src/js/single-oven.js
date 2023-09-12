/**
 *
 * PHP : functions/oven-requests.php
 * CSS: src/sass/pages/_single-oven.sass
 *
 */

import Player from '@vimeo/player'

const singleOvenInfo = document.querySelector('.js-single-oven-info-list')
const ovenInfoList = singleOvenInfo?.querySelectorAll('.js-single-oven-data')
const ovenInfoDisplayer = document.querySelector('.js-oven-overall-info')

ovenInfoList?.forEach(ovenInfo => {
	ovenInfo.addEventListener('click', () => {
		ovenInfoList.forEach(item => {
			item.classList.remove('is-active')
		})

		const responseCount = ovenInfo.querySelector('.js-single-oven-count')

		fetch(`/wp-json/oven-app/v1/oven/${singleOvenInfo.dataset.ovenSlug}`, {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
			},
			body: JSON.stringify({
				post_id: singleOvenInfo.dataset.ovenId,
				section: ovenInfo.dataset.ovenInfoToSearch,
				type: ovenInfo.dataset.infoType,
			}),
		})
			.then(response => response.json())
			.then(response => {
				ovenInfoDisplayer.textContent = ''

				responseCount && (responseCount.innerHTML = response?.length)
				ovenInfo.classList.add('is-active')

				response.length > 0
					? response.map(item => {
							item.type === 'video' &&
								ovenInfoDisplayer.insertAdjacentHTML(
									'beforeend',
									`<div class="tw-w-full sm:tw-w-1/2 lg:tw-w-1/4 tw-flex tw-flex-col tw-p-3 tw-group">											
										<div class="tw-h-full tw-flex tw-flex-col tw-p-8 tw-bg-white tw-border-2 tw-border-solid tw-border-gray-200 hover:tw-border-orange-500 tw-rounded-2xl tw-transition-all tw-duration-150 tw-ease-in-out">
											<div class="tw-flex-auto tw-mb-8">
												<i class="fa-solid fa-video tw-text-4xl tw-text-orange-500 tw-transition-transform tw-duration-100 tw-ease-in-out group-hover:tw-translate-y-1"></i>
											</div>

											<div>
												<div>
													<div class="tw-text-gray-900 hover:tw-text-gray-900 tw-font-semibold">
														${item.title}
													</div>
												</div>

												<button class="tw-text-[14px] tw-text-gray-400 tw-font-medium js-video-media-play tw-cursor-pointer" data-video-id="${item.link}" aria-label="Open Video Lightbx">
													Watch
												</button>
											</div>
										</div>
									</div>`
								)

							item.type === 'file' &&
								ovenInfoDisplayer.insertAdjacentHTML(
									'beforeend',
									`<div class="tw-w-full sm:tw-w-1/2 lg:tw-w-1/4 tw-flex tw-flex-col tw-p-3 tw-group">
											<a class="tw-h-full tw-flex tw-flex-col tw-p-8 tw-bg-white tw-border-2 tw-border-solid tw-border-gray-200 hover:tw-border-orange-500 tw-rounded-2xl tw-transition-all tw-duration-150 tw-ease-in-out" href="${item.link}" target="_blank">
											<div class="tw-flex-auto tw-mb-8">
												<i class="fa-solid fa-cloud-arrow-down tw-text-4xl tw-text-orange-500 tw-transition-transform tw-duration-100 tw-ease-in-out group-hover:tw-translate-y-1"></i>
											</div>

											<div>
												<div>
													<div class="tw-text-gray-900 hover:tw-text-gray-900 tw-font-semibold">
														${item.title}
													</div>
												</div>

												<div class="tw-text-[14px] tw-text-gray-400 tw-font-medium">
													File
												</div>
											</div>
										</a>
									</div>`
								)

							item.type === 'about' &&
								ovenInfoDisplayer.insertAdjacentHTML(
									'beforeend',
									`<div class="tw-w-full tw-mb-8 last:tw-mb-0 has-wysiwyg">
										<div class="tw-w-full lg:tw-max-w-7xl tw-mx-auto">
											<div class="tw-flex tw-flex-row">
											${
												item.icon?.url
													? `
												<div class="tw-w-[50px] tw-text-center tw-flex-none tw-mb-8">
													<img src="${item.icon?.url}" alt="${item.icon?.alt}">
												</div>
											`
													: ''
											}

												<div class="tw-flex-1 tw-text-[14px] tw-text-gray-900 tw-font-medium tw-pl-10 md:tw-pr-10 has-wysiwyg">
													${item.copy}
												</div>
											</div>
										</div>
									</div>`
								)

							item.type === 'about-no-repeater' &&
								ovenInfoDisplayer.insertAdjacentHTML(
									'beforeend',
									`<div class="tw-w-full has-wysiwyg">
										${item.copy}
									</div>`
								)
					  })
					: ovenInfoDisplayer.insertAdjacentHTML(
							'beforeend',
							`<div class="tw-w-full sm:tw-w-1/2 lg:tw-w-1/4 tw-flex tw-flex-col tw-p-3">
								<div class="tw-h-full tw-flex tw-flex-col tw-p-8 tw-bg-white tw-border-2 tw-border-solid tw-border-gray-200 hover:tw-border-orange-500 tw-rounded-2xl tw-transition-all tw-duration-150 tw-ease-in-out">
									<div class="tw-mb-8">
										<i class="fa-solid fa-triangle-exclamation tw-text-4xl tw-text-orange-500"></i>
									</div>

									<div class="tw-text-gray-900 hover:tw-text-gray-900 tw-font-semibold">
										No results found
									</div>
								</div>
							</div>`
					  )

				const videosAvailable = document.querySelectorAll('.js-video-media-play')

				videosAvailable?.forEach(video => {
					video.addEventListener('click', () => {
						const videoLightbox = document.querySelector('.video-lightbox')
						const lightboxContent = videoLightbox?.querySelector('.lightbox-content')

						const videoPlayer = new Player('js-video-loader', {
							id: video.dataset.videoId,
							autoplay: true,
							color: 'FF8A2C',
						})

						videoPlayer.ready().then(() => {
							videoPlayer.setVolume(0)
						})

						videoLightbox.classList.add('is-active')
						document.body.classList.add('tw-overflow-hidden')

						setTimeout(() => {
							lightboxContent.classList.toggle('is-active')
						}, 400)

						document.addEventListener('keyup', event => {
							if (event.key === 'Escape') {
								videoLightbox.classList.remove('is-active')
								lightboxContent.classList.remove('is-active')
								document.body.classList.remove('tw-overflow-hidden')

								videoPlayer.destroy()
							}
						})

						videoLightbox.querySelectorAll('.dismiss').forEach(dismiss => {
							dismiss.addEventListener('click', () => {
								videoLightbox.classList.remove('is-active')
								lightboxContent.classList.remove('is-active')
								document.body.classList.remove('tw-overflow-hidden')

								videoPlayer.destroy()
							})
						})
					})
				})
			})
	})
})
