import Link from 'next/link'
import Head from 'next/head'
import axios from '@/lib/axios'
import { useState } from 'react'

import { useAuth } from '@/hooks/useAuth'
import { useCategory } from '@/hooks/useCategory'
import DashboardLayout from '@/layouts/Dashboard'
import Category from '@/components/dashboard/products/Category'
import CountBadge from '@/components/dashboard/CountBadge'

const Categories = ({ allCategories }) => {
	useAuth({ middleware: ['auth', 'admin'] })
	const { destroy } = useCategory()
	const [categories, setCategories] = useState(allCategories)

	const deleteOnConfirm = async id => {
		await destroy({ id })
		setCategories(categories.filter(category => category.id !== id))
	}

	return (
		<>
			<Head>
				<title>Bocaito | Categories</title>
			</Head>

			<div>
				<div className='flex items-center justify-between mb-4'>
					<div className='text-2xl font-semibold'>Categories</div>
					<div>
						<Link href='/dashboard/products/categories/create'>
							<a className='flex items-center text-white text-sm font-semibold px-4 py-2 bg-indigo-600 rounded-lg'>
								Add Category
							</a>
						</Link>
					</div>
				</div>

				<div className='bg-white dark:bg-zinc-900 border border-slate-200/80 dark:border-zinc-700 rounded-xl overflow-hidden'>
					<div className='px-6 pt-6 mb-4'>
						<div className='flex items-center mb-1'>
							<div className='font-semibold mr-4'>All Categories</div>
							{categories.length > 0 && <CountBadge count={categories.length} />}
						</div>
						<div className='text-sm text-slate-400 dark:text-zinc-400'>
							Keep track of your product categories.
						</div>
					</div>

					<div className='text-sm text-slate-600 dark:text-zinc-200 font-semibold flex items-center px-6 py-3 bg-slate-50 dark:bg-zinc-800 border-t border-b border-slate-200 dark:border-zinc-700'>
						<div className='w-10'>ID</div>
						<div className='w-64'>Name</div>
						<div className='flex-1'>Slug</div>
						<div className='w-32'>Created</div>
						<div className='w-28'></div>
					</div>

					<div className='divide-y divide-slate-100 dark:divide-zinc-800'>
						{categories.map(category => (
							<Category key={category.id} deleteOnConfirm={deleteOnConfirm} {...category} />
						))}
					</div>
				</div>
			</div>
		</>
	)
}

Categories.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export async function getStaticProps() {
	const categories = await axios.get('/api/categories/')

	return {
		props: {
			allCategories: categories.data,
		},
	}
}

export default Categories
