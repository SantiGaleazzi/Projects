import Link from 'next/link'

import ShoppingBag from '@/components/icons/ShoppingBag'

const EmptyCart = () => {
	return (
		<div className='text-center p-6'>
			<ShoppingBag
				className='w-16 h-16 mx-auto mb-4'
				tone='text-slate-500 dark:text-zinc-500'
				outline='text-slate-400 dark:text-zinc-600'
				opacity='0.2'
			/>
			<div className='text-xl font-semibold'>Your cart is empty</div>
			<div className='text-sm text-slate-400 dark:text-zinc-400 mb-6'>
				You have not added any products yet
			</div>

			<Link href='/products'>
				<a className='text-sm text-white font-semibold leading-none px-5 py-3 bg-indigo-600 rounded-lg inline-flex items-center'>
					View Products
				</a>
			</Link>
		</div>
	)
}

export default EmptyCart
