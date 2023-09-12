import axios from '@/lib/axios'
import useSWR from 'swr'

import DashboardLayout from '@/layouts/Dashboard'
import EmptyOrders from '@/components/emptyStates/EmptyOrders'
import CustomerOrder from '@/components/dashboard/account/orders/CustomerOrder'
import CountBadge from '@/components/dashboard/CountBadge'
import Loader from '@/components/Loader'
import { useAuth } from '@/hooks/useAuth'

const Orders = () => {
	useAuth({ middleware: 'auth' })

	const { data: orders, error } = useSWR('/api/me/orders', async url =>
		axios.get(url).then(response => response.data)
	)

	if (error) return <div>failed to load</div>
	if (!orders) return <Loader />

	return (
		<>
			{orders.length > 0 ? (
				<div>
					<div className='mb-4'>
						<div className='flex items-center'>
							<div className='text-2xl font-semibold mr-4'>My Orders</div>
							{orders.length > 0 && <CountBadge count={orders.length} />}
						</div>
						<div className='text-sm text-slate-400 dark:text-zinc-400'>
							Manage your recent orders and invoices.
						</div>
					</div>

					<div className='bg-white dark:bg-zinc-900 border border-slate-200/80 dark:border-zinc-700 rounded-xl overflow-hidden'>
						<div className='text-sm text-slate-600 dark:text-zinc-200 font-semibold flex items-center px-6 py-3 bg-slate-50 dark:bg-zinc-800 border-b border-slate-200 dark:border-zinc-700'>
							<div className='w-6 mr-3'>#</div>
							<div className='w-32'>Ordered</div>
							<div className='w-32'>Status</div>
							<div className='flex-1'>Shipps to</div>
							<div className='w-32'>Items</div>
							<div className='w-20'>Total</div>
						</div>

						{orders.length > 0 ? (
							<div className='divide-y divide-slate-100 dark:divide-zinc-800'>
								{orders.map((order, index) => {
									index += 1
									return <CustomerOrder key={order.id} index={index} {...order} />
								})}
							</div>
						) : (
							<EmptyOrders />
						)}
					</div>
				</div>
			) : (
				<EmptyOrders />
			)}
		</>
	)
}

Orders.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export default Orders
