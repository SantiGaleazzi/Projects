import Head from 'next/head'

import DashboardLayout from '@/layouts/Dashboard'

import { useAuth } from '@/hooks/useAuth'

const CreateCoupon = () => {
	useAuth({ middleware: 'auth' })
	return (
		<>
			<Head>
				<title>Bocaito | Create Coupon</title>
			</Head>
		</>
	)
}

CreateCoupon.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export default CreateCoupon
