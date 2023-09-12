import ComingSoon from '@/components/ComingSoon'
import CreateNew from '@/components/dashboard/CreateNew'
import DashboardLayout from '@/layouts/Dashboard'

const Dashboard = () => {
	return (
		<>
			<div className='flex items-center justify-between mb-4'>
				<div className='text-2xl font-semibold'>Dashboard</div>
				<div>
					<CreateNew options={['product', 'category']} />
				</div>
			</div>

			<ComingSoon />
		</>
	)
}

Dashboard.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export default Dashboard
