import { useState } from 'react'
import { motion, AnimatePresence } from 'framer-motion'
import ProductList from '@/components/dashboard/products/ProductList'
import Status from '@/components/dashboard/products/Status'
import ArrowDownChevronIcon from '@/components/icons/ArrowDownChevronIcon'

const Order = ({
	id,
	customer: { name, lastname, email },
	status,
	total,
	product_count,
	products,
}) => {
	const [viewProducts, setViewProducts] = useState(false)

	return (
		<>
			<div
				className={`text-slate-500 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white text-sm font-semibold flex items-center px-6 py-3 hover:bg-gray-50 dark:hover:bg-zinc-800/60 transition-colors duration-150 ease-in-out group ${
					viewProducts && 'bg-gray-50 dark:bg-zinc-800/60'
				}`}
				onClick={() => setViewProducts(prev => !prev)}
			>
				<div className='w-6 mr-3'>{id}</div>
				<div className='w-64 pr-4'>
					<div>
						{name} <span>{lastname}</span>
					</div>
					<div className='text-xs text-slate-400 dark:text-zinc-300'>{email}</div>
				</div>
				<div className='w-32'>
					<Status status={status} valid='Available' invalid='Disabled' />
				</div>
				<div className='w-32'>{product_count} items</div>
				<div className='w-20'>${total}</div>
				<div>
					<ArrowDownChevronIcon
						className={`${
							viewProducts ? 'rotate-180' : 'rotate-0'
						} w-4 text-slate-400 dark:text-zinc-400 transition-transform duration-200 ease-in-out`}
					/>
				</div>
			</div>

			<AnimatePresence>
				{product_count > 0 && viewProducts && (
					<motion.div
						initial={{ x: -15, height: 0 }}
						animate={{ x: 0, height: '100%' }}
						exit={{ height: 0 }}
						className='p-5 dark:bg-zinc-800 overflow-hidden'
					>
						{products.map((product, index) => (
							<ProductList key={index} {...product} />
						))}
					</motion.div>
				)}
			</AnimatePresence>
		</>
	)
}

export default Order
