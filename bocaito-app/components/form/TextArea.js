import { useState, useEffect } from 'react'
import Error from '@/components/form/ErrorMessage'

const TextArea = ({ disabled = false, error = '', label, className, value, ...props }) => {
	const [localError, setError] = useState(error)

	useEffect(() => {
		setError(error)
	}, [error])

	return (
		<>
			<textarea
				className={`${className} w-full p-3 bg-white dark:bg-zinc-800 border rounded-md block resize-none mt-2 placeholder:text-slate-300 dark:placeholder:text-zinc-400 shadow-sm ${
					localError ? 'border-red-400' : 'border-slate-300 dark:border-zinc-600'
				}`}
				defaultValue={value || ''}
				{...props}
			/>
			{label && <p className='text-sm text-slate-400 dark:text-zinc-400 mt-2'>{label}</p>}
			{localError && <Error message={localError} />}
		</>
	)
}

export default TextArea
