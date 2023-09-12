import axios from '@/lib/axios'
import { useEffect, useState } from 'react'
import { useCategory } from '@/hooks/useCategory'
import { AnimatePresence } from 'framer-motion'
import DashboardLayout from '@/layouts/Dashboard'

import Label from '@/components/form/Label'
import Input from '@/components/form/Input'
import Button from '@/components/form/Button'
import SuccessNotification from '@/components/notifications/SuccessNotification'
import Card from '@/components/Card'

const EditCategory = ({ category }) => {
	const { edit } = useCategory()

	const [id, setId] = useState(category.id)
	const [name, setName] = useState(category.name)
	const [slug, setSlug] = useState(category.slug)

	const [errors, setErrors] = useState({})
	const [isEdited, setIsEdited] = useState(false)

	const editCategory = event => {
		event.preventDefault()

		edit({ id, name, slug, setName, setSlug, setIsEdited, setErrors })
	}

	return (
		<>
			<div className='flex items-center justify-between mb-4'>
				<div className='text-2xl font-semibold flex items-center'>
					Edit <div className='text-slate-400 dark:text-zinc-400 ml-1'> {name}</div>
				</div>
			</div>

			<Card>
				<div className='flex flex-col md:flex-row gap-x-12'>
					<div className='w-full md:w-1/4'>
						<div>
							<div className='text-lg font-semibold mb-1'>Category Details</div>
							<div className='text-sm text-slate-400 dark:text-zinc-400'>
								Please enter your category details.
							</div>
							<AnimatePresence>
								{isEdited && (
									<SuccessNotification title='Success' message='Your category has been updated!' />
								)}
							</AnimatePresence>
						</div>
					</div>

					<div className='w-full md:w-3/4'>
						<form className='text-sm' onSubmit={editCategory}>
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
											onChange={event => setName(event.target.value)}
											placeholder='Cookies & Cream'
										/>
									</div>

									<div className='col-span-2 sm:col-span-1'>
										<Label htmlFor='slug' required>
											Slug
										</Label>
										<Input
											id='slug'
											type='text'
											value={slug}
											error={errors.slug}
											onChange={event => setSlug(event.target.value)}
											placeholder='cookies-and-cream'
											disabled
										/>
									</div>
								</div>
							</div>

							<div className='flex justify-between mt-6'>
								<Button>Edit Category</Button>
							</div>
						</form>
					</div>
				</div>
			</Card>
		</>
	)
}

EditCategory.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export async function getStaticPaths() {
	const categories = await axios.get('/api/categories')

	return {
		fallback: false,
		paths: categories.data.map(category => ({
			params: { id: category.id.toString() },
		})),
	}
}

export async function getStaticProps({ params }) {
	const category = await axios.get(`/api/categories/${params.id}`)

	return {
		props: {
			category: category.data,
		},
	}
}

export default EditCategory
