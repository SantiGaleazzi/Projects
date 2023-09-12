import { useState, useEffect } from 'react'
import Error from '@/components/form/ErrorMessage'

const Price = ({ disabled = false, error = '', className, ...props }) => {
	const [localError, setError] = useState(error)

	useEffect(() => {
		setError(error)
	}, [error])

	return (
		<>
			<div
				className={`flex rounded-lg border shadow-sm overflow-hidden ${
					localError ? 'border-red-400' : 'border-slate-300 dark:border-zinc-600'
				}`}
			>
				<span
					className={`inline-flex items-center text-slate-400 dark:text-zinc-400 px-3 bg-slate-100 dark:bg-zinc-700 `}
				>
					$
				</span>
				<input
					disabled={disabled}
					className={`${className} w-full px-4 py-2 bg-white dark:bg-zinc-800 border-l border-slate-300 dark:border-zinc-600 rounded-r-lg placeholder:text-slate-300 dark:placeholder:text-zinc-400`}
					{...props}
				/>
			</div>
			{localError && <Error message={localError} />}
		</>
	)
}

export default Price
