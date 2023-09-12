import { configureStore } from '@reduxjs/toolkit'
import navigationReducer from '@/store/dashboard/navigationSlice'
import cartReducer from '@/store/cartSlice'

const store = configureStore({
	reducer: {
		navigation: navigationReducer,
		cart: cartReducer,
	},
	devTools: true,
})

export default store
