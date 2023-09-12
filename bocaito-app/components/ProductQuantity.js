const ProductQuantity = ({ quantity, stock, setQuantity }) => {
	const decreaseQuantity = () => {
		if (quantity > 1) {
			setQuantity(quantity - 1)
		}
	}

	const increaseQuantity = () => {
		if (quantity < stock) {
			setQuantity(quantity + 1)
		}
	}
	return (
		<div className='w-32 text-sm flex items-center px-4 py-2 bg-white dark:bg-zinc-900 border border-slate-200/80 dark:border-zinc-700 rounded-lg'>
			<div className='flex-1 pr-3 truncate'>{quantity}</div>

			<div className='flex-none flex items-center gap-x-1'>
				<button
					className='w-5 h-5 text-lg flex items-center justify-center'
					onClick={decreaseQuantity}
				>
					-
				</button>

				<button
					className='w-5 h-5 text-lg flex items-center justify-center'
					onClick={increaseQuantity}
				>
					+
				</button>
			</div>
		</div>
	)
}

export default ProductQuantity
