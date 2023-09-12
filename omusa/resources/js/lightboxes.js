/*

    Name: Ways To Give
    Page: Ways To Give
    URL: /ways-to-give
    Comments: The title and description are part of the form.

*/
const ways_to_give_btns = document.querySelectorAll('.ways-to-give-btn')

ways_to_give_btns?.forEach(button => {
	button.addEventListener('click', event => {
		event.preventDefault()

		const lightbox_container = document.querySelector('.ways-to-give-lightbox')
		const close_lightbox = lightbox_container.querySelectorAll('.close-ligtbox')

		lightbox_container.classList.add('active')
		document.body.classList.add('overflow-hidden')

		close_lightbox.forEach(close => {
			close.addEventListener('click', event => {
				event.stopPropagation()

				document.body.classList.remove('overflow-hidden')
				lightbox_container.classList.remove('active')
			})
		})
	})
})

/*

    Name: Pray With Us
    Page: Pray
    URL: /pray
    Comments: The title and description are part of the form.

*/
const pray_w_us_btn = document.getElementById('pray-w-us-btn')

pray_w_us_btn?.addEventListener('click', event => {
	event.preventDefault()

	const lightbox_container = document.querySelector('.pray-with-us-lightbox')
	const close_lightbox = lightbox_container.querySelectorAll('.close-ligtbox')

	lightbox_container.classList.add('active')
	document.body.classList.add('overflow-hidden')

	close_lightbox.forEach(close => {
		close.addEventListener('click', event => {
			event.stopPropagation()

			document.body.classList.remove('overflow-hidden')
			lightbox_container.classList.remove('active')
		})
	})
})

/*

    Name: Interested in OM helping your Church?
    Page: For Churches
    URL: /for-churches
    Comments: The title and description are part of the form.

*/
const for_churches_btn = document.querySelectorAll('.for-churches-btn')

for_churches_btn?.forEach(each_button => {
	each_button.addEventListener('click', event => {
		event.preventDefault()

		const lightbox_container = document.querySelector('.interest-church-lightbox')
		const close_lightbox = lightbox_container.querySelectorAll('.close-ligtbox')

		/* 
                This part of the code gets the select inside the Churches Form and then changes its default value.
                The value is being taken from the button form-option dataset.
                Only the Select Index is being updated.
                0 = Default Value
                1 = OM helping your Church
                2 = Requesting a Speaker
                These values are declared on the form itself.
            */
		const form_value_on_click = each_button.dataset.formOption
		document.getElementById('input_2_11').selectedIndex = form_value_on_click

		lightbox_container.classList.add('active')
		document.body.classList.add('overflow-hidden')

		close_lightbox.forEach(close => {
			close.addEventListener('click', event => {
				event.stopPropagation()

				document.body.classList.remove('overflow-hidden')
				lightbox_container.classList.remove('active')
			})
		})
	})
})

/*

    Name: Ask a Question
    Page: Ask a Question
    URL: /short-term-opportunities
    Comments: -

*/
const ask_a_question_btns = document.querySelectorAll('.ask-a-question-btn')

ask_a_question_btns?.forEach(button => {
	button.addEventListener('click', event => {
		event.preventDefault()

		const lightbox_container = document.querySelector('.ask-a-question-lightbox')
		const close_lightbox = lightbox_container.querySelectorAll('.close-ligtbox')
		const back_to_questionare = lightbox_container.querySelectorAll('.back-to-questionare')

		// When the form contains questionare steps. Otherwise show the form.
		if (back_to_questionare.length != 0) {
			lightbox_container.classList.add('active')
			document.body.classList.add('overflow-hidden')

			// Intro questions
			const questionare = lightbox_container.querySelector('.question-working-om')
			const question_us_citizen = questionare.querySelector('.long-us-citizen')
			const question_international = questionare.querySelector('.long-international')

			// Forms
			const us_citizen_form = lightbox_container.querySelector('.long-us-citizen-form')
			const international_form = lightbox_container.querySelector('.long-international-form')

			// US Citizen Form Logic
			question_us_citizen.addEventListener('click', () => {
				us_citizen_form.classList.remove('hidden')
				questionare.classList.add('hidden')
			})

			// International Form Logic
			question_international.addEventListener('click', () => {
				international_form.classList.remove('hidden')
				questionare.classList.add('hidden')
			})

			// Back to Questionare Buttons
			back_to_questionare.forEach(back_button => {
				back_button.addEventListener('click', () => {
					us_citizen_form.classList.add('hidden')
					international_form.classList.add('hidden')
					questionare.classList.remove('hidden')
				})
			})
		} else {
			lightbox_container.classList.add('active')
			document.body.classList.add('overflow-hidden')
		}

		// Close events
		close_lightbox.forEach(close => {
			close.addEventListener('click', event => {
				event.stopPropagation()

				document.body.classList.remove('overflow-hidden')
				lightbox_container.classList.remove('active')

				// When they close the lightbox reset the form values
				if (questionare.classList.contains('hidden')) {
					us_citizen_form.classList.add('hidden')
					international_form.classList.add('hidden')
					questionare.classList.remove('hidden')
				}
			})
		})
	})
})

