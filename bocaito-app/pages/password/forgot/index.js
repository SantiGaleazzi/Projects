import { useEffect, useState } from 'react'
import { useAuth } from '@/hooks/useAuth'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faPaperPlane } from '@fortawesome/free-solid-svg-icons'

import Loader from '@/components/Loader'
import Input from '@/components/form/Input'
import Label from '@/components/form/Label'
import Button from '@/components/form/Button'

const ForgotPassword = () => {
	const { forgotPassword } = useAuth({
		middleware: 'guest',
	})

	const [email, setEmail] = useState('')
	const [message, setMessage] = useState('')
	const [errors, setErrors] = useState({})
	const [isSending, setIsSending] = useState(false)

	const handleSubmit = event => {
		event.preventDefault()

		forgotPassword({ email, setErrors, setMessage, setEmail, setIsSending })
	}

	useEffect(() => {
		setErrors(errors)
	}, [errors])

	return (
		<section className='px-5 flex items-center justify-center h-screen'>
			<div className='w-full max-w-sm'>
				<div className='p-8 bg-white dark:bg-zinc-900 rounded-2xl'>
					<div className='border-b border-slate-200 pb-4 mb-4'>
						<div className='text-lg font-semibold mb-1'>Forgot Your Password</div>
						<div className='text-sm text-slate-400 dark:text-zinc-400'>
							Please enter the email address you used to create your account, and we will send you a
							link to reset your password.
						</div>
					</div>

					<form onSubmit={handleSubmit}>
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

						<div className='flex items-center justify-between'>
							<Button className='w-full'>
								{isSending ? (
									<>
										<Loader className='mr-2' /> Sending Link
									</>
								) : (
									<>
										<FontAwesomeIcon icon={faPaperPlane} className='mr-2' /> Send Link
									</>
								)}
							</Button>
						</div>
					</form>
				</div>

				{message && (
					<div className='text-center text-sm text-white font-semibold py-2 bg-green-500 mt-4 rounded-lg'>
						{message}
					</div>
				)}
			</div>
		</section>
	)
}

export default ForgotPassword
