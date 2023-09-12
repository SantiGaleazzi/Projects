import Link from 'next/link'
import { CHECKOUT_ACTIONS } from '@/reducers/checkout/actions'

import Label from '@/components/form/Label'
import Input from '@/components/form/Input'

const Shipping = ({ shipping: { streetAddress, country, city, postcode }, dispatch }) => {
	return (
		<>
			<div className='mb-6'>
				<div className='mb-4'>
					<div className='text-xl font-bold'>Shipping Details</div>
				</div>

				<div className='grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4'>
					<div className='col-span-1 sm:col-span-3'>
						<Label htmlFor='streetAddress'>Street address</Label>
						<Input
							id='streetAddress'
							type='text'
							value={streetAddress}
							onChange={event =>
								dispatch({
									type: CHECKOUT_ACTIONS.SET_SHIPPING,
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
							onChange={event =>
								dispatch({
									type: CHECKOUT_ACTIONS.SET_SHIPPING,
									field: event.target.id,
									payload: event.target.value,
								})
							}
							placeholder='Northway'
						/>
					</div>

					<div className='col-span-1'>
						<Label htmlFor='city'>City</Label>
						<Input
							id='city'
							type='text'
							value={city}
							onChange={event =>
								dispatch({
									type: CHECKOUT_ACTIONS.SET_SHIPPING,
									field: event.target.id,
									payload: event.target.value,
								})
							}
							placeholder='Kingslanding'
						/>
					</div>

					<div className='col-span-1'>
						<Label htmlFor='postcode'>Postcode</Label>
						<Input
							id='postcode'
							type='text'
							value={postcode}
							onChange={event =>
								dispatch({
									type: CHECKOUT_ACTIONS.SET_SHIPPING,
									field: event.target.id,
									payload: event.target.value,
								})
							}
							placeholder='1012 RW'
						/>
					</div>
				</div>

				<Link href='/dashboard/account/addresses'>
					<a className='text-sm text-slate-500 hover:text-indigo-500 dark:text-zinc-300 hover:dark:text-indigo-500'>
						+ Add different shipping address
					</a>
				</Link>
			</div>
		</>
	)
}

export default Shipping
