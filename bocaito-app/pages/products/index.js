import Head from 'next/head'
import axios from '@/lib/axios'

import StoreLayout from '@/layouts/Store'
import StoreProduct from '@/components/store/products/StoreProduct'

const Products = ({ products }) => {
	return (
		<>
			<Head>
				<title>Bocaito | Store</title>
			</Head>

			<div className='flex flex-wrap flex-col sm:flex-row'>
				{products.map(product => (
					<StoreProduct key={product.id} product={product} />
				))}
			</div>
		</>
	)
}

Products.getLayout = page => {
	return <StoreLayout>{page}</StoreLayout>
}

export async function getStaticProps() {
	const { data } = await axios.get('/api/products/available')

	return {
		props: {
			products: data,
		},
	}
}

export default Products
