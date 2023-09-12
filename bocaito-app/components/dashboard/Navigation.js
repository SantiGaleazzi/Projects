import Link from 'next/link'
import { useEffect } from 'react'
import { useRouter } from 'next/router'
import { useSelector, useDispatch } from 'react-redux'

import { useAuth } from '@/hooks/useAuth'
import { useUser } from '@/hooks/useUser'
import { fetchOrders } from '@/store/dashboard/navigationSlice'

import UserIcon from '@/components/icons/UserIcon'
import ShoppingBag from '@/components/icons/ShoppingBag'
import LogOut from '@/components/icons/LogOut'
import SettingsIcon from '@/components/icons/SettingsIcon'
import DashboardIocn from '@/components/icons/DashboardIcon'
import CustomersIcon from '@/components/icons/CustomersIcon'
import OrdersIcon from '@/components/icons/OrdersIcon'
import QuotesIcon from '@/components/icons/QuotesIcon'
import ProductIcon from '@/components/icons/ProductIcon'

const Navigation = () => {
	const router = useRouter()
	const { totalOrders, totalQuotes } = useSelector(state => state.navigation)
	const { logout } = useAuth()
	const { hasRole } = useUser()
	const dispatch = useDispatch()

	useEffect(() => {
		dispatch(fetchOrders())
	}, [])

	return (
		<div className='w-64 px-5 py-6 h-full border-r border-slate-200/80 dark:border-zinc-700 bg-white dark:bg-zinc-900'>
			<nav className='h-full flex flex-col justify-between'>
				<div>
					<div className='flex items-center justify-between mb-6'>
						<div className='text-2xl font-sans font-semibold'>Cake</div>
						<div className='text-xs text-slate-400 dark:text-zinc-400 font-semibold'>v1.0</div>
					</div>

					<div>
						<div className='mb-4'>
							<div className='text-xs text-slate-400 dark:text-zinc-400 font-semibold mb-2'>
								My Account
							</div>

							<div
								className={`menu-item ${router.pathname == '/dashboard/account/me' && 'active'}`}
							>
								<Link href='/dashboard/account/me'>
									<a>
										<div className='flex items-center'>
											<UserIcon
												className='w-5 mr-3'
												tone='text-indigo-500 dark:text-zinc-300'
												outline='text-slate-600 dark:text-zinc-400'
												opacity='0.3'
											/>
											Profile
										</div>
									</a>
								</Link>
							</div>

							<div
								className={`menu-item ${
									router.pathname == '/dashboard/account/addresses' && 'active'
								}`}
							>
								<Link href='/dashboard/account/addresses'>
									<a>
										<div className='flex items-center'>
											<UserIcon
												className='w-5 mr-3'
												tone='text-indigo-500 dark:text-zinc-300'
												outline='text-slate-600 dark:text-zinc-400'
												opacity='0.3'
											/>
											Addresses
										</div>
									</a>
								</Link>
							</div>

							<div
								className={`menu-item ${
									router.pathname == '/dashboard/account/orders' && 'active'
								}`}
							>
								<Link href='/dashboard/account/orders'>
									<a>
										<div className='flex items-center'>
											<OrdersIcon
												className='w-5 mr-3'
												tone='text-indigo-500 dark:text-zinc-300'
												outline='text-slate-600 dark:text-zinc-400'
												opacity='0.2'
											/>
											Orders
										</div>
									</a>
								</Link>
							</div>
						</div>

						{hasRole('admin') && (
							<>
								<div>
									<div className='text-xs text-slate-400 dark:text-zinc-400 font-semibold mb-2'>
										Admin
									</div>

									<div className={`menu-item ${router.pathname == '/dashboard' && 'active'}`}>
										<Link href='/dashboard'>
											<a>
												<div className='flex items-center'>
													<DashboardIocn
														className='w-5 mr-3'
														tone='text-indigo-500 dark:text-zinc-300'
														outline='text-slate-600 dark:text-zinc-400'
														opacity='0.3'
													/>
													Dashboard
												</div>
											</a>
										</Link>
									</div>

									<div
										className={`menu-item has-dropdown ${
											router.pathname == '/dashboard/products' && 'active'
										}`}
									>
										<Link href='/dashboard/products'>
											<a>
												<div className='flex items-center'>
													<ProductIcon
														className='w-5 mr-3'
														tone='text-indigo-500 dark:text-zinc-300'
														outline='text-slate-600 dark:text-zinc-400'
														opacity='0.3'
													/>
													Products
												</div>
											</a>
										</Link>

										<div>
											<div
												className={`submenu-item has-dropdown ${
													router.pathname == '/dashboard/products/categories' && 'active'
												}`}
											>
												<Link href='/dashboard/products/categories'>
													<a>Categories</a>
												</Link>
											</div>
										</div>
									</div>

									<div
										className={`menu-item ${router.pathname == '/dashboard/quotes' && 'active'}`}
									>
										<Link href='/dashboard/quotes'>
											<a>
												<div className='flex items-center'>
													<QuotesIcon
														className='w-5 mr-3'
														tone='text-indigo-500 dark:text-zinc-300'
														outline='text-slate-600 dark:text-zinc-400'
														opacity='0.3'
													/>
													Quotes
												</div>
												{totalQuotes > 0 && (
													<div
														className={`flex items-center justify-center text-indigo-500 text-xs font-bold leading-none px-3 py-1 ${
															router.pathname == '/dashboard/quotes'
																? 'text-indigo-800 dark:text-white bg-indigo-400 dark:bg-indigo-900/40'
																: ' text-indigo-500 bg-indigo-500/10 dark:bg-indigo-500/30'
														}  rounded-full`}
													>
														{totalQuotes}
													</div>
												)}
											</a>
										</Link>
									</div>

									<div
										className={`menu-item ${router.pathname == '/dashboard/customers' && 'active'}`}
									>
										<Link href='/dashboard/customers'>
											<a>
												<div className='flex items-center'>
													<CustomersIcon
														className='w-5 mr-3'
														tone='text-indigo-500 dark:text-zinc-300'
														outline='text-slate-600 dark:text-zinc-400'
														opacity='0.3'
													/>
													Customers
												</div>
											</a>
										</Link>
									</div>

									<div
										className={`menu-item ${router.pathname == '/dashboard/orders' && 'active'}`}
									>
										<Link href='/dashboard/orders'>
											<a>
												<div className='flex items-center'>
													<OrdersIcon
														className='w-5 mr-3'
														tone='text-indigo-500 dark:text-zinc-300'
														outline='text-slate-600 dark:text-zinc-400'
														opacity='0.2'
													/>
													Orders
												</div>
												{totalOrders > 0 && (
													<div
														className={`flex items-center justify-center text-indigo-500 text-xs font-bold leading-none px-3 py-1 ${
															router.pathname == '/dashboard/orders'
																? 'text-indigo-800 dark:text-white bg-indigo-400 dark:bg-indigo-900/40'
																: ' text-indigo-500 bg-indigo-500/10 dark:bg-indigo-500/30'
														}  rounded-full`}
													>
														{totalOrders}
													</div>
												)}
											</a>
										</Link>
									</div>

									<div
										className={`menu-item ${router.pathname == '/dashboard/coupons' && 'active'}`}
									>
										<Link href='/dashboard/coupons'>
											<a>
												<div className='flex items-center'>
													<OrdersIcon
														className='w-5 mr-3'
														tone='text-indigo-500 dark:text-zinc-300'
														outline='text-slate-600 dark:text-zinc-400'
														opacity='0.2'
													/>
													Coupons
												</div>
											</a>
										</Link>
									</div>

									<div className='menu-item'>
										<Link href='/'>
											<a>
												<div className='flex items-center'>
													<ShoppingBag
														className='w-5 mr-3'
														tone='text-indigo-500 dark:text-zinc-300'
														outline='text-slate-600 dark:text-zinc-400'
														opacity='0.2'
													/>
													Store
												</div>
											</a>
										</Link>
									</div>

									<div
										className={`menu-item ${router.pathname == '/dashboard/settings' && 'active'}`}
									>
										<Link href='/dashboard/settings'>
											<a>
												<div className='flex items-center'>
													<SettingsIcon
														className='w-5 text-slate-600 dark:text-zinc-400 mr-3'
														tone='text-indigo-500 dark:text-zinc-300'
														outline='text-slate-600 dark:text-zinc-400'
														opacity='0.3'
													/>
													Settings
												</div>
											</a>
										</Link>
									</div>
								</div>
							</>
						)}
					</div>
				</div>

				<div>
					<div
						className='w-full text-slate-600 dark:text-zinc-200 font-semibold leading-none flex items-center px-4 py-2 bg-slate-100 dark:bg-zinc-700 rounded-lg transition-colors duration-150 ease-in-out cursor-pointer'
						onClick={logout}
					>
						<LogOut
							className='w-5 mr-3'
							tone='text-indigo-500 dark:text-zinc-300'
							outline='text-slate-600 dark:text-zinc-400'
							opacity='0.3'
						/>
						Logout
					</div>
				</div>
			</nav>
		</div>
	)
}

export default Navigation
