import axios from '@/lib/axios'
import { useProduct } from '@/hooks/useProduct'
import { useState, useEffect } from 'react'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCheck } from '@fortawesome/free-solid-svg-icons'

import Modal from '@/components/Modal'
import Label from '@/components/form/Label'
import Input from '@/components/form/Input'
import Price from '@/components/form/Price'
import TextArea from '@/components/form/TextArea'
import Button from '@/components/form/Button'
import Dropdown from '@/components/form/Dropdown'

const ProductModal = ({ handleCloseModal }) => {
	const { create } = useProduct()
	const [categories, setCategories] = useState([])

	const [name, setName] = useState('')
	const [slug, setSlug] = useState('')
	const [price, setPrice] = useState('')
	const [excerpt, setExcerpt] = useState('')
	const [description, setDescription] = useState('')
	const [category, setCategory] = useState('')
	const [stock, setStock] = useState('')
	const [isCreated, setIsCreated] = useState(false)
	const [errors, setErrors] = useState([])

	const handleCategory = category => {
		setCategory(category)
	}

	const createProduct = event => {
		event.preventDefault()

		create({
			name,
			slug,
			price,
			excerpt,
			description,
			category,
			stock,
			setName,
			setPrice,
			setExcerpt,
			setDescription,
			setStock,
			setCategory,
			setErrors,
			setIsCreated,
		})
	}

	useEffect(() => {
		axios.get('/api/categories/').then(response => setCategories(response.data))

		return () => {
			setCategories([])
		}
	}, [])

	useEffect(() => {
		const newSlug = name.replaceAll('&', 'and').replaceAll(' ', '-').trim().toLowerCase()
		setSlug(newSlug)
	}, [name])

	return (
		<Modal handleCloseModal={handleCloseModal} errors={errors}>
			<div className='flex items-center justify-between border-b border-slate-200 pb-3 mb-4'>
				<div className='flex items-center'>
					<div className='text-lg font-semibold mr-6'>Product Details</div>
					{isCreated && (
						<div className='flex items-center'>
							<div className='flex-none w-6 h-6 flex items-center justify-center bg-green-500 rounded-full mr-2'>
								<FontAwesomeIcon icon={faCheck} className='text-white' />
							</div>
							<div className='text-green-500 font-semibold'>Product created</div>
						</div>
					)}
				</div>
				<Dropdown defaultValue='Category' handleCategory={handleCategory} options={categories} />
			</div>

			<div>
				<form className='text-sm' onSubmit={createProduct}>
					<div className='flex flex-col gap-y-4'>
						<div className='grid grid-cols-2 gap-5'>
							<div className='col-span-2 sm:col-span-1'>
								<Label htmlFor='name' required>
									Name
								</Label>
								<Input
									id='name'
									type='text'
									value={name}
									onChange={event => setName(event.target.value)}
									placeholder='Cookies & Cream'
								/>
							</div>

							<div className='col-span-2 sm:col-span-1'>
								<Label htmlFor='slug' className='mb-2'>
									Slug
								</Label>
								<Input
									id='slug'
									type='text'
									value={slug}
									className='text-gray-400'
									placeholder='slug'
									disabled
								/>
							</div>
						</div>

						<div className='grid grid-cols-2 gap-5'>
							<div className='col-span-2 sm:col-span-1'>
								<Label htmlFor='price' className='mb-2' required>
									Price
								</Label>
								<Price
									id='price'
									type='number'
									value={price}
									onChange={event => setPrice(event.target.value)}
									placeholder='0.0'
								/>
							</div>

							<div className='col-span-2 sm:col-span-1'>
								<Label htmlFor='stock' required>
									Stock
								</Label>
								<Input
									id='stock'
									type='number'
									value={stock}
									onChange={event => setStock(event.target.value)}
									placeholder='0'
								/>
							</div>
						</div>

						<div className='grid grid-cols-2 gap-5'>
							<div className='col-span-2 sm:col-span-1'>
								<Label htmlFor='excerpt'>Excerpt</Label>
								<TextArea
									id='excerpt'
									rows='4'
									defaultValue={excerpt}
									onChange={event => setExcerpt(event.target.value)}
									placeholder='Cooked with chocolate'
								/>
								<p className='text-gray-500 mt-2'>Brief description for your product.</p>
							</div>

							<div className='col-span-2 sm:col-span-1'>
								<Label htmlFor='description' required>
									Description
								</Label>
								<TextArea
									id='description'
									rows='4'
									defaultValue={description}
									onChange={event => setDescription(event.target.value)}
									placeholder='Cooked with chocolate'
								/>
								<p className='text-gray-500 mt-2'>Your product ingredients or information.</p>
							</div>
						</div>
					</div>

					<div className='flex justify-between mt-6'>
						<button
							className='text-white text-sm font-semibold leading-none px-5 py-3 bg-red-500 hover:bg-red-600 rounded-lg transition-colors duration-100 ease-in-out'
							onClick={handleCloseModal}
							aria-label='Add Product'
						>
							Dismiss
						</button>

						<Button>Create Product</Button>
					</div>
				</form>
			</div>
		</Modal>
	)
}

export default ProductModal
