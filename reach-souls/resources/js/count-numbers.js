const numbersToCount = document.querySelectorAll('.has-counter')
const speed = 700

const removeCommas = string => {
	return string.replace(',', '')
}

const checkIfHasMillionOrThousand = string => {
	return string.includes('M') || string.includes('K')
}

const checkItems = numbers => {
	numbers.forEach(number => {
		if (number.isIntersecting) {
			let splitter = null
			const amountWithText = number.target.dataset.counter
			const amountWithTextNoCommas = removeCommas(amountWithText)

			if (checkIfHasMillionOrThousand(amountWithTextNoCommas)) {
				splitter = amountWithTextNoCommas.split(/(?=[M|K])/)
			}

			const countUp = () => {
				const value = Number(!splitter ? amountWithTextNoCommas : splitter[0])
				const data = Number(number.target.innerText)
				const time = value < 150 ? value / 9998 : value / speed

				if (data < value) {
					number.target.innerText = Math.ceil(data + time)
					setTimeout(countUp, 1)
				} else {
					number.target.innerText = value.toLocaleString('en-US') + (splitter ? splitter[1] : '')
				}
			}

			countUp()
		}
	})
}

const observer = new IntersectionObserver(checkItems, {
	root: null,
	rootMargin: '0px 0px -150px 0px',
	threshold: 1.0,
})

numbersToCount?.forEach(number => {
	observer.observe(number)
})
