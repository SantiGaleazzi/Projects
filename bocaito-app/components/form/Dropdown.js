import { useState, useEffect, useRef } from 'react'
import { motion, AnimatePresence } from 'framer-motion'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faAngleDown } from '@fortawesome/free-solid-svg-icons'
import Error from '@/components/form/ErrorMessage'
import CheckMarkIcon from '@/components/icons/CheckMarkIcon'

const Dropdown = ({
	placeholder = 'Choose Option',
	id,
	label,
	value,
	options,
	error,
	onChange,
}) => {
	const dropdown = useRef(null)
	const [query, setQuery] = useState('')
	const [isOpen, setIsOpen] = useState(false)
	const [localError, setError] = useState(error)
	const [selectedOption, setSelectedOption] = useState(value)

	const closeDropdown = event => {
		setIsOpen(event && event.target === dropdown.current)
	}

	useEffect(() => {
		document.addEventListener('click', closeDropdown)

		return () => document.removeEventListener('click', closeDropdown)
	}, [])

	useEffect(() => {
		setError(error)
	}, [error])

	useEffect(() => {
		setSelectedOption(value)
	}, [value])

	return (
		<>
			<div className='relative z-10'>
				<div
					ref={dropdown}
					className={`w-full flex items-center justify-between px-4 py-2 bg-white dark:bg-zinc-800 border rounded-lg cursor-pointer shadow-sm ${
						localError ? 'border-red-400' : 'border-slate-300 dark:border-zinc-600'
					}`}
					onClick={() => setIsOpen(prevValue => !prevValue)}
					aria-label='Dropdown'
				>
					{selectedOption ? selectedOption[label] : placeholder}
					<FontAwesomeIcon
						icon={faAngleDown}
						className={`ml-3 ${
							isOpen ? 'rotate-180' : 'rotate-0'
						} transition-transform duration-150 ease-in-out`}
					/>
				</div>
				{localError && <Error message={localError} />}

				<AnimatePresence>
					{isOpen && (
						<motion.div
							initial={{ opacity: 0, y: 5 }}
							animate={{ opacity: 1, y: 0 }}
							exit={{ opacity: 0, y: 5 }}
							className='w-full max-h-64 border border-slate-100 dark:border-zinc-700 overflow-y-scroll bg-white dark:bg-zinc-800 absolute top-full right-0 rounded-xl shadow-xl mt-2'
						>
							<div className='border-b border-slate-300 dark:border-zinc-600'>
								<input
									type='text'
									defaultValue={''}
									onChange={event => {
										setQuery(event.target.value)
									}}
									className='w-full px-4 py-3 bg-white dark:bg-zinc-800 rounded-tl-lg rounded-tr-lg focus:ring-0 placeholder:text-slate-300 dark:placeholder:text-zinc-400'
									placeholder='Search'
									autoFocus
								/>
							</div>

							<div className='p-3'>
								{options
									.filter(option => option[label].toLowerCase().includes(query.toLowerCase()))
									.map(option => (
										<div
											key={option[id]}
											id={option[id]}
											name={option[label]}
											onClick={() => {
												setQuery('')
												onChange(option)
												setIsOpen(false)
											}}
											className={`flex items-center justify-between px-4 py-2 ${
												selectedOption?.id === option.id
													? 'text-white font-semibold bg-zinc-900'
													: 'text-slate-500 dark:text-zinc-200 hover:bg-slate-100 hover:dark:bg-zinc-700'
											} rounded-lg mb-1 last:mb-0 capitalize cursor-pointer `}
										>
											<div className='flex-1 pr-4 truncate'>{option[label]}</div>
											{selectedOption?.id === option.id && (
												<div>
													<CheckMarkIcon className='w-4' />
												</div>
											)}
										</div>
									))}
							</div>
						</motion.div>
					)}
				</AnimatePresence>
			</div>
		</>
	)
}

export default Dropdown
