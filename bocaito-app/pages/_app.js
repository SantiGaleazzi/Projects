import store from '@/store'
import { Provider } from 'react-redux'
import { ThemeProvider } from '@/contexts/theme/ThemeContext'
import '@/assets/tailwind.sass'

import { config } from '@fortawesome/fontawesome-svg-core'
import '@fortawesome/fontawesome-svg-core/styles.css'
config.autoAddCss = false

function MyApp({ Component, pageProps }) {
	const Layout = Component.getLayout || (page => page)

	return (
		<Provider store={store}>
			<ThemeProvider>{Layout(<Component {...pageProps} />)}</ThemeProvider>
		</Provider>
	)
}

export default MyApp
