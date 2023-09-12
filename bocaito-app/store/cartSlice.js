import { createSlice } from '@reduxjs/toolkit'

const initialState = {
	products: [],
	subtotal: 0,
	total: 5,
	isVisible: false,
}

const cartSlice = createSlice({
	name: 'cart',
	initialState,
	reducers: {
		addOneProduct: (state, action) => {
			const product = action.payload
			const productIndex = state.products.findIndex(item => item.id === product.id)
			if (productIndex === -1) {
				state.products.push(product)
			} else {
				state.products[productIndex].quantity += 1
			}
			state.total += product.price
		},
		addQuantityProduct: (state, action) => {
			const product = action.payload
			const productIndex = state.products.findIndex(item => item.id === product.id)
			if (productIndex === -1) {
				state.products.push(product)
			} else {
				state.products[productIndex].quantity = action.payload.quantity
			}
			state.total += product.price * action.payload.quantity
		},
		removeProduct: (state, action) => {
			const product = action.payload
			const productIndex = state.products.findIndex(item => item.id === product.id)
			if (productIndex !== -1) {
				state.products[productIndex].quantity -= 1
				if (state.products[productIndex].quantity === 0) {
					state.products.splice(productIndex, 1)
				} else {
					state.total -= product.price
				}
			}
		},
		deleteProduct: (state, action) => {
			const product = action.payload
			const productIndex = state.products.findIndex(item => item.id === product.id)
			if (productIndex !== -1) {
				state.products.splice(productIndex, 1)
				state.total -= product.price * product.quantity
			}
		},
		calculateTotal: (state, action) => {
			state.total = state.products.reduce((total, product) => {
				return total + product.price * product.quantity
			}, 0)
		},
		toggleCart: state => {
			state.isVisible = !state.isVisible
		},
	},
})

export const {
	addOneProduct,
	addQuantityProduct,
	removeProduct,
	deleteProduct,
	calculateTotal,
	toggleCart,
} = cartSlice.actions
export default cartSlice.reducer
