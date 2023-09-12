import Image from 'next/image'
import axios from '@/lib/axios'
import { useState } from 'react'
import { useDispatch } from 'react-redux'

import StoreLayout from '@/layouts/Store'
import { addQuantityProduct } from '@/store/cartSlice'
import Notes from '@/components/store/Notes'
import ProductQuantity from '@/components/ProductQuantity'

const ProductDetail = ({ product }) => {
	const dispatch = useDispatch()
	const [quantity, setQuantity] = useState(1)
	const { id, available, name, picture, description, note, price, stock } = product

	const handleAddProductToCart = () => {
		dispatch(addQuantityProduct({ id, name, price, quantity: Number(quantity) }))
	}

	if (!product) return null

	return (
		<div>
			<div className='flex flex-col md:flex-row items-start gap-x-10 gap-y-6'>
				<div className='w-full md:w-1/2'>
					{!picture && (
						<Image
							src={`https://picsum.photos/800/700?random=${id}`}
							alt={name}
							width={1200}
							height={800}
							layout='responsive'
							className='w-full object-cover rounded-xl'
						/>
					)}
				</div>

				<div className='w-full md:w-1/2'>
					<div className='mb-6'>
						{stock && (
							<div className='text-slate-400 dark:text-zinc-400 mb-1'>{stock} in stock</div>
						)}
						<div className='text-4xl font-bold mb-4'>{name}</div>
						<div className='text-3xl text-yellow-300 font-semibold mb-2'>${price}</div>
					</div>

					<div className='mb-6'>{description}</div>

					<div>
						{stock && available ? (
							<>
								<div className='text-sm text-slate-400 dark:text-zinc-400 mb-2'>Quantity:</div>
								<div className='flex gap-x-4 mb-4'>
									<ProductQuantity quantity={quantity} stock={stock} setQuantity={setQuantity} />

									<button
										className='text-sm text-white font-semibold leading-none px-4 py-2 bg-indigo-600 rounded-lg'
										onClick={handleAddProductToCart}
									>
										Add to cart
									</button>
								</div>
							</>
						) : (
							<div className='text-yellow-300 mb-2'>Out of stock</div>
						)}
					</div>

					{note && <Notes note={note} />}
				</div>
			</div>
		</div>
	)
}

ProductDetail.getLayout = page => {
	return <StoreLayout>{page}</StoreLayout>
}

export async function getStaticPaths() {
	const { data } = await axios.get('/api/products/available')

	return {
		fallback: false,
		paths: data.map(product => ({
			params: { id: product.id.toString() },
		})),
	}
}

export async function getStaticProps({ params }) {
	const { data } = await axios.get(`/api/products/${params.id}`)

	return {
		props: {
			product: data,
		},
	}
}

export default ProductDetail
