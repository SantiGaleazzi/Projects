const Switch = ({ checked, disabledLabel, enabledLabel, ...props }) => {
	return (
		<>
			<div className='flex items-center'>
				<div
					{...props}
					className={`${checked ? 'bg-green-400' : 'bg-slate-100 dark:bg-zinc-700'}
          w-11 h-6 relative inline-flex shrink-0 rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out cursor-pointer `}
				>
					<span
						aria-hidden='true'
						className={`${checked ? 'translate-x-full' : 'translate-x-0'}
            inline-block w-5 h-5 transform rounded-full bg-white drop-shadow-md transition-transform duration-200 ease-in-out pointer-events-none`}
					/>
				</div>

				{disabledLabel && enabledLabel && (
					<div className='text-slate-500 text-sm font-semibold dark:text-white ml-2'>
						{checked ? disabledLabel : enabledLabel}
					</div>
				)}
			</div>
		</>
	)
}

export default Switch
