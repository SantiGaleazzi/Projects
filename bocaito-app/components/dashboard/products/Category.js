import Link from 'next/link'
import { useState } from 'react'
import { AnimatePresence, motion } from 'framer-motion'

import EditIcon from '@/components/icons/EditIcon'
import TrashIcon from '@/components/icons/TrashIcon'

const Category = ({ id, name, slug, created, deleteOnConfirm }) => {
	const [confirmation, setConfirmation] = useState(false)

	return (
		<AnimatePresence>
			<motion.div
				initial={{ opacity: 0 }}
				animate={{ opacity: 1 }}
				exit={{ opacity: 0 }}
				className='text-slate-500 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white text-sm font-semibold flex items-center justify-between px-6 py-3 hover:bg-gray-50 dark:hover:bg-zinc-800/60 transition-colors duration-150 ease-in-out group'
			>
				<div className='flex-1 flex items-center'>
					<div className='w-10'>{id}</div>
					<div className='w-64 truncate pr-4'>{name}</div>
					<div className='flex-1 text-slate-400 dark:text-zinc-500'>{slug}</div>
					<div className='w-32'>{created}</div>
					<div className='w-28'>
						<div className='flex items-center justify-center rounded-md'>
							<Link href={`/dashboard/products/categories/edit/${id}`}>
								<a className='px-2 py-1 bg-white dark:bg-zinc-800 rounded-md mr-2'>
									<EditIcon
										className='w-4'
										color='text-slate-400 dark:text-zinc-400'
										opacity='0.35'
										outline='text-slate-400 dark:text-zinc-300/80'
									/>
								</a>
							</Link>

							{confirmation ? (
								<button
									className='leading-none px-2 py-1 bg-red-500 rounded-md'
									onClick={() => deleteOnConfirm(id)}
								>
									<TrashIcon
										className='w-4'
										color='text-white'
										opacity='0.35'
										outline='text-white'
									/>
								</button>
							) : (
								<button
									className='px-2 py-1 bg-white dark:bg-zinc-800 rounded-md'
									onClick={() => setConfirmation(!confirmation)}
								>
									<TrashIcon
										className='w-4'
										color='text-slate-400 dark:text-zinc-400'
										opacity='0.35'
										outline='text-slate-400 dark:text-zinc-300/80'
									/>
								</button>
							)}
						</div>
					</div>
				</div>
			</motion.div>
		</AnimatePresence>
	)
}

export default Category
