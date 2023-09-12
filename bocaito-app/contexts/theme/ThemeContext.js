import { useEffect, useRef, createContext } from 'react'
import create from 'zustand'

const ThemeContext = createContext()

let themes = [
	{
		value: 'light',
		label: 'Light',
		image: 'light-theme.jpg',
	},
	{
		value: 'dark',
		label: 'Dark',
		image: 'dark-theme.jpg',
	},
	{
		value: 'system',
		label: 'System',
		image: 'system-theme.jpg',
	},
]

const useSetting = create(set => ({
	selectedTheme: 'system',
	setSelectedTheme: selectedTheme => set({ selectedTheme }),
}))

function update() {
	if (
		localStorage.theme === 'dark' ||
		(!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
	) {
		document.documentElement.classList.add('dark', 'changing-theme')
	} else {
		document.documentElement.classList.remove('dark', 'changing-theme')
	}
	window.setTimeout(() => {
		document.documentElement.classList.remove('changing-theme')
	})
}

const ThemeProvider = ({ children }) => {
	let { selectedTheme, setSelectedTheme } = useSetting()
	let initial = useRef(true)

	useEffect(() => {
		let theme = localStorage.theme
		if (theme === 'light' || theme === 'dark') {
			setSelectedTheme(theme)
		}
	}, [])

	useEffect(() => {
		if (selectedTheme === 'system') {
			localStorage.removeItem('theme')
		} else if (selectedTheme === 'light' || selectedTheme === 'dark') {
			localStorage.theme = selectedTheme
		}

		if (initial.current) {
			initial.current = false
		} else {
			update()
		}
	}, [selectedTheme])

	useEffect(() => {
		let mediaQuery = window.matchMedia('(prefers-color-scheme: dark)')

		if (mediaQuery?.addEventListener) {
			mediaQuery.addEventListener('change', update)
		} else {
			mediaQuery.addListener(update)
		}

		function onStorage() {
			update()
			let theme = localStorage.theme
			if (theme === 'light' || theme === 'dark') {
				setSelectedTheme(theme)
			} else {
				setSelectedTheme('system')
			}
		}
		window.addEventListener('storage', onStorage)

		return () => {
			if (mediaQuery?.removeEventListener) {
				mediaQuery.removeEventListener('change', update)
			} else {
				mediaQuery.removeListener(update)
			}

			window.removeEventListener('storage', onStorage)
		}
	}, [])

	return (
		<ThemeContext.Provider value={{ themes, selectedTheme, setSelectedTheme }}>
			{children}
		</ThemeContext.Provider>
	)
}

export { ThemeContext, ThemeProvider }
