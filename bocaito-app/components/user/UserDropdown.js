import Link from 'next/link'
import { useState } from 'react'
import LogOut from '@/components/icons/LogOut'
import DashboardIcon from '@/components/icons/DashboardIcon'

const UserDropdown = ({ className, name, lastname, email, roles }) => {
	const [isOpen, setIsOpen] = useState(false)

	return (
		<div
			className='relative'
			onMouseEnter={() => setIsOpen(true)}
			onMouseLeave={() => setIsOpen(false)}
		>
			<div className={`${className} flex items-center`}>
				<div className='flex-none text-white w-10 h-10 font-semibold flex items-center justify-center bg-indigo-500 rounded-full'>
					{name?.charAt()} {lastname?.charAt()}
				</div>

				<div className='ml-3'>
					<div className='font-semibold'>
						{name} {lastname}
					</div>

					<div className='text-slate-400 dark:text-zinc-400 text-xs font-semibold capitalize'>
						{roles}
					</div>
				</div>
			</div>

			{isOpen && (
				<div className='absolute p-3 bg-white dark:bg-zinc-700 rounded-lg shadow-lg top-full right-0 mt-3 z-10'>
					<Link href='/dashboard'>
						<a className='text-sm px-3 py-1 hover:bg-slate-100 hover:dark:bg-zinc-800 rounded-lg flex items-center'>
							<div>
								<DashboardIcon
									className='w-5 mr-3'
									tone='text-indigo-500 dark:text-zinc-300'
									outline='text-slate-600 dark:text-zinc-400'
									opacity='0.3'
								/>
							</div>
							Dashboard
						</a>
					</Link>

					<Link href='/logout'>
						<a className='text-sm px-3 py-1 hover:bg-slate-100 hover:dark:bg-zinc-800 rounded-lg flex items-center'>
							<div>
								<LogOut
									className='w-5 mr-3'
									tone='text-indigo-500 dark:text-zinc-300'
									outline='text-slate-600 dark:text-zinc-400'
									opacity='0.3'
								/>
							</div>
							Logout
						</a>
					</Link>
				</div>
			)}
		</div>
	)
}

export default UserDropdown
