const CheckMarkIcon = ({ className, outline }) => {
	return (
		<svg
			width='24'
			height='24'
			viewBox='0 0 24 24'
			fill='none'
			xmlns='http://www.w3.org/2000/svg'
			className={className}
			aria-hidden='true'
		>
			<path
				d='M20 6L9 17L4 12'
				stroke='currentColor'
				strokeWidth='2'
				strokeLinecap='round'
				strokeLinejoin='round'
				className={outline}
			/>
		</svg>
	)
}

export default CheckMarkIcon
