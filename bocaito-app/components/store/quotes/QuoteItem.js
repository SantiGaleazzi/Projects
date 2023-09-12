import { AnimatePresence, motion } from 'framer-motion'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCheck } from '@fortawesome/free-solid-svg-icons'

const QuoteItem = ({ id, icon, title, description, selectedQuote, ...props }) => {
	return (
		<div
			className={`flex flex-row items-center gap-4 p-4 border-2 rounded-xl overflow-hidden relative cursor-pointer transition-colors duration-200 ease-in-out ${
				selectedQuote === id
					? 'bg-blue-500/10 dark:bg-blue-900/10 border-blue-500 dark:border-blue-500'
					: 'bg-white hover:bg-blue-500/10 hover:dark:bg-blue-900/10 dark:bg-zinc-900 hover:border-blue-500 border-slate-200/80 hover:dark:border-blue-500 dark:border-zinc-700'
			}`}
			{...props}
		>
			<div className='flex-none w-10 lg:w-12 h-10 lg:h-12 flex items-center justify-center rounded-full'>
				<div className='text-3xl'>{icon ? icon : '📦'}</div>
			</div>

			<div className='flex-1'>
				<div className='text-lg lg:text-xl font-semibold'>{title}</div>
				<div className='tetx-slate-400 dark:text-zinc-400'>{description}</div>
			</div>

			{selectedQuote === id && (
				<AnimatePresence>
					<motion.div
						initial={{ scale: 0 }}
						animate={{ scale: 1 }}
						exit={{ scale: 0 }}
						className='w-5 h-5 text-white flex items-center justify-center bg-blue-500 rounded-full absolute top-4 right-4'
					>
						<FontAwesomeIcon icon={faCheck} size='xs' />
					</motion.div>
				</AnimatePresence>
			)}
		</div>
	)
}

export default QuoteItem
