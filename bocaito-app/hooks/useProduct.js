import axios from '@/lib/axios'
import { useAuth } from '@/hooks/useAuth'

import { ACTIONS } from '@/reducers/dashboard/products/actions'

export const useProduct = () => {
	const { csrf } = useAuth()

	const create = async ({ category, isAvailable, dispatch, ...props }) => {
		await csrf()

		dispatch({ type: ACTIONS.SET_ERRORS, payload: {} })

		axios
			.post('/api/products', { category: category?.id, available: isAvailable, ...props })
			.then(response => {
				if (response.status === 201) {
					dispatch({ type: ACTIONS.CREATE_SUCCESS, payload: true })

					setTimeout(() => {
						dispatch({ type: ACTIONS.CREATE_SUCCESS, payload: false })
					}, 3000)
				}
			})
			.catch(error => {
				if (error.response.status === 500) {
					dispatch({ type: ACTIONS.SET_ERRORS, payload: error.response.data.message })
				} else if (error.response.status === 401) {
					dispatch({ type: ACTIONS.SET_ERRORS, payload: error.response.data.message })
				} else {
					dispatch({ type: ACTIONS.SET_ERRORS, payload: error.response.data.errors })
				}
			})
	}

	const edit = async ({ id, category, isAvailable, dispatch, ...props }) => {
		await csrf()

		dispatch({ type: ACTIONS.SET_ERRORS, payload: {} })

		axios
			.put(`/api/products/${id}`, { category: category?.id, available: isAvailable, ...props })
			.then(response => {
				if (response.status === 201) {
					dispatch({ type: ACTIONS.EDIT_SUCCESS, payload: true })

					setTimeout(() => {
						dispatch({ type: ACTIONS.EDIT_SUCCESS, payload: false })
					}, 3000)
				}
			})
			.catch(error => {
				if (error.response.status === 500) {
					dispatch({ type: ACTIONS.SET_ERRORS, payload: error.response.data.message })
				} else if (error.response.status === 401) {
					dispatch({ type: ACTIONS.SET_ERRORS, payload: error.response.data.message })
				} else {
					dispatch({ type: ACTIONS.SET_ERRORS, payload: error.response.data.errors })
				}
			})
	}

	const destroy = async ({ id }) => {
		await csrf()

		axios
			.delete(`/api/products/${id}`)
			.then(response => {
				console.log(response)
			})
			.catch(error => {
				console.log(error)
			})
	}

	return {
		create,
		edit,
		destroy,
	}
}
