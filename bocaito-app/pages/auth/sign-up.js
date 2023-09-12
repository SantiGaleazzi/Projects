import Link from 'next/link'
import { useState } from 'react'
import { useAuth } from '@/hooks/useAuth'

import Input from '@/components/form/Input'
import Label from '@/components/form/Label'
import Button from '@/components/form/Button'
import AuthValidationErrors from '@/components/form/AuthValidationErrors'

const SignUp = () => {
	const { register } = useAuth({
		middleware: 'guest',
	})

	const [name, setName] = useState('')
	const [lastname, setLastname] = useState('')
	const [email, setEmail] = useState('')
	const [phone, setPhone] = useState('')
	const [password, setPassword] = useState('')
	const [password_confirmation, setPasswordConfirmation] = useState('')
	const [errors, setErrors] = useState([])

	const submitForm = async event => {
		event.preventDefault()

		register({ name, lastname, email, phone, password, password_confirmation, setErrors })
	}

	return (
		<section className='px-5 flex items-center justify-center h-screen'>
			<div className='w-full max-w-xl'>
				<div className='p-8 bg-white dark:bg-zinc-900 rounded-xl'>
					<div className='mb-6'>
						<div className='text-2xl font-semibold mb-1'>Sign Up</div>
						<div className='text-sm text-slate-400 dark:text-zinc-400'>
							Become a member and you will enjoy exclusive deals and offers
						</div>
					</div>

					<form onSubmit={submitForm} className='grid grid-cols-2 gap-x-4'>
						<div className='col-span-2 sm:col-span-1 mb-4'>
							<Label htmlFor='name' required>
								First Name
							</Label>
							<Input
								id='name'
								type='text'
								value={name}
								className='mt-2'
								onChange={event => setName(event.target.value)}
								placeholder='Juan'
								required
								autoFocus
							/>
						</div>

						<div className='col-span-2 sm:col-span-1 mb-4'>
							<Label htmlFor='lastname' required>
								Lastname
							</Label>
							<Input
								id='lastname'
								type='text'
								value={lastname}
								className='mt-2'
								onChange={event => setLastname(event.target.value)}
								placeholder='Perez'
								required
							/>
						</div>

						<div className='col-span-1 mb-4'>
							<Label htmlFor='email' required>
								Email
							</Label>
							<Input
								id='email'
								type='email'
								value={email}
								className='mt-2'
								onChange={event => setEmail(event.target.value)}
								placeholder='example@domain.com'
								required
								autoComplete='username'
							/>
						</div>

						<div className='col-span-1 mb-4'>
							<Label htmlFor='phone' required>
								Phone Number
							</Label>
							<Input
								id='phone'
								type='phone'
								value={phone}
								className='mt-2'
								onChange={event => setPhone(event.target.value)}
								placeholder='(123) 456-1890'
								required
							/>
						</div>

						<div className='col-span-2 sm:col-span-1 mb-4'>
							<Label htmlFor='password' required>
								Password
							</Label>
							<Input
								id='password'
								type='password'
								value={password}
								className='mt-2'
								onChange={event => setPassword(event.target.value)}
								required
								autoComplete='new-password'
							/>
						</div>

						<div className='col-span-2 sm:col-span-1 mb-4'>
							<Label htmlFor='password_confirmation' required>
								Repeat Password
							</Label>
							<Input
								id='password_confirmation'
								type='password'
								value={password_confirmation}
								className='mt-2'
								onChange={event => setPasswordConfirmation(event.target.value)}
								required
								autoComplete='new-password'
							/>
						</div>

						<div className='col-span-2 flex items-center justify-end'>
							<Button className='w-full sm:w-32'>Sign up</Button>
						</div>
					</form>

					<div className='text-sm leading-none flex items-start justify-center mt-4 pt-4 border-t border-slate-200/80 dark:border-zinc-700'>
						<div className='text-slate-400 dark:text-zinc-400 mr-1'>Aleady have an account?</div>
						<Link href='/auth/login'>
							<a className='text-indigo-500 font-semibold'>Log in</a>
						</Link>
					</div>
				</div>

				<AuthValidationErrors className='mt-4' errors={errors} />
			</div>
		</section>
	)
}

export default SignUp
