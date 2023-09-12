import { useState, useEffect } from 'react'

const Status = ({ status, valid, invalid }) => {
	const [statusClasses, setStatusClasses] = useState('')

	useEffect(() => {
		if (status === 1) {
			setStatusClasses('w-2 h-2 bg-green-500 rounded-full')
		} else {
			setStatusClasses('w-2 h-2 bg-slate-400 dark:bg-zinc-500 rounded-full')
		}
	}, [status])

	return (
		<div>
			<div
				className={`${
					status === 1
						? 'text-green-500 bg-green-500/10'
						: 'text-slate-400 dark:text-zinc-500 bg-slate-100 dark:bg-zinc-700/60'
				} inline-flex items-center justify-center text-xs leading-none font-bold px-3 py-2 rounded-xl`}
			>
				<div className={statusClasses}></div>
				<div className='font-bold ml-2'>{status > 0 ? valid : invalid}</div>
			</div>
		</div>
	)
}

export default Status
