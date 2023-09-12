const Status = ({ status }) => {
	return (
		<div
			className={`${
				status === 1
					? 'text-green-500 bg-green-500/10'
					: ' text-slate-400 dark:text-zinc-400 bg-slate-100 dark:bg-zinc-700'
			}  inline-flex items-center justify-center text-xs leading-none font-bold px-3 py-2 rounded-xl`}
		>
			<div className='font-bold'>{status === 1 ? 'Shipped' : 'Pending'}</div>
		</div>
	)
}

export default Status
