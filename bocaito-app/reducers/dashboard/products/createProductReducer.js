import { ACTIONS } from '@/reducers/dashboard/products/actions'

export const createProductReducer = (state, action) => {
	switch (action.type) {
		case ACTIONS.SET_FIELDS:
			return {
				...state,
				[action.field]: action.payload,
			}
		case ACTIONS.UPDATE_SLUG:
			return { ...state, slug: action.payload }
		case ACTIONS.CLEAR_STOCK:
			return { ...state, stock: '' }
		case ACTIONS.SET_ERRORS:
			return { ...state, errors: action.payload }
		case ACTIONS.CREATE_SUCCESS:
			return {
				...state,
				category: '',
				name: '',
				description: '',
				note: '',
				price: '',
				stock: '',
				errors: {},
				isAvailable: false,
				isManageable: false,
				isCreated: action.payload,
			}
		default:
			return state
	}
}
