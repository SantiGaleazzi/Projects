import { useEffect, useRef, useState, useContext } from 'react'
import { AnimatePresence } from 'framer-motion'

import { ThemeContext } from '@/contexts/theme/ThemeContext'
import ThemeOptions from '@/components/themes/ThemeOptions'
import MoonIcon from '@/components/icons/MoonIcon'
import SunIcon from '@/components/icons/SunIcon'
import ComputerIcon from '@/components/icons/ComputerIcon'

const ThemesDropdown = () => {
	const themeOptions = useRef(null)
	const [isOpen, setIsOpen] = useState(false)
	const { selectedTheme } = useContext(ThemeContext)

	useEffect(() => {
		const closeThemeOptions = event => {
			if (themeOptions.current && !themeOptions.current.contains(event.target)) {
				setIsOpen(false)
			}
		}

		document.addEventListener('mousedown', closeThemeOptions)

		return () => document.removeEventListener('mousedown', closeThemeOptions)
	}, [themeOptions])

	return (
		<>
			<div
				className='w-10 h-10 flex items-center justify-center bg-slate-100 dark:bg-zinc-700 rounded-full cursor-pointer relative'
				ref={themeOptions}
				onClick={() => setIsOpen(prevValue => !prevValue)}
			>
				{selectedTheme === 'light' ? (
					<SunIcon className='w-4' color='text-slate-500' opacity='0.2' outline='text-slate-500' />
				) : selectedTheme === 'dark' ? (
					<MoonIcon
						className='w-4'
						color='dark:text-zinc-300'
						opacity='0.3'
						outline='dark:text-zinc-400'
					/>
				) : (
					<ComputerIcon
						className='w-4'
						color='text-slate-500 dark:text-zinc-300'
						opacity='0.3'
						outline='text-slate-500 dark:text-zinc-400'
					/>
				)}
				<AnimatePresence>{isOpen && <ThemeOptions />}</AnimatePresence>
			</div>
		</>
	)
}

export default ThemesDropdown
