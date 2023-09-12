const AuthValidationErrors = ({ errors = [], ...props }) => (
	<>
		{errors.length > 0 && (
			<div {...props}>
				<div className='text-center text-sm font-semilbold text-white px-4 py-2 bg-red-500 rounded-lg'>
					Whoops! Something went wrong.
				</div>

				<ul className='text-center text-sm text-red-500 mt-3 list-inside'>
					{errors.map(error => (
						<li key={error} className='font-semilbold'>
							{error}
						</li>
					))}
				</ul>
			</div>
		)}
	</>
)

export default AuthValidationErrors
