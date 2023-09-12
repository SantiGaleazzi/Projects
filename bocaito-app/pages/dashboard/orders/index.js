import axios from '@/lib/axios'
import DashboardLayout from '@/layouts/Dashboard'

import Order from '@/components/dashboard/orders/Order'
import EmptyOrders from '@/components/emptyStates/EmptyOrders'
import CountBadge from '@/components/dashboard/CountBadge'

const Orders = ({ orders }) => {
	return (
		<div>
			<div className='mb-4'>
				<div className='text-2xl font-semibold'>Orders</div>
			</div>

			<div className='bg-white dark:bg-zinc-900 border border-slate-200/80 dark:border-zinc-700 rounded-xl overflow-hidden'>
				<div className='px-6 pt-6 mb-4'>
					<div className='flex items-center mb-1'>
						<div className='font-semibold mr-4'>All Orders</div>
						{orders.length > 0 && <CountBadge count={orders.length} />}
					</div>
					<div className='text-sm text-slate-400 dark:text-zinc-400'>
						Review and manage your orders.
					</div>
				</div>

				<div className='text-sm text-slate-600 dark:text-zinc-200 font-semibold flex items-center px-6 py-3 bg-slate-50 dark:bg-zinc-800 border-t border-b border-slate-200 dark:border-zinc-700'>
					<div className='w-6 mr-3'>#</div>
					<div className='w-64'>Customer</div>
					<div className='w-32'>Status</div>
					<div className='w-32'>Products</div>
					<div className='w-20'>Total</div>
				</div>

				<div className='divide-y divide-slate-100 dark:divide-zinc-800'>
					{orders.length > 0 ? (
						orders.map(order => <Order key={order.id} {...order} />)
					) : (
						<EmptyOrders />
					)}
				</div>
			</div>
		</div>
	)
}

Orders.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export async function getServerSideProps(context) {
	let orders = null

	try {
		const { data } = await axios.get('/api/orders', {
			headers: {
				origin: 'app.bocaito-laravel.test',
				Cookie: context.req.headers.cookie,
			},
		})

		orders = data
	} catch (error) {
		console.log(error)
	}

	return {
		props: {
			orders,
		},
	}
}

export default Orders
