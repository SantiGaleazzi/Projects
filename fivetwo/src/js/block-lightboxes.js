const formTriggerButtons = document.querySelectorAll('.js-form-trigger')
const forms = []

formTriggerButtons?.forEach(button => {
	forms.push({
		id: button.dataset.formId,
		type: button.dataset.formType,
	})
})

const uniqueForms = forms?.filter((formId, index) => {
	return index === forms.findIndex(o => formId.id === o.id)
})

uniqueForms?.forEach(form => {
	if (form.type === 'gravity-form') {
		fetch(`/wp-json/fivetwo-api/v1/gravity/${form.id}`)
			.then(response => response.json())
			.then(data => {
				const parser = new DOMParser()
				const scriptRegex = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi
				const info = data.replace(
					`/wp-json/fivetwo-api/v1/gravity/${form.id}`,
					`${window.location.pathname}`
				)
				const doc = parser.parseFromString(info, 'text/html')
				const ajaxScript = doc.querySelectorAll('script')[1].innerHTML
				const formBody = doc.body.innerHTML.replace(scriptRegex, '')

				document.body.insertAdjacentHTML(
					'beforeend',
					`
          <div class="new-lightbox lightbox-id-${form.id}" data-form-type="${form.type}" data-form-id="${form.id}">
            <div class="lightbox-container">
              <button class="close-lightbox" aria-label="Close Button" type="button">
                <span>×</span>
              </button>
              
              <div class="lightbox-content">
                ${formBody}
              </div>
            </div>
          </div>
          `
				)

				const script = document.createElement('script')
				const lightbox = document.querySelector(`.new-lightbox.lightbox-id-${form.id}`)

				script.type = 'text/javascript'
				script.innerHTML = ajaxScript

				lightbox.querySelector('.lightbox-content').appendChild(script)

				lightbox.querySelector('.close-lightbox')?.addEventListener('click', () => {
					lightbox.classList.remove('active')
				})
			})
			.catch(error => {
				throw new Error(error)
			})
	} else if (form.type === 'virtuous-form') {
		document.body.insertAdjacentHTML(
			'beforeend',
			`
      <div class="new-lightbox lightbox-id-${form.id}" data-form-type="${form.type}" data-form-id="${form.id}">
        <div class="lightbox-container">
          <button class="close-lightbox" aria-label="Close Button" type="button">
            <span>×</span>
          </button>
          
          <div class="lightbox-content">
          </div>
        </div>
      </div>
      `
		)

		const lightbox = document.querySelector(`.new-lightbox.lightbox-id-${form.id}`)
		const script = document.createElement('script')

		script.type = 'text/javascript'
		script.setAttribute('src', 'https://cdn.virtuoussoftware.com/virtuous.embed.min.js')
		script.setAttribute('data-vform', form.id)
		script.setAttribute('data-orgId', '1145')
		script.setAttribute('data-isGiving', 'false')
		script.setAttribute('data-dependencies', '[]')

		lightbox.querySelector('.lightbox-content').appendChild(script)

		lightbox.querySelector('.close-lightbox')?.addEventListener('click', () => {
			lightbox.classList.remove('active')
		})
	}
})

formTriggerButtons?.forEach(button => {
	button.addEventListener('click', () => {
		const lightbox = document.querySelector(
			`.new-lightbox[data-form-id="${button.dataset.formId}"]`
		)
		lightbox.classList.add('active')
	})
})
