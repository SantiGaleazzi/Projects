import { useContext } from 'react'
import { motion, AnimatePresence } from 'framer-motion'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCheck } from '@fortawesome/free-solid-svg-icons'
import { ThemeContext } from '@/contexts/theme/ThemeContext'

const ThemeOptions = () => {
	const { themes, selectedTheme, setSelectedTheme } = useContext(ThemeContext)

	return (
		<>
			<motion.div
				initial={{ y: -10, opacity: 0 }}
				animate={{ y: 0, opacity: 1 }}
				exit={{ y: -10, opacity: 0 }}
				className='p-4 bg-white dark:bg-zinc-700 rounded-xl absolute top-full right-0 mt-3 drop-shadow-md z-10'
			>
				<div className='flex gap-x-4'>
					{themes.map(({ value, label, image }) => (
						<div key={value}>
							<div
								className={`w-16 h-16 border-2 hover:border-blue-500 dark:hover:border-blue-500 rounded-xl cursor-pointer relative bg-cover bg-center bg-no-repeat transition-colors duration-200 ease-in-out ${
									selectedTheme === value
										? 'border-blue-500'
										: 'border-slate-300 dark:border-zinc-600'
								}`}
								title={label}
								style={{ backgroundImage: `url(/assets/images/${image})` }}
								onClick={() => setSelectedTheme(value)}
							>
								<AnimatePresence>
									{selectedTheme === value && (
										<motion.div
											initial={{ scale: 0 }}
											animate={{ scale: 1 }}
											exit={{ scale: 0 }}
											className='w-5 h-5 text-white flex items-center justify-center bg-blue-500 rounded-full absolute -top-2 -right-2'
										>
											<FontAwesomeIcon icon={faCheck} size='xs' />
										</motion.div>
									)}
								</AnimatePresence>
							</div>
						</div>
					))}
				</div>
			</motion.div>
		</>
	)
}

export default ThemeOptions
