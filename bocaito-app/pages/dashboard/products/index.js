import Link from 'next/link'
import Head from 'next/head'
import { useState } from 'react'
import axios from '@/lib/axios'

import { useAuth } from '@/hooks/useAuth'
import { useProduct } from '@/hooks/useProduct'
import DashboardLayout from '@/layouts/Dashboard'
import Product from '@/components/dashboard/products/Product'
import CountBadge from '@/components/dashboard/CountBadge'

const Products = ({ allProducts }) => {
	useAuth({ middleware: ['auth', 'admin'] })

	const { destroy } = useProduct()
	const [products, setProducts] = useState(allProducts)

	const deleteOnConfirm = async id => {
		await destroy({ id })
		setProducts(products.filter(product => product.id !== id))
	}

	return (
		<>
			<Head>
				<title>Bocaito | Products</title>
			</Head>

			<div>
				<div className='flex items-center justify-between mb-4'>
					<div className='text-2xl font-semibold'>Products</div>

					<Link href='/dashboard/products/create'>
						<a className='text-white text-sm font-semibold px-4 py-2 bg-indigo-600 rounded-lg'>
							Add Product
						</a>
					</Link>
				</div>

				<div className='bg-white dark:bg-zinc-900 border border-slate-200/80 dark:border-zinc-700 rounded-xl overflow-hidden'>
					<div className='px-6 pt-6 mb-4'>
						<div className='flex items-center mb-1'>
							<div className='font-semibold mr-4'>All Products</div>
							{products.length > 0 && <CountBadge count={products.length} />}
						</div>
						<div className='text-sm text-slate-400 dark:text-zinc-400'>
							Keep track of your products.
						</div>
					</div>

					<div className='text-sm text-slate-600 dark:text-zinc-200 font-semibold flex items-center px-6 py-3 bg-slate-50 dark:bg-zinc-800 border-t border-b border-slate-200 dark:border-zinc-700'>
						<div className='w-10'>ID</div>
						<div className='w-64'>Name</div>
						<div className='w-32'>Status</div>
						<div className='w-32'>Price</div>
						<div className='w-16'>Stock</div>
						<div className='flex-1'>Category</div>
						<div className='w-32'>Created</div>
						<div className='w-28'></div>
					</div>

					<div className='divide-y divide-slate-100 dark:divide-zinc-800'>
						{products.map(product => (
							<Product key={product.id} deleteOnConfirm={deleteOnConfirm} {...product} />
						))}
					</div>
				</div>
			</div>
		</>
	)
}

Products.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export async function getStaticProps() {
	const { data } = await axios.get('/api/products')

	return {
		props: {
			allProducts: data,
		},
	}
}
export default Products
