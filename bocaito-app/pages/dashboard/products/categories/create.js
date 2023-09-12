import { useState, useEffect } from 'react'
import { AnimatePresence } from 'framer-motion'

import { useCategory } from '@/hooks/useCategory'
import DashboardLayout from '@/layouts/Dashboard'
import Label from '@/components/form/Label'
import Input from '@/components/form/Input'
import Button from '@/components/form/Button'
import Checkbox from '@/components/form/Checkbox'
import SuccessNotification from '@/components/notifications/SuccessNotification'
import Card from '@/components/Card'

const CreateCategory = () => {
	const { create } = useCategory()

	const [name, setName] = useState('')
	const [slug, setSlug] = useState('')
	const [isCreated, setIsCreated] = useState(false)
	const [errors, setErrors] = useState({})
	const [showSlug, setShowSlug] = useState(false)

	const createCategory = event => {
		event.preventDefault()

		create({
			name,
			slug,
			setName,
			setSlug,
			setErrors,
			setIsCreated,
			setShowSlug,
		})
	}

	useEffect(() => {
		const newSlug = name.replaceAll('&', 'and').replaceAll(' ', '-').trim().toLowerCase()
		setSlug(newSlug)
	}, [name])

	useEffect(() => {
		setErrors(errors)
	}, [errors])

	return (
		<>
			<div className='flex items-center justify-between mb-4'>
				<div className='text-2xl font-semibold'>
					Create <span className='text-slate-400 dark:text-zinc-400 capitalize'>{name}</span>
				</div>
			</div>

			<Card>
				<div className='flex flex-col md:flex-row gap-x-12'>
					<div className='w-full md:w-1/4'>
						<div>
							<div className='text-lg font-semibold mb-1'>Category Name</div>
							<div className='text-sm text-slate-400 dark:text-zinc-400'>
								Your slug will be automatically generated based on your category name.
							</div>
							<AnimatePresence>
								{isCreated && (
									<SuccessNotification title='Success' message='Your category has been created!' />
								)}
							</AnimatePresence>
						</div>
					</div>

					<div className='w-full md:w-3/4'>
						<form className='text-sm' onSubmit={createCategory}>
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

									<div className='mt-4'>
										<Checkbox
											name='show_slug'
											label='Show generated slug'
											checked={showSlug}
											onClick={() => setShowSlug(!showSlug)}
										/>

										{showSlug && (
											<div className='text-slate-400 dark:text-zinc-400 px-4 py-2 bg-slate-50 dark:bg-zinc-800 rounded-lg mt-4 cursor-not-allowed'>
												{slug || 'Start typing...'}
											</div>
										)}
									</div>
								</div>
							</div>

							<div className='flex justify-between mt-6'>
								<Button>Create Category</Button>
							</div>
						</form>
					</div>
				</div>
			</Card>
		</>
	)
}

CreateCategory.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export default CreateCategory
