import { useReducer } from 'react'
import { useSelector } from 'react-redux'

import { useAuth } from '@/hooks/useAuth'
import { billingReducer } from '@/reducers/checkout/billingInformation'

import StoreLayout from '@/layouts/Store'

import Card from '@/components/Card'
import Billing from '@/components/store/checkout/Billing'
import OrderSummary from '@/components/store/checkout/OrderSummary'
import EmptyCart from '@/components/emptyStates/EmptyCart'
import ShippingAddresses from '@/components/store/checkout/ShippingAddresses'

const Checkout = () => {
	const { user } = useAuth()

	const [state, dispatch] = useReducer(billingReducer, {
		name: user?.name,
		lastname: user?.lastname,
		email: user?.email,
		phone: user?.phone,
		shippingSelected: null,
		shipping: {
			id: null,
			streetAddress: '',
			city: '',
			state: '',
			postcode: '',
			country: '',
		},
		billing: {
			streetAddress: '',
			city: '',
			state: '',
			postcode: '',
			country: '',
		},
	})

	const { products } = useSelector(state => state.cart)

	const { name, lastname, email, phone, shippingSelected, shipping } = state

	if (!products.length) {
		return <EmptyCart />
	}

	return (
		<div>
			<div className='text-center mb-10'>
				<div className='text-4xl font-semibold mb-2'>Order Summary</div>
				<div className='text-slate-400 dark:text-zinc-400'>
					Review your order and complete your purchase.
				</div>
			</div>

			<div className='flex flex-col lg:flex-row gap-x-10 gap-y-6'>
				<div className='w-full lg:w-3/5'>
					<Card>
						<Billing {...{ name, lastname, email, phone, dispatch }} />
						<ShippingAddresses {...{ shippingSelected, dispatch }} />
					</Card>
				</div>

				<div className='w-full lg:w-2/5'>
					<OrderSummary />
				</div>
			</div>
		</div>
	)
}

Checkout.getLayout = page => {
	return <StoreLayout>{page}</StoreLayout>
}

export default Checkout
