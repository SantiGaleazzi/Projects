import ComingSoon from '@/components/ComingSoon'
import DashboardLayout from '@/layouts/Dashboard'

const Settings = () => {
	return (
		<>
			<div className='flex items-center justify-between mb-4'>
				<div className='text-2xl font-semibold'>Settings</div>
			</div>

			<ComingSoon />
		</>
	)
}

Settings.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export default Settings
