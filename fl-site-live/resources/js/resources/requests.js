// Function that allows us to create promises based on http requests.
window.sendFormHTTPRequest = (method, url, data) => {
	const promise = new Promise((resolve, reject) => {
		const request = new XMLHttpRequest()
		request.open(method, url, true)

		// Returns the php data as json instead of string.
		// With this we also avoid using JSON.parse(response) in the onload event. And will directly transform the returned data to json.
		request.responseType = 'json'

		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;')

		request.onload = () => {
			resolve(request.response)
		}

		request.onerror = () => {
			reject('Something went wrong!')
		}

		request.send(data)
	})

	return promise
}
