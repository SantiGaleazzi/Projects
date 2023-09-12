const SettingsIcon = ({ className, tone, outline, opacity }) => {
	return (
		<svg
			width='24'
			height='24'
			viewBox='0 0 24 24'
			fill='none'
			xmlns='http://www.w3.org/2000/svg'
			className={`${className}`}
			aria-hidden='true'
		>
			<g opacity={opacity} className={`${tone}`}>
				<path
					d='M15.0505 9H5.5C4.11929 9 3 7.88071 3 6.5C3 5.11929 4.11929 4 5.5 4H15.0505C14.4022 4.63526 14 5.52066 14 6.5C14 7.47934 14.4022 8.36474 15.0505 9Z'
					fill='currentColor'
				/>
				<path
					d='M8.94946 20H18.5C19.8807 20 21 18.8807 21 17.5C21 16.1193 19.8807 15 18.5 15H8.94946C9.59774 15.6353 9.99997 16.5207 9.99997 17.5C9.99997 18.4793 9.59774 19.3647 8.94946 20Z'
					fill='currentColor'
				/>
			</g>
			<path
				d='M15.0505 9H5.5C4.11929 9 3 7.88071 3 6.5C3 5.11929 4.11929 4 5.5 4H15.0505M8.94949 20H18.5C19.8807 20 21 18.8807 21 17.5C21 16.1193 19.8807 15 18.5 15H8.94949M3 17.5C3 19.433 4.567 21 6.5 21C8.433 21 10 19.433 10 17.5C10 15.567 8.433 14 6.5 14C4.567 14 3 15.567 3 17.5ZM21 6.5C21 8.433 19.433 10 17.5 10C15.567 10 14 8.433 14 6.5C14 4.567 15.567 3 17.5 3C19.433 3 21 4.567 21 6.5Z'
				stroke='currentColor'
				strokeWidth='2'
				strokeLinecap='round'
				strokeLinejoin='round'
				className={`${outline}`}
			/>
		</svg>
	)
}

export default SettingsIcon
