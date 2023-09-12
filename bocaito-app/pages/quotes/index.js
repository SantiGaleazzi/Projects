import Head from 'next/head'
import { useState } from 'react'

import StoreLayout from '@/layouts/Store'
import QuoteItem from '@/components/store/quotes/QuoteItem'

const quotes = [
	{
		id: 1,
		icon: '🙋🏼‍♂️',
		title: 'Han Solo',
		description: 'Perfect for 5-10 people.',
	},
	{
		id: 2,
		icon: '🫃🏼',
		title: 'Family Guy',
		description: 'Perfect for 10-20 people.',
	},
	{
		id: 3,
		icon: '',
		title: 'Cheaper By The Dozen',
		description: 'Perfect for 40+ people.',
	},
]

const Quotes = () => {
	const [defaultQuotes, setDefaultQuotes] = useState(quotes)
	const [selectedQuote, setSelectedQuote] = useState(null)

	return (
		<>
			<Head>
				<title>Bocaito | Quotes</title>
			</Head>

			<div className='flex flex-col md:flex-row justify-between gap-10'>
				<div className='w-full md:w-2/5'>
					<div className='mb-6'>
						<div className='text-4xl font-semibold mb-1'>Ready for you!</div>
						<div className='tetx-slate-400 dark:text-zinc-400'>
							Choose one from our different options.
						</div>
					</div>

					<div className='flex flex-col gap-y-4'>
						{defaultQuotes.map(quote => (
							<QuoteItem
								key={quote.id}
								{...quote}
								selectedQuote={selectedQuote}
								onClick={() => setSelectedQuote(quote.id)}
							/>
						))}
					</div>
				</div>

				<div className='w-full md:w-2/5'>
					<div className='mb-6'>
						<div className='text-4xl font-semibold mb-1'>Build Your Own!</div>
						<div className='tetx-slate-400 dark:text-zinc-400'>
							Choose one from our different options.
						</div>
					</div>

					<div>
						<div className='p-6 bg-white dark:bg-zinc-900 border-2 border-slate-200/80 dark:border-zinc-700 rounded-xl mb-6'></div>

						<div className='mb-4'>
							<div className='flex items-center justify-between mb-2'>
								<div className='text-sm text-slate-400 dark:text-zinc-400 font-bold'>Items :</div>
								<div className='font-semibold'>$0.00</div>
							</div>

							<div className='flex items-center justify-between mb-2'>
								<div className='text-sm text-slate-400 dark:text-zinc-400 font-bold'>Coupons:</div>
								<div className='font-semibold'>$0.00</div>
							</div>

							<div className='flex items-center justify-between mb-2'>
								<div className='text-sm text-slate-400 dark:text-zinc-400 font-bold'>Subtotal</div>
								<div className='font-semibold'>$0.00</div>
							</div>

							<div className='text-xl font-bold flex items-center justify-between'>
								<div>Order Total</div>
								<div>$0.00</div>
							</div>
						</div>

						<div>
							<button className='w-full text-white font-semibold leading-none p-4 bg-indigo-500 rounded-xl mb-4'>
								Send for Approval
							</button>

							<div className='text-center text-xs text-slate-400 dark:text-zinc-400'>
								By placing your order, you agree to our company{' '}
								<a className='underline' href='#'>
									Privacy Policy
								</a>{' '}
								and{' '}
								<a className='underline' href='#'>
									Terms of Service
								</a>
								.
							</div>
						</div>
					</div>
				</div>
			</div>
		</>
	)
}

Quotes.getLayout = page => {
	return <StoreLayout>{page}</StoreLayout>
}

export default Quotes
