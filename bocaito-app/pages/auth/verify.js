import { useState } from 'react'
import { useAuth } from '@/hooks/useAuth'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faPaperPlane } from '@fortawesome/free-solid-svg-icons'

import Button from '@/components/form/Button'
import Loader from '@/components/Loader'

const Verify = () => {
	const { resendEmailVerification } = useAuth({
		middleware: 'guest',
	})

	const [status, setStatus] = useState('')
	const [isLoading, setIsLoading] = useState(false)

	const submitForm = event => {
		event.preventDefault()

		resendEmailVerification({ setStatus, setIsLoading })
	}

	return (
		<section className='px-5 flex items-center justify-center h-screen'>
			<div className='w-full max-w-md'>
				<div className='p-8 bg-white dark:bg-zinc-900 rounded-xl'>
					<div className='text-2xl font-semibold mb-2'>Thanks for signing up! 🎉</div>
					<div className='text-slate-400 dark:text-zinc-400 mb-6'>
						Before getting started, could you verify your email address by clicking on the link we
						just email you?
					</div>

					<div className='0 mb-6'>
						A new verification link has been sent to the email address you provided during
						registration.
					</div>

					<form onSubmit={submitForm}>
						<Button className='w-full'>
							{isLoading ? (
								<Loader className='mr-2' />
							) : (
								<FontAwesomeIcon icon={faPaperPlane} className='mr-2' />
							)}
							Resend Verification Email
						</Button>
					</form>
				</div>
				{status && (
					<div className='text-center text-white font-semibold py-2 bg-green-500 rounded-lg mt-4'>
						{status}
					</div>
				)}
			</div>
		</section>
	)
}

export default Verify
