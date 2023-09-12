import { useEffect, useState } from 'react'

const Rating = () => {
	const [rating, setRating] = useState(0)
	const [hover, setHover] = useState(0)

	const checkRating = index => {
		setRating(index)

		if (rating === index) {
			setRating(0)
			localStorage.setItem('rating', 0)
		} else {
			localStorage.setItem('rating', index)
		}
	}

	useEffect(() => {
		const rated = localStorage.rating
		setRating(rated)
	}, [])

	return (
		<>
			<div className='flex items-center'>
				{[...Array(5)].map((star, index) => {
					index += 1

					return (
						<div
							key={index}
							onClick={() => checkRating(index)}
							onMouseEnter={() => setHover(index)}
							onMouseLeave={() => setHover(0)}
						>
							{index <= (hover || rating) ? '⭐️' : '✭'}
						</div>
					)
				})}
			</div>
		</>
	)
}

export default Rating
