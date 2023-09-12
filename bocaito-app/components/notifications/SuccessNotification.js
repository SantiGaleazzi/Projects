import { motion, AnimatePresence } from 'framer-motion'

const SuccessNotification = ({ title, message }) => {
	return (
		<AnimatePresence>
			<motion.div
				initial={{ opacity: 0, x: '100%' }}
				animate={{ opacity: 1, x: 0, delay: 1 }}
				exit={{ opacity: 0, x: '100%' }}
				className='w-96 flex gap-x-5 px-6 py-5 bg-white border border-slate-200/50 rounded-xl absolute top-12 right-8 drop-shadow-lg '
			>
				<div className='flex-none text-4xl flex items-center justify-center rounded-full'>🎉</div>

				<div className='flex-1'>
					<div className='text-slate-900 font-semibold'>{title}</div>
					<div className='text-sm text-slate-500 dark:text-zinc-500'>{message}</div>
				</div>
			</motion.div>
		</AnimatePresence>
	)
}

export default SuccessNotification
