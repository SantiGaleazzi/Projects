import DashboardLayout from '@/layouts/Dashboard'

import Switch from '@/components/form/Switch'

const Appearance = () => {
	return <div>This is the appearance</div>
}

Appearance.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export default Appearance
