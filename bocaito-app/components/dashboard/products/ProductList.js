const ProductList = ({ name, price, amount }) => {
	return (
		<div className='flex items-center'>
			<div className='w-32'>{name}</div>
			<div className=''>${price}</div>
		</div>
	)
}

export default ProductList
