import Input from '@/components/form/Input'
import Label from '@/components/form/Label'
import PhoneNumber from '@/components/form/PhoneNumber'

import { CHECKOUT_ACTIONS } from '@/reducers/checkout/actions'

const Billing = ({ name, lastname, email, phone, dispatch }) => {
	return (
		<>
			<div className='mb-10'>
				<div className='mb-4'>
					<div className='text-xl font-bold'>Billing Information</div>
				</div>

				<div className='grid grid-cols-1 sm:grid-cols-2 gap-4'>
					<div className='cols-span-1'>
						<Label htmlFor='name'>Name</Label>
						<Input
							id='name'
							value={name}
							type='text'
							placeholder='John'
							onChange={event =>
								dispatch({
									type: CHECKOUT_ACTIONS.SET_FIELDS,
									field: event.target.id,
									payload: event.target.value,
								})
							}
						/>
					</div>

					<div className='cols-span-1'>
						<Label htmlFor='lastname'>Lastname</Label>
						<Input
							id='lastname'
							value={lastname}
							type='text'
							placeholder='Snow'
							onChange={event =>
								dispatch({
									type: CHECKOUT_ACTIONS.SET_FIELDS,
									field: event.target.id,
									payload: event.target.value,
								})
							}
						/>
					</div>

					<div className='cols-span-1'>
						<Label htmlFor='email'>Email</Label>
						<Input
							id='email'
							value={email}
							type='email'
							placeholder='john@example.com'
							onChange={event =>
								dispatch({
									type: CHECKOUT_ACTIONS.SET_FIELDS,
									field: event.target.id,
									payload: event.target.value,
								})
							}
						/>
					</div>

					<div className='cols-span-1'>
						<Label htmlFor='phone'>Phone</Label>
						<PhoneNumber
							id='phone'
							value={phone}
							type='tel'
							placeholder='(123) 456-7890'
							onChange={event =>
								dispatch({
									type: CHECKOUT_ACTIONS.SET_FIELDS,
									field: event.target.id,
									payload: event.target.value,
								})
							}
						/>
					</div>
				</div>
			</div>
		</>
	)
}

export default Billing
