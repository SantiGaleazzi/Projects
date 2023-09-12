import { AnimatePresence, motion } from 'framer-motion'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faCheck } from '@fortawesome/free-solid-svg-icons'

import { CHECKOUT_ACTIONS } from '@/reducers/checkout/actions'

const AddressOption = ({ address, shippingSelected, dispatch }) => {
	const { id, street, city, state, postcode, country } = address

	return (
		<>
			<div
				className={`col-span-1 p-4 border rounded-xl relative cursor-pointer transition-colors duration-200 ease-in-out ${
					shippingSelected === id
						? 'bg-blue-300/10 dark:bg-blue-900/10 border-blue-500 dark:border-blue-500'
						: 'bg-white hover:bg-blue-300/10 hover:dark:bg-blue-900/10 dark:bg-zinc-800 hover:border-blue-500 border-slate-200/80 hover:dark:border-blue-500 dark:border-zinc-700'
				}`}
				onClick={() =>
					dispatch({
						type: CHECKOUT_ACTIONS.SET_SHIPPING,
						payload: { id, street, city, state, postcode, country },
					})
				}
			>
				<div className='text-lg font-semibold'>{street}</div>

				<div className='text-sm text-slate-400 dark:text-zinc-400'>
					<div>
						{city}, {state}
					</div>
					<div>{postcode}</div>
					<div>{country}</div>
				</div>

				{shippingSelected === id && (
					<AnimatePresence>
						<motion.div
							initial={{ scale: 0 }}
							animate={{ scale: 1 }}
							exit={{ scale: 0 }}
							className='w-5 h-5 text-white flex items-center justify-center bg-blue-500 rounded-full absolute top-4 right-4'
						>
							<FontAwesomeIcon icon={faCheck} size='xs' />
						</motion.div>
					</AnimatePresence>
				)}
			</div>
		</>
	)
}

export default AddressOption
