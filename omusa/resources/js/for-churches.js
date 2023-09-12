/*

This code detects a click event on the For Churches page.

When the Church Teams, Vision Trips and Partnership are clicked the lightbox will trigger but the option on the "I'm Interested in" will be preselected

Code affected by this script: partials/for-churches/connections.php

*/

const connections = document.querySelectorAll('.connection-type')

if (connections != null) {
	connections.forEach(connection => {
		connection.addEventListener('click', event => {
			event.preventDefault()

			const lightbox_container = document.querySelector('.interest-church-lightbox')
			const close_lightbox = lightbox_container.querySelectorAll('.close-ligtbox')

			const connection_type = connection.dataset.formOption
			document.getElementById('input_2_11').selectedIndex = connection_type

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
}
