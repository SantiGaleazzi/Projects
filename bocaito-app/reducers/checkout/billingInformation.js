import { CHECKOUT_ACTIONS } from './actions'

export const billingReducer = (state, action) => {
	switch (action.type) {
		case CHECKOUT_ACTIONS.SET_FIELDS:
			return {
				...state,
				[action.field]: action.payload,
			}
		case CHECKOUT_ACTIONS.SET_SHIPPING:
			return {
				...state,
				shippingSelected: action.payload.id,
				shipping: {
					streetAddress: action.payload.street,
					city: action.payload.city,
					state: action.payload.state,
					postcode: action.payload.postcode,
					country: action.payload.country,
				},
			}

		case CHECKOUT_ACTIONS.SET_GIFT:
			return {
				...state,
				isGift: action.payload,
			}
		default:
			return state
	}
}
