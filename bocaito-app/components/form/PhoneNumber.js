import { useState, useEffect } from 'react'

function formatPhoneNumber(value) {
	if (!value) return value

	const number = value.replace(/[^\d]/g, '')

	if (number.length < 4) return number

	if (number.length < 7) {
		return `(${number.slice(0, 3)}) ${number.slice(3)}`
	}

	return `(${number.slice(0, 3)}) ${number.slice(3, 6)}-${number.slice(6, 10)}`
}

const PhoneNumber = ({ disabled = false, className, error = '', value, onChange, ...props }) => {
	const [localError, setError] = useState(error)
	const [phoneNumber, setPhoneNumber] = useState(formatPhoneNumber(value))

	const handlePhoneNumberChange = value => {
		const formatedValue = formatPhoneNumber(value)
		setPhoneNumber(formatedValue)
		onChange(formatedValue)
	}

	useEffect(() => {
		setError(error)
	}, [error])

	return (
		<div className='flex'>
			<input
				disabled={disabled}
				defaultValue={phoneNumber}
				className={`${className} w-full px-4 py-2 bg-white dark:bg-zinc-800 border rounded-lg placeholder:text-slate-300 dark:placeholder:text-zinc-400 ${
					localError ? 'border-red-400' : 'border-slate-300 dark:border-zinc-600'
				}`}
				onChange={event => handlePhoneNumberChange(event.target.value)}
				maxLength={10}
				{...props}
			/>
		</div>
	)
}

export default PhoneNumber
