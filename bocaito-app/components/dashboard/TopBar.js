import { useAuth } from '@/hooks/useAuth'
import UserDropdown from '@/components/user/UserDropdown'
import ThemesDropdown from '@/components/themes/ThemesDropdown'

const TopBar = () => {
	const { user } = useAuth()

	return (
		<div className='w-full bg-white dark:bg-zinc-900 z-10'>
			<div className='flex items-center justify-between px-5 py-4'>
				<div>
					<div className='text-xl font-semibold'>Welcome, {user.name} 🎉</div>
					<div className='text-sm text-slate-500 dark:text-zinc-400'>
						Here is whats happen in your Cake account.
					</div>
				</div>

				<div className='flex gap-x-4'>
					<ThemesDropdown />
					<UserDropdown {...user} />
				</div>
			</div>
		</div>
	)
}

export default TopBar
