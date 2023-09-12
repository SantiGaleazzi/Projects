import { useSelector, useDispatch } from 'react-redux'
import { useRouter } from 'next/router'

import { toggleCart } from '@/store/cartSlice'

const CartFooter = () => {
	const router = useRouter()
	const dispatch = useDispatch()
	const { total, subtotal } = useSelector(state => state.cart)

	const handleToggleCart = () => {
		dispatch(toggleCart())
		router.push('/checkout')
	}

	return (
		<>
			<div className='p-4 bg-slate-100 dark:bg-zinc-800 border-t border-slate-200 dark:border-zinc-700'>
				<div className='mb-4'>
					<div className='flex items-center justify-between mb-2'>
						<div className='text-slate-500 dark:text-zinc-400 font-bold'>Subtotal</div>
						<div className='font-semibold'>${subtotal}</div>
					</div>

					<div className='flex items-center justify-between'>
						<div className='text-slate-400 dark:text-zinc-400 font-bold'>Total</div>
						<div className='font-semibold'>${total}</div>
					</div>
				</div>

				<div>
					<button
						className='w-full text-center text-white font-semibold px-4 py-3 bg-zinc-900 dark:bg-zinc-900 rounded-lg inline-block'
						onClick={handleToggleCart}
					>
						Checkout
					</button>
				</div>
			</div>
		</>
	)
}

export default CartFooter
