import { useAuth } from '@/hooks/useAuth'

import DashboardLayout from '@/layouts/Dashboard'

const Profile = () => {
	useAuth({ middleware: 'auth' })

	return <>Account</>
}

Profile.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export default Profile
