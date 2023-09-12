import Link from 'next/link'

const EmptyAddress = () => {
	return (
		<>
			<div className='text-center bg-slate-100 dark:bg-zinc-800 p-6 rounded-xl'>
				<div className='text-7xl mb-4'>📦</div>
				<div className='text-xl font-semibold'>No Addresses</div>
				<div className='text-sm text-slate-400 dark:text-zinc-400 mb-6'>
					You have not added any address yet
				</div>

				<Link href='/dashboard/account/addresses'>
					<a className='text-sm text-white font-semibold leading-none px-5 py-3 bg-indigo-600 rounded-lg inline-flex items-center'>
						Add Address
					</a>
				</Link>
			</div>
		</>
	)
}

export default EmptyAddress
