import { createSlice, createAsyncThunk } from '@reduxjs/toolkit'
import axios from '@/lib/axios'

const initialState = {
	totalOrders: 0,
	totalQuotes: 0,
}

export const fetchOrders = createAsyncThunk('navigation/fetchOrders', async () => {
	const { data } = await axios.get('/api/orders/pending')
	return data
})

const navigationSlice = createSlice({
	name: 'navigation',
	initialState,
	reducers: {
		getTotalOrders: (state, action) => {
			state.totalOrders = action.payload
		},
		getTotalQuotes: (state, action) => {
			state.totalQuotes = action.payload
		},
	},
	extraReducers: builder => {
		builder.addCase(fetchOrders.pending, state => {
			state.totalOrders = 0
		}),
			builder.addCase(fetchOrders.fulfilled, (state, action) => {
				state.totalOrders = action.payload
			}),
			builder.addCase(fetchOrders.rejected, state => {
				state.totalOrders = 0
			})
	},
})

export const { getTotalOrders, getTotalQuotes } = navigationSlice.actions
export default navigationSlice.reducer
