import axios from '@/lib/axios'
import { useEffect, useReducer } from 'react'
import { useProduct } from '@/hooks/useProduct'
import { AnimatePresence } from 'framer-motion'

import DashboardLayout from '@/layouts/Dashboard'
import Label from '@/components/form/Label'
import Input from '@/components/form/Input'
import Price from '@/components/form/Price'
import TextArea from '@/components/form/TextArea'
import Button from '@/components/form/Button'
import Checkbox from '@/components/form/Checkbox'
import Dropdown from '@/components/form/Dropdown'
import Switch from '@/components/form/Switch'
import UploadAsset from '@/components/form/UploadAsset'
import SuccessNotification from '@/components/notifications/SuccessNotification'

import { useAuth } from '@/hooks/useAuth'
import { ACTIONS } from '@/reducers/dashboard/products/actions'
import { editProductReducer } from '@/reducers/dashboard/products/editProductReducer'
import Card from '@/components/Card'

const EditProduct = ({ product }) => {
	useAuth({ middleware: ['auth', 'admin'] })
	const { edit } = useProduct()

	const [state, dispatch] = useReducer(editProductReducer, {
		categories: [],
		id: product.id,
		category: product.category,
		name: product.name,
		slug: product.slug,
		picture: product.picture,
		description: product.description,
		note: product.note,
		price: product.price,
		stock: product.stock,
		isAvailable: product.available,
		isManageable: false,
		isEdited: false,
		errors: {},
	})

	const {
		categories,
		id,
		category,
		name,
		slug,
		picture,
		description,
		note,
		price,
		stock,
		isAvailable,
		isManageable,
		isEdited,
		errors,
	} = state

	const editProduct = event => {
		event.preventDefault()

		edit({
			id,
			category,
			name,
			slug,
			picture,
			description,
			note,
			price,
			stock,
			isAvailable,
			dispatch,
		})
	}

	useEffect(() => {
		axios
			.get('/api/categories')
			.then(({ data }) =>
				dispatch({ type: ACTIONS.SET_FIELDS, field: 'categories', payload: data })
			)

		if (stock > 0) dispatch({ type: ACTIONS.SET_FIELDS, field: 'isManageable', payload: true })
	}, [])

	return (
		<>
			<form onSubmit={editProduct}>
				<div className='flex items-center justify-between mb-4'>
					<div className='text-2xl font-semibold flex items-center'>
						Edit <div className='text-slate-400 dark:text-zinc-400 ml-1'>{name}</div>
					</div>

					<Button>Update</Button>
				</div>

				<div className='flex flex-col md:flex-row items-start gap-5 overflow-hidden'>
					<div className='w-full md:w-3/4'>
						<Card>
							<div className='flex flex-col gap-y-4'>
								<div className='grid grid-cols-3 gap-5'>
									<div className='col-span-2 sm:col-span-1'>
										<Label htmlFor='name' required>
											Name
										</Label>
										<Input
											id='name'
											type='text'
											value={name}
											error={errors.name}
											onChange={event =>
												dispatch({
													type: ACTIONS.SET_FIELDS,
													field: event.target.id,
													payload: event.target.value,
												})
											}
											placeholder='Cookies & Cream'
										/>
									</div>

									<div className='col-span-2 sm:col-span-1'>
										<Label htmlFor='price' className='mb-2' required>
											Price
										</Label>
										<Price
											id='price'
											type='number'
											value={price}
											error={errors.price}
											onChange={event =>
												dispatch({
													type: ACTIONS.SET_FIELDS,
													field: event.target.id,
													payload: event.target.value,
												})
											}
											placeholder='0.0'
										/>
									</div>

									<div className='col-span-2 sm:col-span-1'>
										<Label htmlFor='category' className='mb-2' required>
											Category
										</Label>
										<Dropdown
											placeholder='Choose a category'
											id='id'
											label='name'
											value={category}
											options={categories}
											onChange={category =>
												dispatch({ type: ACTIONS.SET_FIELDS, field: 'category', payload: category })
											}
											error={errors.category}
										/>
									</div>
								</div>

								<div className='grid grid-cols-2 gap-5'>
									<div className='col-span-1'>
										<Label htmlFor='description' required>
											Description
										</Label>
										<TextArea
											id='description'
											rows='4'
											error={errors.description}
											value={description}
											label='Your full product information.'
											onChange={event =>
												dispatch({
													type: ACTIONS.SET_FIELDS,
													field: event.target.id,
													payload: event.target.value,
												})
											}
											placeholder='Cooked with chocolate'
										/>
									</div>

									<div className='col-span-1'>
										<Label htmlFor='note'>Note</Label>
										<TextArea
											id='note'
											rows='4'
											value={note}
											label='A simple note about your product.'
											onChange={event =>
												dispatch({
													type: ACTIONS.SET_FIELDS,
													field: event.target.id,
													payload: event.target.value,
												})
											}
											placeholder='Cooked with chocolate'
										/>
									</div>
								</div>
							</div>
						</Card>
					</div>

					<div className='w-full md:w-1/4'>
						<Card className='mb-5'>
							<div className='text-lg font-semibold mb-4'>Status & Visibility</div>

							<div className='flex items-center justify-between mb-3'>
								<Label>Visibility</Label>

								{isAvailable ? (
									<div className='text-green-500 text-xs font-bold leading-none px-4 py-2  bg-green-500/10 rounded-full ml-4'>
										Available
									</div>
								) : (
									<div className='text-slate-400 dark:text-zinc-400 text-xs font-bold leading-none px-4 py-2 bg-slate-200 dark:bg-zinc-500/30 rounded-full ml-4'>
										Disabled
									</div>
								)}
							</div>

							<div className='flex items-center justify-between mb-3'>
								<Label htmlFor='isAvailable'>Status</Label>
								<Switch
									id='isAvailable'
									checked={isAvailable}
									onClick={event =>
										dispatch({
											type: ACTIONS.SET_FIELDS,
											field: event.target.id,
											payload: !isAvailable,
										})
									}
								/>
							</div>

							<div>
								<Checkbox
									name='manage_stock'
									label='Manage stock'
									checked={isManageable}
									onChange={() =>
										dispatch({
											type: ACTIONS.SET_FIELDS,
											field: 'isManageable',
											payload: !isManageable,
										})
									}
								/>

								{isManageable && (
									<>
										<Input
											id='stock'
											type='number'
											value={stock}
											className='mt-4'
											onChange={event =>
												dispatch({
													type: ACTIONS.SET_FIELDS,
													field: event.target.id,
													payload: event.target.value,
												})
											}
											placeholder='0'
										/>
									</>
								)}
							</div>

							<div className='text-center text-xs text-slate-400 dark:text-zinc-400 font-semibold mt-4'>
								{product.updated && (
									<>
										Last Updated:{' '}
										<span className='text-slate-500 dark:text-white'>{product.updated}</span>
									</>
								)}
							</div>
						</Card>

						<Card>
							<Label htmlFor='picture'>Cover Image</Label>
							<UploadAsset
								id='picture'
								name='picture'
								image={picture}
								error={errors.picture}
								onChange={event =>
									dispatch({
										type: ACTIONS.SET_FIELDS,
										field: event.target.id,
										payload: event.target.files[0],
									})
								}
							/>
						</Card>
					</div>
				</div>
			</form>

			<AnimatePresence>
				{isEdited && (
					<SuccessNotification title='Success' message='Your product has been edited!' />
				)}
			</AnimatePresence>
		</>
	)
}

EditProduct.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export async function getStaticPaths() {
	const products = await axios.get('/api/products')

	return {
		fallback: false,
		paths: products.data.map(product => ({
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

export default EditProduct
