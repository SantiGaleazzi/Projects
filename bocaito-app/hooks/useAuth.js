import useSWR from 'swr'
import axios from '@/lib/axios'
import { useEffect } from 'react'
import { useRouter } from 'next/router'

export const useAuth = ({ middleware } = {}) => {
	const router = useRouter()

	const {
		data: user,
		error,
		mutate,
	} = useSWR('/api/me', async url =>
		axios
			.get(url)
			.then(res => res.data)
			.catch(error => {
				if (error.response.status != 409) throw error

				router.push('/auth/verify')
			})
	)

	const csrf = () => axios.get('/sanctum/csrf-cookie')

	const login = async ({ setError, setEmail, setPassword, setIsLoading, ...props }) => {
		await csrf()

		setError({})
		setIsLoading(true)

		axios
			.post('/api/login', props)
			.then(() => {
				mutate()
				router.push('/dashboard')
			})
			.catch(error => {
				setEmail('')
				setPassword('')
				setIsLoading(false)

				if (error.response.status != 422) throw error

				setError(error.response.data.errors)
			})
	}

	const logout = async () => {
		if (user) {
			await axios.post('/api/logout')

			mutate(null)
		}

		router.push('/auth/login')
	}

	const register = async ({ setErrors, ...props }) => {
		await csrf()

		setErrors([])

		axios
			.post('/api/register', props)
			.then(response => {
				localStorage.setItem('auth_token.bocaito', response.data.token)

				mutate()
				router.push('/auth/verify')
			})
			.catch(error => {
				if (error.response.status != 422) throw error

				setErrors(Object.values(error.response.data.errors).flat())
			})
	}

	const forgotPassword = async ({ setErrors, setMessage, setEmail, setIsSending, email }) => {
		await csrf()

		setErrors([])
		setIsSending(true)

		axios
			.post('/api/forgot-password', { email })
			.then(response => {
				setEmail('')
				setMessage(response.data.status)
				setErrors([])
				setIsSending(false)
			})
			.catch(error => {
				setIsSending(false)
				if (error.response.status === 500) {
					setErrors(error.response.data)
				} else {
					setErrors(error.response.data.errors)
				}
			})
	}

	const resetPassword = async ({ setErrors, setLoading, ...props }) => {
		await csrf()

		setErrors({})
		setLoading(true)

		axios
			.post('/api/reset-password', { token: router.query.token, ...props })
			.then(response => {
				setLoading(false)
				router.push('/auth/login?reset=' + btoa(response.data.message))
			})
			.catch(error => {
				setLoading(false)
				if (error.response.status === 500) {
					setErrors(error.response.data)
				} else {
					setErrors(error.response.data.errors)
				}
			})
	}

	const resendEmailVerification = async ({ setStatus, setIsLoading }) => {
		await csrf()

		setStatus('')
		setIsLoading(true)

		axios
			.post('/api/email/verification-notification')
			.then(response => {
				setIsLoading(false)
				setStatus(response.data.message)
			})
			.catch(error => console.dir(error))
	}

	useEffect(() => {
		if (middleware === 'guest' && user) router.push('/')
		if (middleware === 'auth' && !user && error) logout()
	}, [user, error])

	return {
		user,
		csrf,
		login,
		logout,
		register,
		forgotPassword,
		resetPassword,
		resendEmailVerification,
	}
}
