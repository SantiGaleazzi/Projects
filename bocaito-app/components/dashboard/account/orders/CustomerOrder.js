import Link from 'next/link'

import EyeIcon from '@/components/icons/EyeIcon'
import Status from '@/components/dashboard/orders/Status'

const CustomerOrder = ({
	index,
	id,
	status,
	product_count,
	total,
	shipping_address,
	date_ordered,
}) => {
	return (
		<>
			<Link href={`/dashboard/account/orders/${id}`}>
				<a
					className={`text-slate-500 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white text-sm font-semibold flex items-center px-6 py-3 hover:bg-gray-50 hover:dark:bg-zinc-800/60 transition-colors duration-150 ease-in-out group`}
				>
					<div className='w-6 mr-3'>{index}</div>
					<div className='w-32 pr-4'>{date_ordered}</div>

					<div className='w-32'>
						<Status status={status} />
					</div>
					<div className='flex-1 pr-4'>
						{shipping_address.street}, {shipping_address.city}, {shipping_address.state}{' '}
						{shipping_address.postcode}
					</div>
					<div className='w-32'>{product_count} items</div>
					<div className='w-20'>${total}</div>
				</a>
			</Link>
		</>
	)
}

export default CustomerOrder
