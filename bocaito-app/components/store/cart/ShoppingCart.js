import { useEffect } from 'react'
import { useSelector, useDispatch } from 'react-redux'

import { calculateTotal } from '@/store/cartSlice'

import EmptyCart from '@/components/emptyStates/EmptyCart'
import CartHeader from '@/components/store/cart/CartHeader'
import CartProduct from '@/components/store/cart/CartProduct'
import CartFooter from './CartFooter'

const ShoppingCart = () => {
	const dispatch = useDispatch()
	const { products, isVisible } = useSelector(state => state.cart)

	useEffect(() => {
		dispatch(calculateTotal())
	}, [products])

	return (
		<>
			<div
				className={`${
					isVisible ? 'translate-x-0' : '-translate-x-full'
				} w-96 h-full flex flex-col justify-between bg-white dark:bg-zinc-900 border border-slate-200/80 dark:border-zinc-700 overflow-hidden fixed top-0 left-0 shadow-2xl transition-transform duration-200 ease-in-out`}
			>
				<CartHeader />

				<div className='px-4 pb-4 h-full overflow-y-scroll'>
					<div className='flex flex-col gap-y-4'>
						{products.length > 0 ? (
							products.map(product => <CartProduct key={product.id} product={product} />)
						) : (
							<EmptyCart />
						)}
					</div>
				</div>

				<CartFooter />
			</div>
		</>
	)
}

export default ShoppingCart
