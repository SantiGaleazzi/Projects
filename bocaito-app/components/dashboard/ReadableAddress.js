const ReadableAddress = ({ street, city, state, postcode }) => {
	return (
		<div className='text-sm text-slate-400 dark:text-zinc-400'>
			<div>{street},</div>
			<div>
				{city}, {state}
			</div>
			<div>{postcode}</div>
		</div>
	)
}

export default ReadableAddress
