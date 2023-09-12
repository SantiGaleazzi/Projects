import { useDispatch } from 'react-redux'
import { AnimatePresence, motion } from 'framer-motion'

import { addOneProduct, removeProduct } from '@/store/cartSlice'

const CartProduct = ({ product }) => {
	const dispatch = useDispatch()

	const { id, name, price, quantity } = product

	return (
		<AnimatePresence>
			<motion.div
				initial={{ opacity: 0, y: -10 }}
				animate={{ opacity: 1, y: 0 }}
				className='flex p-4 bg-slate-50/50 dark:bg-zinc-800 border border-slate-200/80 dark:border-zinc-700 rounded-xl relative'
			>
				<div
					className='flex-none w-14 h-14 bg-white dark:bg-zinc-700 bg-cover bg-center bg-no-repeat border border-slate-200/80 dark:border-zinc-600 rounded-lg mr-4'
					style={{ backgroundImage: `url(https://picsum.photos/200/200?random=${id})` }}
				></div>

				<div className='w-full'>
					<div className='flex justify-between'>
						<div>
							<div className='font-semibold truncate pr-4'>{name}</div>
							<div className='text-sm text-slate-400 dark:text-zinc-400 font-semibold'>
								${price}
							</div>
						</div>

						<div className='flex-none'>
							<div className='text-right font-semibold mb-2'>${price * quantity}</div>
							<div className='flex items-start border border-slate-200 dark:border-zinc-600 rounded-lg'>
								<button
									className='w-7 h-7 flex items-center justify-center'
									onClick={() => dispatch(removeProduct(product))}
								>
									-
								</button>
								<div className='w-12 h-7 text-xs font-semibold flex items-center justify-center bg-white dark:bg-zinc-700/70 border-l border-r border-slate-200 dark:border-zinc-600'>
									{quantity}
								</div>
								<button
									className='w-7 h-7 flex items-center justify-center'
									onClick={() => dispatch(addOneProduct(product))}
								>
									+
								</button>
							</div>
						</div>
					</div>
				</div>
			</motion.div>
		</AnimatePresence>
	)
}

export default CartProduct
