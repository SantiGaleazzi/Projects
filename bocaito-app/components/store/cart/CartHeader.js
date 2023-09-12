import { useSelector } from 'react-redux'

const CartHeader = () => {
	const { products } = useSelector(state => state.cart)

	return (
		<div className='py-6 px-4 bg-slate-100 dark:bg-zinc-800 border-b border-slate-200 dark:border-zinc-700 mb-4'>
			<div className='text-2xl font-bold'>My Cart</div>
			<div className='text-sm text-slate-400 dark:text-zinc-400'>
				You have {products.length} items in your cart.
			</div>
		</div>
	)
}

export default CartHeader
