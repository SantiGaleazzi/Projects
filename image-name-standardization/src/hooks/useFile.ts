export const useFile = () => {

	const getToday = () : string => {
		const today = new Date()
		const dd = String(today.getDate()).padStart(2, '0')
		const mm = String(today.getMonth() + 1).padStart(2, '0')
		const yyyy = today.getFullYear().toString().substring(2)

		return `${yyyy}${mm}${dd}`
	}

	const calculateFileSize = (size : number) : string => {
		if (size < 1024) {
			return `${size} bytes`
		} else if (size >= 1024 && size < 1048576) {
			return `${(size / 1024).toFixed(3)} KB`
		} else if (size >= 1048576) {
			return `${(size / 1048576).toFixed(3)} MB`
		}
		return ''
	}

	const renameFile = (file: File, newName : string): File | Blob  => {
		try {
			return new File([file], newName, { type: file.type })
		} catch (error) {
			return new Blob([file], { type: file.type })
		}
	}

	const capitalizeWord = (text : string ) : string => {
		return text.charAt(0).toUpperCase() + text.slice(1)
	}

	return {
		getToday,
		renameFile,
		capitalizeWord,
		calculateFileSize,
	}
}
