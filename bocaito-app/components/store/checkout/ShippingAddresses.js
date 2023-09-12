import Link from 'next/link'
import axios from '@/lib/axios'
import { useState, useEffect } from 'react'

import Loader from '@/components/Loader'
import { CHECKOUT_ACTIONS } from '@/reducers/checkout/actions'
import AddressOption from '@/components/store/checkout/AddressOption'
import EmptyAddress from '@/components/emptyStates/EmptyAddress'

const ShippingAddresses = ({ shippingSelected, dispatch }) => {
	const [loadingAddresses, setLoadingAddresses] = useState(false)
	const [addresses, setAddresses] = useState([])

	const preSelectPrimaryAddress = address => {
		if (address.primary) {
			const { id, street, city, state, postcode, country } = address
			dispatch({
				type: CHECKOUT_ACTIONS.SET_SHIPPING,
				payload: { id, street, city, state, postcode, country },
			})
		}
	}

	useEffect(() => {
		const loadAddresses = async () => {
			setLoadingAddresses(true)

			await axios.get('/api/me/addresses').then(({ data }) => {
				data.map(address => preSelectPrimaryAddress(address))
				setAddresses(data)
			})

			setLoadingAddresses(false)
		}

		loadAddresses()
	}, [])

	return (
		<>
			{addresses.length > 0 ? (
				<>
					<div className='mb-4'>
						<div className='flex items-center justify-between mb-4'>
							<div className='text-xl font-bold'>Shipping Details</div>

							<Link href='/dashboard/account/addresses/create'>
								<a className='text-sm text-slate-500 hover:text-indigo-500 dark:text-zinc-300 hover:dark:text-indigo-500'>
									+ Add different shipping address
								</a>
							</Link>
						</div>
					</div>

					<div className='grid grid-cols-2 gap-4 mb-2'>
						{addresses.map(address => (
							<AddressOption key={address.id} {...{ address, shippingSelected, dispatch }} />
						))}
					</div>
				</>
			) : (
				<>
					{loadingAddresses ? (
						<div className='py-4 bg-zinc-800 flex justify-center rounded-xl'>
							<Loader />
						</div>
					) : (
						<EmptyAddress />
					)}
				</>
			)}
		</>
	)
}

export default ShippingAddresses
