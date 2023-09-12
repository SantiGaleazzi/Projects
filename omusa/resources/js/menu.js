const container_searcher = document.querySelector('.container-searcher')
const search_button = container_searcher?.querySelector('.search-button')

search_button?.addEventListener('click', () => {
	container_searcher.querySelector('.searcher').classList.toggle('searcher-full')
})
