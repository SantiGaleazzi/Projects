import { useState, useMemo, useRef } from 'react'
import { createAutocomplete } from '@algolia/autocomplete-core'

const Search = props => {
	const [autoCompleteState, setAutocompleteState] = useState({
		collections: [],
		isOpen: false,
	})

	const autocomplete = useMemo(
		() =>
			createAutocomplete({
				placeholder: 'Busca productos',
				onStateChange: ({ state }) => setAutocompleteState(state),
				getSources: () => [
					{
						sourceId: 'products-api',
						getItems: ({ query }) => {
							if (!!query) {
								return fetch('http://bocaito-laravel.test/api/products/').then(response =>
									response.json()
								)
							}

							return []
						},
					},
				],
				...props,
			}),
		[props]
	)

	const formRef = useRef(null)
	const inputRef = useRef(null)
	const resultsPanel = useRef(null)

	const formProps = autocomplete.getFormProps({
		inputElement: inputRef.current,
	})

	const inputProps = autocomplete.getInputProps({
		inputElement: inputRef.current,
	})

	return (
		<form ref={formRef} className='flex items-center relative' {...formProps}>
			<div className='p-1 bg-gradient-to-tr from-indigo-600 bg-purple-400 rounded-full'>
				<input
					ref={inputRef}
					className='flex-1 px-4 py-1 rounded-full'
					type='search'
					{...inputProps}
				/>
			</div>
			{autoCompleteState.isOpen && (
				<div
					className='absolute bg-white rounded-lg'
					ref={resultsPanel}
					{...autocomplete.getPanelProps()}
				>
					{autoCompleteState.collections.map((collection, index) => {
						const { items } = collection

						return (
							<div key={`collection-${index}`}>
								{items.length > 0 && (
									<div {...autocomplete.getListProps()}>
										{items.map(item => (
											<div key={item.id}>{item.name}</div>
										))}
									</div>
								)}
							</div>
						)
					})}
				</div>
			)}
		</form>
	)
}

export default Search
