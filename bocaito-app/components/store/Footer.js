import Link from 'next/link'
import { useAuth } from '@/hooks/useAuth'

const Footer = () => {
	const { user, logout } = useAuth()

	return (
		<footer>
			<div className='px-5 py-16 bg-slate-100 dark:bg-zinc-900'>
				<div className='container'>
					<div className='flex flex-col sm:flex-row gap-8'>
						<div className='w-full sm:w-1/4 text-center sm:text-left'>
							<div className='text-3xl font-semibold'>Bocaito</div>
							<div>Live is short, so sweet it.</div>
						</div>

						<div className='w-full sm:w-3/4'>
							<div className='menu'>
								<div className='main-menu-item'>
									<div className='main-menu-head has-children'>My Account</div>

									<div className='children-options'>
										<div className='sub-menu-item'>
											<Link href='/dashboard/account/me'>
												<a className='sub-menu-link'>Profile</a>
											</Link>
										</div>

										<div className='sub-menu-item'>
											<Link href='/dashboard/account/addresses'>
												<a className='sub-menu-link'>Addresses</a>
											</Link>
										</div>

										<div className='sub-menu-item'>
											<Link href='/dashboard/account/orders'>
												<a className='sub-menu-link'>Orders</a>
											</Link>
										</div>

										{user && (
											<div>
												<button className='text-sm' onClick={logout}>
													Logout
												</button>
											</div>
										)}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div className='px-5 py-6 bg-white'>
				<div className='container'>
					<div className='text-center text-sm text-slate-400 dark:text-zinc-800'>
						© {new Date().getFullYear()} Bocaito. All rights reserved.
					</div>
				</div>
			</div>
		</footer>
	)
}

export default Footer
