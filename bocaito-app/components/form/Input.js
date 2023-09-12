import Error from '@/components/form/ErrorMessage'

const Input = ({ disabled = false, error = '', className, ...props }) => {
	return (
		<>
			<input
				disabled={disabled}
				className={`${className} w-full px-4 py-2 bg-white dark:bg-zinc-800 border rounded-lg placeholder:text-slate-300 dark:placeholder:text-zinc-400 shadow-sm ${
					error ? 'border-red-400' : 'border-slate-300 dark:border-zinc-600'
				} ${disabled ? 'text-slate-400 dark:text-zinc-500 cursor-not-allowed' : ''}`}
				{...props}
			/>
			{error && <Error message={error} />}
		</>
	)
}

export default Input
