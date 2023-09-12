import Head from 'next/head'

import DashboardLayout from '@/layouts/Dashboard'
import ComingSoon from '@/components/ComingSoon'

const Quotes = () => {
	return (
		<>
			<Head>
				<title>Bocaito | Quotes</title>
			</Head>

			<div>
				<div className='flex items-center justify-between mb-4'>
					<div className='text-2xl font-semibold'>Quotes</div>
				</div>

				<ComingSoon />
			</div>
		</>
	)
}

Quotes.getLayout = page => {
	return <DashboardLayout>{page}</DashboardLayout>
}

export default Quotes
