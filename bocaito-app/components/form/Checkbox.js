import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCheck } from '@fortawesome/free-solid-svg-icons'

const Checkbox = ({ label, name, checked, className, ...props }) => {
	return (
		<>
			<label htmlFor={name} className='flex items-center cursor-pointer'>
				<input id={name} defaultChecked={checked} type='checkbox' {...props} />
				<div
					className={`${className} flex-none w-5 h-5 flex items-center justify-center ${
						checked
							? 'bg-indigo-500/10 dark:bg-indigo-500/30 border-indigo-500/60 dark:border-indigo-500'
							: 'bg-white dark:bg-zinc-900 border-slate-300 dark:border-zinc-600'
					} border rounded-md mr-2 transition-colors duration-200 ease-in-out`}
					aria-hidden='true'
				>
					<FontAwesomeIcon
						icon={faCheck}
						size='sm'
						className={`${
							checked ? 'text-indigo-500 scale-100' : 'text-gray-800 scale-0'
						}  transition-all duration-200 ease-in-out`}
					/>
				</div>
				<span className='text-sm font-semibold leading-none text-slate-500 dark:text-white'>
					{label}
				</span>
			</label>
		</>
	)
}

export default Checkbox
