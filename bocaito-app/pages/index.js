import StoreLayout from '@/layouts/Store'

const Home = () => {
	return (
		<>
			<div className='text-4xl font-semibold'>Welcome to the store!</div>
		</>
	)
}

Home.getLayout = page => {
	return <StoreLayout>{page}</StoreLayout>
}

export default Home
