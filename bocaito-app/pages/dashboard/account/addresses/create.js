import { useReducer } from 'react'

import DashboardLayout from '@/layouts/Dashboard'

import Label from '@/components/form/Label'
import Input from '@/components/form/Input'
import Button from '@/components/form/Button'
import SuccessNotification from '@/components/notifications/SuccessNotification'

import { useAuth } from '@/hooks/useAuth'
import { useAddress } from '@/hooks/useAddress'
import { meReducer } from '@/reducers/dashboard/account/meReducer'
import { ME_ACCTIONS } from '@/reducers/dashboard/account/actions'

const CreateAddress = () => {
	useAuth({ middleware: ['auth'] })

	const { create } = useAddress()

	const [address, dispatch] = useReducer(meReducer, {
		street: '',
		city: '',
		state: '',
		postcode: '',
		country: '',
		isPrimary: false,
		errors: {},
		isCreated: false,
	})

	const { street, city, state, postcode, country, errors, isCreated } = address

	const createAddress = event => {
		event.preventDefault()

		create({
			address,
			dispatch,
		})
	}

	return (
		<>
			<div className='flex items-center justify-between mb-4'>
				<div className='text-2xl font-semibold'>
					Add <span className='text-slate-400 dark:text-zinc-400 ml-1'>{street}</span>
				</div>
			</div>

			<div className='flex flex-col md:flex-row bg-white dark:bg-zinc-900 border border-slate-200/80 dark:border-zinc-700 rounded-xl overflow-hidden'>
				<div className='w-full md:w-1/4 border-r border-slate-200/80 dark:border-zinc-700 relative'>
					<div className='p-6'>
						<div className='mb-4'>
							<div className='text-lg font-semibold mb-1'>Address Details</div>
							<div className='text-sm text-slate-400 dark:text-zinc-400'>
								Please enter your full address.
							</div>
						</div>
					</div>
				</div>

				<div className='w-full md:w-3/4 p-6'>
					<form onSubmit={createAddress}>
						<div className='grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4'>
							<div className='col-span-1 sm:col-span-2'>
								<Label htmlFor='street'>Street address</Label>
								<Input
									id='street'
									type='text'
									value={street}
									error={errors.street}
									onChange={event =>
										dispatch({
											type: ME_ACCTIONS.SET_FIELDS,
											field: event.target.id,
											payload: event.target.value,
										})
									}
									placeholder='Nieuwezjids Voorburgwal'
								/>
							</div>

							<div className='col-span-1'>
								<Label htmlFor='country'>Country</Label>
								<Input
									id='country'
									type='text'
									value={country}
									error={errors.country}
									onChange={event =>
										dispatch({
											type: ME_ACCTIONS.SET_FIELDS,
											field: event.target.id,
											payload: event.target.value,
										})
									}
									placeholder='Unites States'
								/>
							</div>

							<div className='col-span-1'>
								<Label htmlFor='city'>City</Label>
								<Input
									id='city'
									type='text'
									value={city}
									error={errors.city}
									onChange={event =>
										dispatch({
											type: ME_ACCTIONS.SET_FIELDS,
											field: event.target.id,
											payload: event.target.value,
										})
									}
									placeholder='Kingslanding'
								/>
							</div>

							<div className='col-span-1'>
								<Label htmlFor='state'>State</Label>
								<Input
									id='state'
									type='text'
									value={state}
									error={errors.state}
									onChange={event =>
										dispatch({
											type: ME_ACCTIONS.SET_FIELDS,
											field: event.target.id,
											payload: event.target.value,
										})
									}
									placeholder='GOT'
								/>
							</div>

							<div className='col-span-1'>
								<Label htmlFor='postcode'>Postcode</Label>
								<Input
									id='postcode'
									type='text'
									value={postcode}
									error={errors.postcode}
									onChange={event =>
										dispatch({
											type: ME_ACCTIONS.SET_FIELDS,
											field: event.target.id,
											payload: event.target.value,
										})
									}
									placeholder='1012 RW'
								/>
							</div>
						</div>

						<div className='mt-6'>
							<Button>Save Address</Button>
						</div>
					</form>
				</div>
			</div>

			{isCreated && (
				<SuccessNotification title='Address created' message='Your address has been created' />
			)}
		</>
	)
}

CreateAddress.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export default CreateAddress
