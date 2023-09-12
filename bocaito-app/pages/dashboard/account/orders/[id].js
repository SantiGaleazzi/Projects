import useSWR from 'swr'
import axios from '@/lib/axios'
import Image from 'next/image'
import { useRouter } from 'next/router'

import { useAuth } from '@/hooks/useAuth'
import DashboardLayout from '@/layouts/Dashboard'

import Status from '@/components/dashboard/orders/Status'
import Loader from '@/components/Loader'
import CustomerOrderProduct from '@/components/dashboard/account/orders/CustomerOrderProduct'
import ReadableAddress from '@/components/dashboard/ReadableAddress'
import Card from '@/components/Card'

const OrderOverview = () => {
	useAuth({ middleware: 'auth' })
	const router = useRouter()
	const { data: order, error } = useSWR(
		`/api/me/orders/${router.query.id}`,
		async url => await axios.get(url).then(response => response.data)
	)

	if (error) return <div>Error</div>
	if (!order) return <Loader />

	const { id, status, products, customer, date_ordered } = order

	return (
		<>
			<div className='text-3xl font-semibold mb-4'>Order Details</div>

			<div className='flex gap-4'>
				<div className='w-3/4'>
					<div className='grid sm:grid-cols-2 md:grid-cols-3 gap-4 mb-5'>
						{products.map(product => (
							<CustomerOrderProduct key={product.id} {...product} />
						))}
					</div>
				</div>

				<div className='w-1/4'>
					<Card className='mb-4'>
						<div className='mb-4'>
							<div className='text-lg font-semibold mb-1'>Order number</div>
							<div className='text-sm text-indigo-500'>BC{id}0822</div>
						</div>

						<div className='mb-4'>
							<div className='text-lg font-semibold mb-1'>Date ordered</div>
							<div className='text-sm text-slate-400 dark:text-zinc-400'> {date_ordered}</div>
						</div>

						<div className='mb-4'>
							<div className='text-lg font-semibold mb-1'>Shipping Address</div>
							<ReadableAddress {...order.shipping_address} />
						</div>

						<div>
							<div className='text-lg font-semibold mb-1'>Status</div>
							<Status status={status} />
						</div>
					</Card>

					<Card>
						<div className='mb-4'>
							<div className='text-lg font-semibold mb-1'>Payment Details</div>
							<div className='flex items-center'>
								<Image src='/assets/images/amex-logo.jpg' alt='AMEX' width={30} height={30} />
								<div className='text-sm text-slate-400 dark:text-zinc-400 ml-3'>•••3029</div>
							</div>
						</div>

						<div className='mb-4'>
							<div className='text-lg font-semibold mb-1'>Invoice</div>
							<ReadableAddress {...order.shipping_address} />
						</div>

						<div>
							<div className='text-lg font-semibold mb-1'>Contact Information</div>
							<div className='text-sm text-slate-400 dark:text-zinc-400'>{customer.email}</div>
							<div className='text-sm text-slate-400 dark:text-zinc-400'>{customer.phone}</div>
						</div>
					</Card>
				</div>
			</div>
		</>
	)
}

OrderOverview.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export default OrderOverview
