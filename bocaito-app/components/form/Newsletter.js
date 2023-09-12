import { useState } from 'react'

import Input from '@/components/form/Input'
import Label from '@/components/form/Label'
import Button from '@/components/form/Button'

const Newsletter = () => {
	const [newsletter, setNewsletter] = useState('')

	const handleSubmit = event => {
		event.preventDefault()
	}

	return (
		<form onSubmit={handleSubmit} className='flex items-end'>
			<div className='mr-4'>
				<Label htmlFor='newsletter' required>
					Stay up to date
				</Label>
				<Input
					id='newsletter'
					type='email'
					value={newsletter}
					onChange={event => setNewsletter(event.target.value)}
					placeholder='example@domain.com'
				/>
			</div>
			<Button>Subscribe</Button>
		</form>
	)
}

export default Newsletter
