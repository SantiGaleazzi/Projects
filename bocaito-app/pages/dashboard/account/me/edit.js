import { useState } from 'react'
import DashboardLayout from '@/layouts/Dashboard'
import { useUser } from '@/hooks/useUser'

import Label from '@/components/form/Label'
import Input from '@/components/form/Input'
import Button from '@/components/form/Button'

const EditProfile = ({ user }) => {
	console.log(user)

	const [name, setName] = useState()
	const [lastname, setLastname] = useState('')
	const [email, setEmail] = useState('')
	const [phone, setPhone] = useState('')
	const [errors, setErrors] = useState({})

	const saveProfile = event => {
		event.preventDefault()
	}
	return (
		<>
			<div className='flex items-center justify-between mb-4'>
				<div className='text-2xl font-semibold'>My Profile</div>
			</div>

			<div className='flex flex-col md:flex-row gap-x-12 p-6 bg-white rounded-xl'>
				<div className='w-full md:w-1/4'>
					<div>
						<div className='text-lg font-semibold '>Personal Information</div>
						<div className='text-sm text-slate-400'>
							Use a permanent address where you can receive mail.
						</div>
					</div>
				</div>

				<div className='w-full md:w-3/4'>
					<form className='text-sm' onSubmit={saveProfile}>
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
										placeholder='Juan'
									/>
								</div>

								<div className='col-span-2 sm:col-span-1'>
									<Label htmlFor='lastname' className='mb-2' required>
										Lastname
									</Label>
									<Input
										id='lastname'
										type='text'
										value={lastname}
										error={errors.lastname}
										onChange={event => setLastname(event.target.value)}
										placeholder='Perez'
									/>
								</div>

								<div className='col-span-2 sm:col-span-1'>
									<Label htmlFor='email' className='mb-2' required>
										Email
									</Label>
									<Input
										id='email'
										type='email'
										value={lastname}
										error={errors.email}
										disabled
										onChange={event => setEmail(event.target.value)}
										placeholder='example@domain.com'
									/>
								</div>
							</div>
						</div>

						<div className='flex justify-between mt-6'>
							<Button>Save Changes</Button>
						</div>
					</form>
				</div>
			</div>
		</>
	)
}

EditProfile.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export default EditProfile
