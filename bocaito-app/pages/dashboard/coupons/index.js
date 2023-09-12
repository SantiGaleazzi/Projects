import useSWR from 'swr'
import Link from 'next/link'
import Head from 'next/head'
import axios from '@/lib/axios'

import DashboardLayout from '@/layouts/Dashboard'

import Coupon from '@/components/dashboard/coupons/Coupon'
import { useAuth } from '@/hooks/useAuth'
import CountBadge from '@/components/dashboard/CountBadge'

const Coupons = () => {
	useAuth({ middleware: 'auth' })

	const { data: coupons, error } = useSWR(
		'/api/coupons',
		async url => await axios.get(url).then(response => response.data)
	)

	if (error) return <div>failed to load</div>
	if (!coupons) return <div>loading...</div>

	return (
		<>
			<Head>
				<title>Bocaito | Coupons</title>
			</Head>

			<div className='flex items-center justify-between mb-4'>
				<div className='text-2xl font-semibold'>Coupons</div>

				<div>
					<Link href='/dashboard/coupons/create'>
						<a className='flex items-center text-white text-sm font-semibold px-4 py-2 bg-indigo-600 rounded-lg'>
							Add Coupon
						</a>
					</Link>
				</div>
			</div>

			<div className='bg-white dark:bg-zinc-900 border border-slate-200/80 dark:border-zinc-700 rounded-xl overflow-hidden'>
				<div className='px-6 pt-6 mb-4'>
					<div className='flex items-center mb-1'>
						<div className='font-semibold mr-4'>All Coupons</div>
						{coupons.length > 0 && <CountBadge count={coupons.length} />}
					</div>

					<div className='text-sm text-slate-400 dark:text-zinc-400'>
						Create Coupons to the store.
					</div>
				</div>

				<div className='text-sm text-slate-600 dark:text-zinc-200 font-semibold flex items-center px-6 py-3 bg-slate-50 dark:bg-zinc-900 border-t border-b border-slate-200 dark:border-zinc-700'>
					<div className='w-8'>#</div>
					<div className='w-64'>Name</div>
					<div className='w-32'>Type</div>
					<div className='w-32'>Value</div>
					<div className='w-32'>Status</div>
					<div className='w-6'></div>
				</div>

				<div className='divide-y divide-slate-100 dark:divide-zinc-800'>
					{coupons.map(coupon => (
						<Coupon key={coupon.id} {...coupon} />
					))}
				</div>
			</div>
		</>
	)
}

Coupons.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export default Coupons