/*

    Name: Quiz
    Page: All Pages
    URL: /
    Comments: The title and description are part of the form.

*/
const quiz_lightbox_btns = document.querySelectorAll('.quiz-lightbox-btn')

quiz_lightbox_btns?.forEach(button => {
	button.addEventListener('click', event => {
		event.preventDefault()

		const lightbox_container = document.querySelector('.quiz-lightbox')
		const close_lightbox = lightbox_container.querySelectorAll('.close-ligtbox')

		lightbox_container.classList.add('active')
		document.body.classList.add('overflow-hidden')

		close_lightbox.forEach(close => {
			close.addEventListener('click', event => {
				event.stopPropagation()

				document.body.classList.remove('overflow-hidden')
				lightbox_container.classList.remove('active')
			})
		})
	})
})

/*

    Name: Subscribe
    Page: For Churches
    URL: /for-churches
    Comments: The title and description are part of the form.

*/
const for_churches_subscribe_btn = document.querySelector('.for-churches-subscribe')

for_churches_subscribe_btn?.addEventListener('click', event => {
	event.preventDefault()

	const lightbox_container = document.querySelector('.for-churches-subscribe-lightbox')
	const close_lightbox = lightbox_container.querySelectorAll('.close-ligtbox')

	lightbox_container.classList.add('active')
	document.body.classList.add('overflow-hidden')

	close_lightbox.forEach(close => {
		close.addEventListener('click', event => {
			event.stopPropagation()

			document.body.classList.remove('overflow-hidden')
			lightbox_container.classList.remove('active')
		})
	})
})

/*

    Name: Internship
    Page: Internships
    URL: /internships
    Comments:

*/
const video_collection = document.querySelectorAll('.internships-videos')

video_collection?.forEach(internships_videos => {
	const all_videos = internships_videos.querySelectorAll('.intern-video')
	const internships_lightbox = document.querySelector('.internship-video-lightbox')
	const close_lightbox = internships_lightbox.querySelectorAll('.close-ligtbox')

	const base_vimeo_url = 'https://player.vimeo.com/video/'

	all_videos.forEach(video => {
		const video_playback = video.querySelector('.play-video')

		// Play Videos
		video_playback.addEventListener('click', () => {
			const video_id = video_playback.dataset.videoId
			internships_lightbox.querySelector('iframe').src = base_vimeo_url + video_id + '?autoplay=1'

			setTimeout(() => {
				internships_lightbox.classList.add('active')
				document.body.classList.add('overflow-hidden')
			}, 200)
		})
	})

	// Close Actions
	close_lightbox.forEach(close => {
		close.addEventListener('click', () => {
			document.body.classList.remove('overflow-hidden')
			internships_lightbox.classList.remove('active')
			internships_lightbox.querySelector('iframe').src = ''
		})
	})
})

/*Founders*/

const founders_button = document.querySelectorAll('.open-founders-lb');
const close_founders_lb = document.querySelectorAll('.close-founder-lb');
const founders_lightbox = document.querySelectorAll('.founders-bio-lightbox');

founders_button?.forEach(button => {
	button.addEventListener('click', event => {
		const founder_id = button.id;
		
		var founder_lightbox = document.querySelector("[data-name=" + founder_id + "]");
		founder_lightbox.classList.toggle('hidden');

	})
})

close_founders_lb?.forEach(button => {
	button.addEventListener('click', event => {
		event.stopPropagation();

		founders_lightbox?.forEach(item => {
			item.classList.add('hidden')
		})		

	})
})

if(window.location.href.indexOf("leadership") > -1) {
    const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	const founder_param = urlParams.get('founder');

	const all_founder_lb = document.querySelectorAll(".founders-bio-lightbox");

	all_founder_lb?.forEach(lightbox => {
			
			const lightbox_data = lightbox.getAttribute('data-name');

			const url_param = String(founder_param);
			const lb_Substring = String(lightbox_data);

			const str = lb_Substring;
			if(str.indexOf(url_param) >= 0) {
			   const selected_lightbox = document.querySelector("[data-name=" + str + "]");
			   selected_lightbox.classList.toggle('hidden');
			}
	})

	const founders_jump = String(founder_param);

	if(founders_jump.indexOf("founders") >= 0) {
		setTimeout(() => {
		  var anchor = document.querySelector('#founders');
			anchor.scrollIntoView();
		}, "200")		

	}

	
}


gform.addFilter('gform_file_upload_markup', function (html, file, up, strings, imagesUrl) { var formId = up.settings.multipart_params.form_id, fieldId = up.settings.multipart_params.field_id; html = '<strong style="display: block; font-size: 14px;">' + file.name + "</strong> <div style='cursor: pointer; margin-bottom: 10px; font-size: 12px;' " + " onclick='gformDeleteUploadedFile(" + formId + "," + fieldId + ", this);' " + "><img style='display: inline;' class='gform_delete' " + "src='" + imagesUrl + "/delete.png' " + "alt='" + strings.delete_file + "' title='" + strings.delete_file + "' /> Remove image</div>"; return html; });