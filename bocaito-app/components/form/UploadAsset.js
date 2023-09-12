import { useEffect, useState } from 'react'
import Error from '@/components/form/ErrorMessage'

const UploadAsset = ({ image, error = '', ...props }) => {
	const [picture, setPicture] = useState(null)

	const removePicture = event => {
		event.preventDefault()
		setPicture('')
	}

	useEffect(() => {
		if (image) {
			setPicture(URL.createObjectURL(image))
		}
	}, [image])

	return (
		<div>
			<div className='h-48 bg-slate-100 dark:bg-zinc-800 border-2 border-dashed dark:border-zinc-700 rounded-lg relative'>
				{picture ? (
					<>
						<div className='h-full relative'>
							<img src={picture} className='w-full h-full object-cover rounded-lg' />
							<button
								className='text-xs text-slate-400 dark:text-zinc-600 font-semibold leading-none p-2 bg-white rounded-md absolute bottom-3 right-3 shadow-md'
								onClick={removePicture}
							>
								Remove
							</button>
						</div>
					</>
				) : (
					<div className='h-full flex items-center justify-center relative'>
						<input
							type='file'
							className='bg-red-300 opacity-0 cursor-pointer rounded-lg absolute inset-0 z-20'
							{...props}
						/>
						<button className='text-xs text-white font-semibold leading-none p-2 bg-indigo-600 rounded-md z-10'>
							Choose File
						</button>
					</div>
				)}
			</div>
			{error && <Error message={error} />}
		</div>
	)
}

export default UploadAsset
