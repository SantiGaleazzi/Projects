import { useState } from 'react'
import { useAuth } from '@/hooks/useAuth'

import Loader from '@/components/Loader'
import Input from '@/components/form/Input'
import Label from '@/components/form/Label'
import Button from '@/components/form/Button'

const ResetPassword = () => {
	const { resetPassword } = useAuth({
		middleware: 'guest',
	})

	const [email, setEmail] = useState('')
	const [password, setPassword] = useState('')
	const [isLoading, setLoading] = useState(false)
	const [password_confirmation, setPasswordConfirmation] = useState('')
	const [errors, setErrors] = useState({})

	const submitForm = async event => {
		event.preventDefault()

		resetPassword({ email, password, password_confirmation, setErrors, setLoading })
	}

	return (
		<section className='px-5 flex items-center justify-center h-screen'>
			<div className='w-full max-w-sm'>
				<div className='p-8 bg-white dark:bg-zinc-900 rounded-2xl'>
					<div className='border-b border-slate-200/80 dark:border-zinc-700 pb-4 mb-4'>
						<div className='text-lg font-semibold'>Reset Your Password</div>
						<div className='text-sm text-slate-400 dark:text-zinc-400'>
							Enter your email and your new password
						</div>
					</div>

					<form onSubmit={submitForm}>
						<div className='mb-4'>
							<Label htmlFor='email' className='mb-2'>
								Email
							</Label>
							<Input
								id='email'
								type='email'
								value={email}
								error={errors.message}
								onChange={event => setEmail(event.target.value)}
								placeholder='example@domain'
								required
								autoFocus
								autoComplete='username'
							/>
						</div>

						<div className='mb-4'>
							<Label htmlFor='password'>Password</Label>
							<Input
								id='password'
								type='password'
								value={password}
								error={errors.password}
								onChange={event => setPassword(event.target.value)}
								required
								autoComplete='new-password'
							/>
						</div>

						<div className='mb-4'>
							<Label htmlFor='password_confirmation'>Repeat Password</Label>
							<Input
								id='password_confirmation'
								type='password'
								value={password_confirmation}
								error={errors.password_confirmation}
								onChange={event => setPasswordConfirmation(event.target.value)}
								required
								autoComplete='new-password'
							/>
						</div>

						<div className='flex items-center justify-between'>
							<Button className='w-full'>{isLoading ? <Loader /> : 'Reset Password'}</Button>
						</div>
					</form>
				</div>
			</div>
		</section>
	)
}

export default ResetPassword
