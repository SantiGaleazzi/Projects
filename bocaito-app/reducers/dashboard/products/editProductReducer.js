import { ACTIONS } from '@/reducers/dashboard/products/actions'

export const editProductReducer = (state, action) => {
	switch (action.type) {
		case ACTIONS.SET_FIELDS:
			return {
				...state,
				[action.field]: action.payload,
			}
		case ACTIONS.SET_ERRORS:
			return { ...state, errors: action.payload }
		case ACTIONS.EDIT_SUCCESS:
			return {
				...state,
				errors: {},
				isEdited: action.payload,
			}
		default:
			return state
	}
}
