import AuthValidationErrors from '@/components/form/AuthValidationErrors'

const Modal = ({ children, handleCloseModal, size = 'max-w-2xl', errors }) => {
	return (
		<div className='flex items-center justify-center p-5 fixed inset-0'>
			<div
				onClick={handleCloseModal}
				className='absolute inset-0 backdrop-blur-md bg-slate-900/30'
			></div>
			<div className={`w-full ${size} relative z-10`}>
				<div className='p-8 bg-white rounded-lg'>{children}</div>

				{errors && <AuthValidationErrors className='mt-4' errors={errors} />}
			</div>
		</div>
	)
}

export default Modal
