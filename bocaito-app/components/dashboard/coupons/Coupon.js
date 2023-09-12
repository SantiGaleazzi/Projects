const Coupon = ({ id, code, type, value, status }) => {
	return (
		<div className='text-slate-500 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white text-sm font-semibold flex items-center justify-between px-6 py-3 hover:bg-gray-50 dark:hover:bg-zinc-800/60 transition-colors duration-150 ease-in-out group'>
			<div className='flex-1 flex items-center'>
				<div className='w-8'>{id}</div>
				<div className='w-64 truncate pr-4'>{code}</div>
				<div className='w-32'>{type}</div>
				<div className='w-32'>{value}</div>
				<div className='w-32'>{status}</div>
			</div>
		</div>
	)
}

export default Coupon
