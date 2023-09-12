import axios from '@/lib/axios'
import { useAuth } from '@/hooks/useAuth'

export const useCategory = () => {
	const { csrf } = useAuth()

	const create = async ({ setName, setSlug, setErrors, setIsCreated, setShowSlug, ...props }) => {
		await csrf()

		setErrors({})

		axios
			.post('/api/categories', props)
			.then(response => {
				if (response.status === 201) {
					setName('')
					setSlug('')
					setErrors({})
					setShowSlug(false)
					setIsCreated(true)

					setTimeout(() => {
						setIsCreated(false)
					}, 4000)
				}
			})
			.catch(error => {
				setName('')
				setSlug('')

				if (error.response.status === 500) {
					setErrors(error.response.data.message)
				} else if (error.response.status === 401) {
					setErrors(error.response.data.message)
				} else {
					setErrors(error.response.data.errors)
				}
			})
	}

	const edit = async ({ id, setName, setSlug, setIsEdited, setErrors, ...props }) => {
		await csrf()

		setErrors({})

		axios
			.put(`/api/categories/${id}`, props)
			.then(response => {
				if (response.status === 201) {
					setErrors({})
					setIsEdited(true)

					setTimeout(() => {
						setIsEdited(false)
					}, 4000)
				}
			})
			.catch(error => {
				if (error.response.status === 500) {
					setErrors(error.response.data.message)
				} else if (error.response.status === 401) {
					setErrors(error.response.data.message)
				} else {
					setErrors(error.response.data.errors)
				}
			})
	}

	const destroy = async ({ id, setIsDeleted }) => {
		await csrf()

		axios
			.delete(`/api/categories/${id}`)
			.then(response => {
				if (response.status === 204) setIsDeleted(true)

				setTimeout(() => {
					setIsDeleted(false)
				}, 4000)
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
