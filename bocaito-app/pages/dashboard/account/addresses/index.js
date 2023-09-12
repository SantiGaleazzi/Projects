import useSWR from 'swr'
import Link from 'next/link'
import axios from '@/lib/axios'
import { useAuth } from '@/hooks/useAuth'

import DashboardLayout from '@/layouts/Dashboard'
import EmptyAddress from '@/components/emptyStates/EmptyAddress'
import CustomerAddress from '@/components/dashboard/account/addresses/CustomerAddress'
import CountBadge from '@/components/dashboard/CountBadge'
import Loader from '@/components/Loader'

const Addresses = () => {
	useAuth({ middleware: 'auth' })

	const { data: addresses, error } = useSWR(
		'/api/me/addresses',
		async url => await axios.get(url).then(response => response.data)
	)

	if (!addresses) return <Loader />

	return (
		<>
			{addresses.length > 0 ? (
				<>
					<div className='mb-4'>
						<div className='flex items-center justify-between'>
							<div>
								<div className='flex items-center'>
									<div className='text-2xl font-semibold mr-4'>My Addresses</div>
									{addresses.length > 0 && <CountBadge count={addresses.length} />}
								</div>

								<div className='text-sm text-slate-400 dark:text-zinc-400'>
									Manage your shipping or billing addresses.
								</div>
							</div>

							<Link href='/dashboard/account/addresses/create'>
								<a className='text-white text-sm font-semibold px-4 py-2 bg-indigo-600 rounded-lg'>
									Add Address
								</a>
							</Link>
						</div>
					</div>

					<div className='bg-white dark:bg-zinc-900 border border-slate-200/80 dark:border-zinc-700 rounded-xl overflow-hidden'>
						<div className='text-sm text-slate-600 dark:text-zinc-200 font-semibold flex items-center px-6 py-3 bg-slate-50 dark:bg-zinc-800 border-b border-slate-200 dark:border-zinc-700'>
							<div className='flex-1 truncate pr-4'>Street</div>
							<div className='w-32'>City</div>
							<div className='w-20'>State</div>
							<div className='w-32'>Postcode</div>
							<div className='w-32'>Country</div>
							<div className='w-32'>Primary</div>
							<div className='w-20'></div>
						</div>

						<div className='divide-y divide-slate-100 dark:divide-zinc-800'>
							{addresses.length &&
								!error &&
								addresses.map(address => <CustomerAddress key={address.id} {...address} />)}
						</div>
					</div>
				</>
			) : (
				<EmptyAddress />
			)}
		</>
	)
}

Addresses.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export default Addresses
