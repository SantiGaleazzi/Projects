import Link from 'next/link'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faArrowLeftLong } from '@fortawesome/free-solid-svg-icons'

const PageNotFound = () => {
	return (
		<section className='flex items-center justify-center h-screen bg-slate-100/50 dark:bg-zinc-800'>
			<div className='w-full max-w-xl p-8 bg-white dark:bg-zinc-900 rounded-xl'>
				<div className='text-indigo-500 text-2xl font-bold'>404</div>
				<div className='text-7xl font-bold mb-4'>Page not found</div>
				<div className='text-slate-400 dark:text-zinc-400 mb-6'>
					Sorry, the page you are looking for doesn't exist or has been moved. Here are some usefull
					links:
				</div>

				<div className='flex items-center gap-4'>
					<Link href='/'>
						<a className='text-sm text-zinc-900 dark:text-white font-semibold px-4 py-2 bg-white dark:bg-zinc-800 hover:bg-slate-50 border border-slate-300 dark:border-zinc-600 rounded-lg inline-flex items-center transition-colors duration-100 ease-in-out group'>
							<FontAwesomeIcon
								icon={faArrowLeftLong}
								className='group-hover:-translate-x-1  transition-transform duration-100 ease-in-out mr-2'
							/>{' '}
							Back Home
						</a>
					</Link>

					<Link href='/products'>
						<a className='text-sm text-white font-semibold px-4 py-2 bg-indigo-500 rounded-lg inline-flex items-center'>
							View Products
						</a>
					</Link>
				</div>
			</div>
		</section>
	)
}

export default PageNotFound
