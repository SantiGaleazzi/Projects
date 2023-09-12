import Head from 'next/head'
import TopBar from '@/components/dashboard/TopBar'
import Navigation from '@/components/dashboard/Navigation'

import { useAuth } from '@/hooks/useAuth'
import { useEffect } from 'react'

const DashboardLayout = ({ children }) => {
	const { user } = useAuth({
		middleware: 'auth',
	})

	return (
		<>
			{user && (
				<div className='h-screen flex'>
					<Head>
						<title>Bocaito | Dashboard</title>
					</Head>

					<Navigation user={user} />

					<div className='w-full overflow-y-scroll relative app-content'>
						<TopBar user={user} />
						<div className='container px-5 py-6'>{children}</div>
					</div>
				</div>
			)}
		</>
	)
}

export default DashboardLayout
