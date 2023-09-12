const Label = ({ children, className, required, ...props }) => {
	return (
		<label
			className={`${className} text-slate-600 dark:text-white font-semibold block mb-2`}
			{...props}
		>
			{children} {required && <sup className='text-red-400'>*</sup>}
		</label>
	)
}

export default Label
