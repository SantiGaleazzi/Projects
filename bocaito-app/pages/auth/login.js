import Link from 'next/link'
import { useEffect, useState } from 'react'
import { useRouter } from 'next/router'
import { useAuth } from '@/hooks/useAuth'

import Loader from '@/components/Loader'
import Input from '@/components/form/Input'
import Label from '@/components/form/Label'
import Button from '@/components/form/Button'
import Checkbox from '@/components/form/Checkbox'
import Error from '@/components/form/ErrorMessage'

const Login = () => {
	const router = useRouter()

	const { login } = useAuth({
		middleware: 'guest',
	})

	const [email, setEmail] = useState('')
	const [password, setPassword] = useState('')
	const [remember, setRemember] = useState(false)
	const [error, setError] = useState({})
	const [isLoading, setIsLoading] = useState(false)

	const submitForm = async event => {
		event.preventDefault()

		login({ email, password, remember, setError, setEmail, setPassword, setIsLoading })
	}

	useEffect(() => {
		setError(error)
	}, [error])

	return (
		<>
			<section className='px-5 flex items-center justify-center h-screen'>
				<div className='w-full max-w-sm'>
					<div className='p-8 bg-white dark:bg-zinc-900 rounded-xl'>
						<div className='text-center mb-4'>
							<div className='text-2xl font-semibold'>Log in</div>
							<div className='text-sm text-slate-400 dark:text-zinc-400'>
								Enter your credentials
							</div>
						</div>

						<form onSubmit={submitForm}>
							<div className='mb-4'>
								<Label htmlFor='email'>Email</Label>
								<Input
									id='email'
									type='email'
									value={email}
									className={`${error.message && 'border-red-500'}`}
									onChange={event => setEmail(event.target.value)}
									required
									autoFocus
									autoComplete='username'
								/>
							</div>

							<div className='mb-4'>
								<div className='flex items-center justify-between'>
									<Label htmlFor='password'>Password</Label>

									<div>
										<Link href='/password/forgot'>
											<a className='text-xs text-slate-400 dark:text-zinc-400 hover:text-indigo-500 font-semibold'>
												Forgot your password?
											</a>
										</Link>
									</div>
								</div>
								<Input
									id='password'
									type='password'
									value={password}
									className={`${error.message && 'border-red-500'}`}
									onChange={event => setPassword(event.target.value)}
									required
									autoComplete='current-password'
								/>
								{error && <Error message={error.message} />}
							</div>

							<div>
								<Checkbox
									name='remember'
									label='Remember me'
									checked={remember}
									onChange={() => setRemember(!remember)}
								/>
							</div>

							<div className='flex items-center justify-center mt-4'>
								<Button className='w-full ml-3'>{isLoading ? <Loader /> : 'Login'}</Button>
							</div>
						</form>

						<div className='text-sm leading-none flex items-start justify-center mt-4 pt-4 border-t border-slate-200/80 dark:border-zinc-700'>
							<div className='text-slate-400 dark:text-zinc-400 mr-1'>Dont have an account?</div>
							<Link href='/auth/sign-up'>
								<a className='text-indigo-500 font-semibold'>Sign up</a>
							</Link>
						</div>
					</div>

					{router.query.reset === btoa('Passsword reset successfully!') && (
						<div className='text-center text-sm text-white font-semibold py-2 bg-green-500 mt-4 rounded-lg'>
							Your password has been reset
						</div>
					)}
				</div>
			</section>
		</>
	)
}

export default Login
