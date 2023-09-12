import Link from 'next/link'
import Image from 'next/image'
import { useDispatch } from 'react-redux'

import { addOneProduct } from '@/store/cartSlice'

const StoreProduct = ({ product }) => {
	const dispatch = useDispatch()

	const { id, name, price, stock } = product

	const handleAddToCart = () => {
		const newProduct = {
			id,
			name,
			price,
			quantity: 1,
		}

		dispatch(addOneProduct(newProduct))
	}

	return (
		<div className='w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-3'>
			<div className='bg-white dark:bg-zinc-900 border border-slate-200/80 dark:border-zinc-700 rounded-xl overflow-hidden'>
				<div className='relative'>
					<Image
						src={`https://picsum.photos/500/400?random=${id}`}
						alt='Picture of the author'
						width={500}
						height={300}
						layout='responsive'
						className='w-full object-cover'
					/>
				</div>
				<div className='px-6 py-4'>
					<Link href={`/products/${id}`}>
						<a className='text-xl font-bold leading-none'>{name}</a>
					</Link>

					<div className='font-semibold'>${price}</div>

					{stock && (
						<button
							className='text-sm text-black flex items-center justify-center px-4 py-2 bg-yellow-300 rounded-full active:scale-90 transition-transform duration-200 ease-in-out cursor-pointer'
							onClick={handleAddToCart}
						>
							Add to Cart
						</button>
					)}
				</div>
			</div>
		</div>
	)
}

export default StoreProduct
