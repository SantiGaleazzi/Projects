import { ME_ACCTIONS } from '@/reducers/dashboard/account/actions'

export const meReducer = (state, action) => {
	switch (action.type) {
		case ME_ACCTIONS.SET_FIELDS:
			return {
				...state,
				[action.field]: action.payload,
			}
		case ME_ACCTIONS.CREATE_ADDRESS:
			return {
				...state,
				street: '',
				city: '',
				state: '',
				postcode: '',
				country: '',
				isPrimary: false,
				errors: {},
				isCreated: action.payload,
			}
		case ME_ACCTIONS.SET_ADDRESS:
			return {
				...state,
				...action.payload,
			}
		case ME_ACCTIONS.UPDATE_ADDRESS:
			return {
				...state,
				isEdited: action.payload,
			}
		case ME_ACCTIONS.SET_ERRORS:
			return {
				...state,
				errors: action.payload,
			}
		default:
			return state
	}
}
