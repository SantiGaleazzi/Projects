import { Link } from 'react-router-dom'

const NotFound: React.FC = () => {
	return (
		<section className='h-screen text-center px-5 flex items-center justify-center'>
      <div className="container">
        <h1 className='text-6xl font-bold'>Page not found</h1>
        <p className='mb-4'>404</p>
        <Link to='/' className='text-white px-4 py-2 bg-blue-500 inline-block rounded-full'>
          Go to home
        </Link>
      </div>
		</section>
	)
}

export default NotFound
