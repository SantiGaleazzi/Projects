import Home from '@/pages/'
import { render, screen } from '@testing-library/react'
import '@testing-library/jest-dom'

describe('Home', () => {
	it('renders a heading', () => {
		render(<Home />)

		const heading = screen.getByText(/Welcome to the store!/i)

		expect(heading).toBeInTheDocument()
	})
})
