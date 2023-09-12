const CountBadge = ({ count }) => {
	return (
		<div className='text-indigo-500 text-sm font-bold leading-none px-3 py-1 bg-indigo-500/10 dark:bg-indigo-500/30 rounded-full'>
			{count}
		</div>
	)
}

export default CountBadge
