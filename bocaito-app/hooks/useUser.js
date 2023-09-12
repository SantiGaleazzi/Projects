import axios from '@/lib/axios'
import { useAuth } from './useAuth'

export const useUser = () => {
	const { user, csrf } = useAuth()

	const updateProfile = async () => {
		await csrf()

		axios.post('/api/user').then(response => {
			console.log(response.data)
		})
	}

	const getUser = () => {
		return user
	}

	const hasRole = role => {
		return user.roles.includes(role)
	}

	return {
		hasRole,
		getUser,
		updateProfile,
	}
}
