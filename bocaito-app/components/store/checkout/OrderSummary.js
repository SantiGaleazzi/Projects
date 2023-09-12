import { useSelector } from 'react-redux'

import CartProduct from '@/components/store/cart/CartProduct'
import Card from '@/components/Card'

const OrderSummary = () => {
	const { products, subtotal, total } = useSelector(state => state.cart)

	return (
		<>
			<Card className='mb-4'>
				<div className='flex flex-col gap-y-4'>
					{products.map(product => (
						<CartProduct key={product.id} product={product} />
					))}
				</div>
			</Card>

			<div className='mb-4'>
				<div className='flex items-center justify-between mb-2'>
					<div className='text-sm text-slate-500 dark:text-zinc-400 font-bold'>
						Items ({products.length}):
					</div>
					<div className='font-semibold'>${total}</div>
				</div>

				<div className='flex items-center justify-between mb-2'>
					<div className='text-sm text-slate-500 dark:text-zinc-400 font-bold'>
						Shipping & Handling:
					</div>
					<div className='font-semibold'>$0</div>
				</div>

				<div className='flex items-center justify-between mb-2'>
					<div className='text-sm text-slate-500 dark:text-zinc-400 font-bold'>Coupons:</div>
					<div className='font-semibold'>${subtotal}</div>
				</div>

				<div className='flex items-center justify-between mb-2'>
					<div className='text-sm text-slate-500 dark:text-zinc-400 font-bold'>Subtotal</div>
					<div className='font-semibold'>${subtotal}</div>
				</div>

				<div className='text-xl font-bold flex items-center justify-between'>
					<div>Order Total</div>
					<div>${total}</div>
				</div>
			</div>

			<div>
				<button className='w-full text-white font-semibold rounded-xl leading-none p-4 bg-indigo-600 mb-4'>
					Proceed to Payment
				</button>

				<div className='text-center text-xs text-slate-400 dark:text-zinc-400'>
					By placing your order, you agree to our company{' '}
					<a className='underline' href='#'>
						Privacy Policy
					</a>{' '}
					and{' '}
					<a className='underline' href='#'>
						Terms of Service
					</a>
					.
				</div>
			</div>
		</>
	)
}

export default OrderSummary
