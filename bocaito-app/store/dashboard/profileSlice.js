import axios from 'axios'
import { createSlice, createAsyncThunk } from '@reduxjs/toolkit'

const initialState = {
	name: '',
	lastName: '',
	phone: '',
	address: {
		street: '',
		city: '',
		postcode: '',
	},
	birthDate: '',
}

export const fethcUser = createAsyncThunk('user/fetchUser', async () => {
	const { data } = await axios.get('https://jsonplaceholder.typicode.com/users/1')
	return data
})

const profileSlice = createSlice({
	name: 'profile',
	initialState,
	extraReducers: builder => {
		builder.addCase(fethcUser.pending, (state, action) => {
			state.loading = true
		})
		builder.addCase(fethcUser.fulfilled, (state, action) => {
			state.loading = false
			state.name = action.payload.name
			state.lastName = action.payload.lastName
			state.phone = action.payload.phone
			state.address = action.payload.address
			state.birthDate = action.payload.birthDate
		})
		builder.addCase(fethcUser.rejected, (state, action) => {
			state.loading = false
			state.error = action.error.message
		})
	},
})

export default profileSlice.reducer
