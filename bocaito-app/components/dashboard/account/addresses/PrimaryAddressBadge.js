const PrimaryAddressBadge = ({ status }) => {
	return (
		<div className='text-green-500 bg-green-500/10 inline-flex items-center justify-center text-xs leading-none font-bold px-3 py-2 rounded-xl'>
			<div className='font-bold'>{status === 1 && 'Primary'}</div>
		</div>
	)
}

export default PrimaryAddressBadge
