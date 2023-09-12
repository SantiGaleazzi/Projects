import axios from '@/lib/axios'
import { mutate } from 'swr'
import { useAuth } from '@/hooks/useAuth'
import { ME_ACCTIONS } from '@/reducers/dashboard/account/actions'

export const useAddress = () => {
	const { csrf } = useAuth()

	const create = async ({ address, dispatch }) => {
		await csrf()

		dispatch({ type: ME_ACCTIONS.SET_ERRORS, payload: {} })

		axios
			.post('/api/me/addresses', { is_primary: address.isPrimary, ...address })
			.then(response => {
				if (response.status === 201) {
					dispatch({ type: ME_ACCTIONS.CREATE_ADDRESS, payload: true })

					setTimeout(() => {
						dispatch({ type: ME_ACCTIONS.CREATE_ADDRESS, payload: false })
					}, 4000)
				}
			})
			.catch(error => {
				if (error.response.status === 500) {
					dispatch({ type: ME_ACCTIONS.SET_ERRORS, payload: error.response.data.message })
				} else if (error.response.status === 401) {
					dispatch({ type: ME_ACCTIONS.SET_ERRORS, payload: error.response.data.message })
				} else {
					dispatch({ type: ME_ACCTIONS.SET_ERRORS, payload: error.response.data.errors })
				}
			})
	}

	const edit = async ({ address, dispatch }) => {
		await csrf()

		dispatch({ type: ME_ACCTIONS.SET_ERRORS, payload: {} })

		const { id, street, city, state, postcode, country, isPrimary } = address

		axios
			.put(`/api/me/addresses/${id}`, {
				street,
				city,
				state,
				postcode,
				country,
				is_primary: isPrimary,
			})
			.then(response => {
				if (response.status === 201) {
					dispatch({ type: ME_ACCTIONS.UPDATE_ADDRESS, payload: true })

					setTimeout(() => {
						dispatch({ type: ME_ACCTIONS.UPDATE_ADDRESS, payload: false })
					}, 4000)
				}
			})
			.catch(error => {
				console.log(error)
				if (error.response.status === 500) {
					dispatch({ type: ME_ACCTIONS.SET_ERRORS, payload: error.response.data.message })
				} else if (error.response.status === 401) {
					dispatch({ type: ME_ACCTIONS.SET_ERRORS, payload: error.response.data.message })
				} else {
					dispatch({ type: ME_ACCTIONS.SET_ERRORS, payload: error.response.data.errors })
				}
			})
	}

	const destroy = async id => {
		await csrf()

		axios
			.delete(`/api/me/addresses/${id}`)
			.then(response => {
				mutate('/api/me/addresses')
			})
			.catch(error => {
				throw new Error(error)
			})
	}

	const getAddress = async ({ id, dispatch }) => {
		await csrf()

		axios
			.get(`/api/me/addresses/${id}`)
			.then(response => {
				if (response.status === 200) {
					dispatch({ type: ME_ACCTIONS.SET_ADDRESS, payload: response.data })
				}
			})
			.catch(error => {
				if (error.response.status === 500) {
					dispatch({ type: ME_ACCTIONS.SET_ERRORS, payload: error.response.data.message })
				} else if (error.response.status === 401) {
					dispatch({ type: ME_ACCTIONS.SET_ERRORS, payload: error.response.data.message })
				} else {
					dispatch({ type: ME_ACCTIONS.SET_ERRORS, payload: error.response.data.errors })
				}
			})
	}

	return {
		create,
		edit,
		destroy,
		getAddress,
	}
}
