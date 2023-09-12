const Notes = ({ note }) => {
	return (
		<div className=' p-6 bg-yellow-300/20 dark:bg-yellow-300/10 border border-yellow-300 rounded-lg'>
			<div className='dark:text-yellow-300 text-lg font-bold mb-2'>Note</div>
			<div className='dark:text-yellow-100 text-sm'>{note}</div>
		</div>
	)
}

export default Notes
