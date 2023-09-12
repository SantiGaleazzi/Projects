import { useState, useCallback } from 'react'
import Link from 'next/link'
import Search from '@/components/store/Search'

import { useAuth } from '@/hooks/useAuth'
import User from '@/components/user/UserDropdown'
import GoodiesBag from '@/components/store/cart/GoodiesBag'
import ThemesDropdown from '@/components/themes/ThemesDropdown'
import Hamburger from '@/components/Hamburger'

const Header = () => {
	const { user, logout } = useAuth()
	const [menuIsOpen, setMenuIsOpen] = useState(false)

	const handleHamburger = useCallback(() => {
		setMenuIsOpen(prevState => {
			return !prevState
		})
	}, [])

	return (
		<header>
			<div className='container'>
				<nav role='navigation'>
					<div className='nav-header'>
						<Hamburger menuIsOpen={menuIsOpen} whenClicked={handleHamburger} />

						<Link href='/'>
							<a className='hover:text-indigo-500'>My Logo</a>
						</Link>
					</div>

					<ul className={`nav-list ${menuIsOpen ? 'open' : ''}`}>
						<li className='main-menu-item'>
							<Link href='/products'>
								<a className='main-menu-link'>Store</a>
							</Link>
						</li>

						<li className='main-menu-item'>
							<Link href='/quotes'>
								<a className='main-menu-link'>Quotes</a>
							</Link>
						</li>

						<li className='main-menu-item'>
							<Link href='/checkout'>
								<a className='main-menu-link'>Checkout</a>
							</Link>
						</li>

						<ThemesDropdown />

						{user ? (
							<div className='flex items-center gap-x-6 '>
								<User {...user} />
								<button className='hover:text-indigo-500' onClick={logout}>
									Logout
								</button>
							</div>
						) : (
							<>
								<li className='main-menu-item'>
									<Link href='/auth/login'>
										<a className='main-menu-link'>Login</a>
									</Link>
								</li>

								<li className='main-menu-item'>
									<Link href='/auth/sign-up'>
										<a className='main-menu-link'>Sign up</a>
									</Link>
								</li>
							</>
						)}

						<GoodiesBag />
					</ul>
				</nav>
			</div>
		</header>
	)
}

export default Header
