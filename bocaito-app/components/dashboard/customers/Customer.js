import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faEllipsisV } from '@fortawesome/free-solid-svg-icons'

const Customer = ({ id, email, name, lastname, phone, birth_date, roles }) => {
	return (
		<div className='text-slate-500 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white text-sm font-semibold flex items-center justify-between px-6 py-3 hover:bg-gray-50 dark:hover:bg-zinc-800/60 transition-colors duration-150 ease-in-out group'>
			<div className='flex-1 flex items-center'>
				<div className='w-8'>{id}</div>
				<div className='w-40 capitalize truncate pr-4'>{name}</div>
				<div className='w-32 truncate pr-4'>{lastname}</div>
				<div className='w-64 group-hover:text-indigo-500 pr-4 truncate'>{email}</div>
				<div className='w-40'>{phone}</div>
				<div className='w-40'>{birth_date}</div>
				<div className='w-32'>{roles}</div>
				<div className='text-center'>
					<div className='w-6 h-6 hover:bg-gray-100 flex items-center justify-center rounded-md cursor-pointer relative'>
						<FontAwesomeIcon icon={faEllipsisV} className='text-zinc-400' />
					</div>
				</div>
			</div>
		</div>
	)
}

export default Customer
