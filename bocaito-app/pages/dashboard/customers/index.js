import axios from '@/lib/axios'
import Head from 'next/head'

import { useAuth } from '@/hooks/useAuth'
import DashboardLayout from '@/layouts/Dashboard'
import Customer from '@/components/dashboard/customers/Customer'
import CountBadge from '@/components/dashboard/CountBadge'

const Customers = ({ customers }) => {
	useAuth({ middleware: 'auth' })

	return (
		<>
			<Head>
				<title>Bocaito | Customers</title>
			</Head>

			<div className='flex items-center justify-between mb-4'>
				<div className='text-2xl font-semibold'>Cutomers</div>
			</div>

			<div className='bg-white dark:bg-zinc-900 border border-slate-200/80 dark:border-zinc-700 rounded-xl overflow-hidden'>
				<div className='px-6 pt-6 mb-4'>
					<div className='flex items-center mb-1'>
						<div className='font-semibold mr-4'>All Products</div>
						{customers.length > 0 && <CountBadge count={customers.length} />}
					</div>

					<div className='text-sm text-slate-400 dark:text-zinc-400'>
						Keep track of your customers.
					</div>
				</div>

				<div className='text-sm text-slate-600 dark:text-zinc-200 font-semibold flex items-center px-6 py-3 bg-slate-50 dark:bg-zinc-800 border-t border-b border-slate-200 dark:border-zinc-700'>
					<div className='w-8'>#</div>
					<div className='w-40'>First Name</div>
					<div className='w-32'>Last Name</div>
					<div className='w-64'>Email</div>
					<div className='w-40'>Phone</div>
					<div className='w-40'>Birth Date</div>
					<div className='w-32'>Role</div>
					<div className='w-6'></div>
				</div>

				<div className='divide-y divide-slate-100 dark:divide-zinc-800'>
					{customers.map(customer => (
						<Customer key={customer.id} {...customer} />
					))}
				</div>
			</div>
		</>
	)
}

Customers.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export async function getServerSideProps(context) {
	let customers = null

	try {
		const { data } = await axios.get('/api/customers', {
			headers: {
				origin: 'app.bocaito-laravel.test',
				Cookie: context.req.headers.cookie,
			},
		})
		customers = data
	} catch (error) {
		console.log(error)
	}

	return {
		props: {
			customers,
		},
	}
}

export default Customers
