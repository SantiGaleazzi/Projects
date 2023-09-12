const Hamburger = ({ menuIsOpen, whenClicked }) => {
	return (
		<button
			className={`hamburger ${menuIsOpen ? 'open' : ''}`}
			type='button'
			aria-label='Open Menu'
			onClick={whenClicked}
		>
			<span className='hamburger-box'>
				<span className='hamburger-inner'></span>
			</span>
		</button>
	)
}

export default Hamburger
