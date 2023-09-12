import Head from 'next/head'

import Header from '@/components/store/Header'
import Footer from '@/components/store/Footer'
import ShoppingCart from '@/components/store/cart/ShoppingCart'

const StoreLayout = ({ children }) => {
	return (
		<div>
			<Head>
				<title>Bocaito</title>
			</Head>

			<Header />

			<section className='px-5 py-16'>
				<div className='container'>{children}</div>
			</section>

			<ShoppingCart />

			<Footer />
		</div>
	)
}

export default StoreLayout
