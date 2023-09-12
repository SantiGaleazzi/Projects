import { useSelector, useDispatch } from 'react-redux'

import { toggleCart } from '@/store/cartSlice'
import ShoppingBag from '@/components/icons/ShoppingBag'

const GoodiesBag = () => {
	const { products } = useSelector(state => state.cart)
	const dispatch = useDispatch()

	return (
		<>
			<div
				className='flex items-center justify-center relative cursor-pointer'
				onClick={() => dispatch(toggleCart())}
			>
				<ShoppingBag
					className='w-5'
					tone='text-indigo-500 dark:text-zinc-300'
					outline='text-slate-600 dark:text-zinc-400'
					opacity='0.2'
				/>

				{products?.length > 0 && (
					<div className='w-2 h-2 bg-yellow-300 absolute top-0 right-0 rounded-full'></div>
				)}
			</div>
		</>
	)
}

export default GoodiesBag
