import { useState } from 'react'
import { motion, AnimatePresence } from 'framer-motion'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faPlus } from '@fortawesome/free-solid-svg-icons'

const CreateNew = ({ options }) => {
	const [isOpen, setIsOpen] = useState(false)
	const [items, setOptions] = useState(options)
	return (
		<>
			<div className='relative'>
				<button
					className='flex items-center text-white px-4 py-2 bg-zinc-900 rounded-lg'
					onClick={() => setIsOpen(prev => !prev)}
				>
					<FontAwesomeIcon icon={faPlus} className='mr-2' />
					<div className='text-sm font-semibold '>Create New</div>
				</button>
				<AnimatePresence>
					{isOpen && (
						<motion.div
							initial={{ opacity: 0, y: 5 }}
							animate={{ opacity: 1, y: 0 }}
							exit={{ opacity: 0, y: 5 }}
							className='w-48 p-4 bg-white rounded-xl absolute top-full right-0 mt-3 drop-shadow-md z-10'
						>
							{items.map((item, index) => (
								<div
									key={index}
									className='text-sm font-semibold leading-none flex items-center justify-between px-3 py-2 hover:bg-slate-100 rounded-lg cursor-pointer'
								>
									<div className='capitalize'>{item}</div>
									<div className='text-slate-400 p-1'>⌘ P</div>
								</div>
							))}
						</motion.div>
					)}
				</AnimatePresence>
			</div>
		</>
	)
}

export default CreateNew
