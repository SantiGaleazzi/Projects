import Image from 'next/image'
import Card from '@/components/Card'

const CustomerOrderProduct = ({ id, name, picture, price, quantity, total }) => {
	return (
		<>
			<Card>
				<Image
					src={`https://picsum.photos/500/400?random=${id}`}
					alt={name}
					width={300}
					height={200}
					className='w-full object-cover rounded-lg'
				/>

				<div className='flex items-center justify-between my-2'>
					<div className='text-lg font-smibold pr-4 truncate'>{name}</div>
					<div className='flex-none'>${price}</div>
				</div>

				<div className='flex justify-between'>
					<div className='text-sm text-slate-400 dark:text-zinc-400'>Quantity:</div>
					<div>{quantity}</div>
				</div>

				<div className='flex justify-between'>
					<div className='text-sm text-slate-400 dark:text-zinc-400'>Total:</div>
					<div>${total}</div>
				</div>
			</Card>
		</>
	)
}

export default CustomerOrderProduct
