const TrashIcon = ({ className, opacity = '0.12', color, outline = 'text-white' }) => {
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
				opacity={opacity}
				d='M19 17.2V6H5V17.2C5 18.8802 5 19.7202 5.32698 20.362C5.6146 20.9265 6.07354 21.3854 6.63803 21.673C7.27976 22 8.11984 22 9.8 22H14.2C15.8802 22 16.7202 22 17.362 21.673C17.9265 21.3854 18.3854 20.9265 18.673 20.362C19 19.7202 19 18.8802 19 17.2Z'
				fill='currentColor'
				className={color}
			/>
			<path
				d='M16 6V5.2C16 4.0799 16 3.51984 15.782 3.09202C15.5903 2.71569 15.2843 2.40973 14.908 2.21799C14.4802 2 13.9201 2 12.8 2H11.2C10.0799 2 9.51984 2 9.09202 2.21799C8.71569 2.40973 8.40973 2.71569 8.21799 3.09202C8 3.51984 8 4.0799 8 5.2V6M3 6H21M19 6V17.2C19 18.8802 19 19.7202 18.673 20.362C18.3854 20.9265 17.9265 21.3854 17.362 21.673C16.7202 22 15.8802 22 14.2 22H9.8C8.11984 22 7.27976 22 6.63803 21.673C6.07354 21.3854 5.6146 20.9265 5.32698 20.362C5 19.7202 5 18.8802 5 17.2V6'
				stroke='currentColor'
				strokeWidth='2'
				strokeLinecap='round'
				strokeLinejoin='round'
				className={outline}
			/>
		</svg>
	)
}

export default TrashIcon
