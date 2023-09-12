import { useReducer } from 'react'

import { useAuth } from '@/hooks/useAuth'
import { ME_ACCTIONS } from '@/reducers/dashboard/account/actions'
import { meReducer } from '@/reducers/dashboard/account/meReducer'

import DashboardLayout from '@/layouts/Dashboard'

import Label from '@/components/form/Label'
import Input from '@/components/form/Input'
import PhoneNumber from '@/components/form/PhoneNumber'
import Card from '@/components/Card'

const Me = () => {
	const { user } = useAuth({ middleware: 'auth' })
	const [state, dispatch] = useReducer(meReducer, {
		name: user?.name,
		lastname: user?.lastname,
		email: user?.email,
		phone: user?.phone,
		birth_date: user?.birth_date,
		picture: user?.picture,
	})

	const { name, lastname, email, phone, birth_date, picture } = state

	return (
		<>
			<div className='flex items-center justify-between mb-4'>
				<div className='text-2xl font-semibold'>My Profile</div>
			</div>

			<div className='flex flex-col md:flex-row items-start gap-x-6'>
				<div className='w-full md:w-1/4'>
					<Card>
						<div className='text-center'>
							{user.picture ? (
								<div>holi</div>
							) : (
								<>
									<div className='w-20 h-20 text-white text-2xl font-semibold  inline-flex items-center justify-center bg-indigo-500 rounded-full mb-2'>
										{user.name?.charAt()} {user.lastname?.charAt()}
									</div>
								</>
							)}
							<div className='text-xl font-semibold'>
								{name} {lastname}
							</div>
							<div className='text-sm text-slate-400 dark:text-zinc-400'>{user.email}</div>
						</div>
					</Card>
				</div>

				<div className='w-full md:w-3/4'>
					<Card>
						<div className='grid grid-cols-3 gap-4'>
							<div className='col-span-1'>
								<Label htmlFor='name'>Name</Label>
								<Input
									id='name'
									value={name}
									type='text'
									onChange={event =>
										dispatch({
											type: ME_ACCTIONS.SET_FIELDS,
											field: event.target.id,
											payload: event.target.value,
										})
									}
								/>
							</div>

							<div className='col-span-1'>
								<Label htmlFor='lastname'>Lastname</Label>
								<Input
									id='lastname'
									value={lastname}
									type='text'
									onChange={event =>
										dispatch({
											type: ME_ACCTIONS.SET_FIELDS,
											field: event.target.id,
											payload: event.target.value,
										})
									}
								/>
							</div>

							<div className='col-span-1'>
								<Label htmlFor='email'>Email</Label>
								<Input
									id='email'
									value={email}
									type='email'
									onChange={event =>
										dispatch({
											type: ME_ACCTIONS.SET_FIELDS,
											field: event.target.id,
											payload: event.target.value,
										})
									}
									disabled
								/>
							</div>

							<div className='col-span-1'>
								<Label htmlFor='phone'>Phone Number</Label>
								<PhoneNumber
									id='phone'
									value={phone}
									onChange={event =>
										dispatch({
											type: ME_ACCTIONS.SET_FIELDS,
											field: event.target.id,
											payload: event.target.value,
										})
									}
								/>
							</div>

							<div className='col-span-1'>
								<Label htmlFor='birth_date'>Birth Date 🎉</Label>
								<Input
									id='birth_date'
									value={birth_date}
									type='text'
									onChange={event =>
										dispatch({
											type: ME_ACCTIONS.SET_FIELDS,
											field: event.target.id,
											payload: event.target.value,
										})
									}
								/>
							</div>
						</div>
					</Card>
				</div>
			</div>
		</>
	)
}

Me.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export default Me
