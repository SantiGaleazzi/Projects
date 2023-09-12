const Button = ({ type = 'submit', disabled = false, className, ...props }) => {
	return (
		<button
			disabled={disabled}
			type={type}
			className={`${className} text-white text-sm font-semibold px-4 py-2 bg-indigo-600 rounded-lg disabled:opacity-25 transition-all duration-150 ease-in-out ${
				disabled && 'cursor-not-allowed'
			}`}
			{...props}
		/>
	)
}

export default Button
