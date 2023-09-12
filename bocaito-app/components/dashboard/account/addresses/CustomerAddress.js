import Link from 'next/link'
import PrimaryAddressBadge from '@/components/dashboard/account/addresses/PrimaryAddressBadge'
import EditIcon from '@/components/icons/EditIcon'
import TrashIcon from '@/components/icons/TrashIcon'

import { useAddress } from '@/hooks/useAddress'

const CustomerAddress = ({ id, street, city, state, postcode, country, primary }) => {
	const { destroy } = useAddress()

	return (
		<div className='text-slate-500 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white text-sm font-semibold flex items-center px-6 py-3 hover:bg-gray-50 hover:dark:bg-zinc-800/60 transition-colors duration-150 ease-in-out group'>
			<div className='flex-1 pr-4'>{street}</div>
			<div className='w-32'>{city}</div>
			<div className='w-20'>{state}</div>
			<div className='w-32'>{postcode}</div>
			<div className='w-32'>{country}</div>
			<div className='w-32'>
				{primary === 1 ? <PrimaryAddressBadge status={primary} /> : 'Not Set'}
			</div>
			<div className='w-20 flex items-center justify-center'>
				<Link href={`/dashboard/account/addresses/edit/${id}`}>
					<a className='px-2 py-1 bg-white dark:bg-zinc-800 rounded-md mr-2'>
						<EditIcon
							className='w-4'
							color='text-slate-400 dark:text-zinc-400'
							opacity='0.35'
							outline='text-slate-400 dark:text-zinc-300/80'
						/>
					</a>
				</Link>

				<button
					className='px-2 py-1 bg-white dark:bg-zinc-800 rounded-md'
					onClick={() => destroy(id)}
				>
					<TrashIcon
						className='w-4'
						color='text-slate-400 dark:text-zinc-400'
						opacity='0.35'
						outline='text-slate-400 dark:text-zinc-300/80'
					/>
				</button>
			</div>
		</div>
	)
}

export default CustomerAddress
