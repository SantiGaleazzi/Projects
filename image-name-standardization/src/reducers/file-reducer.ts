import { useFile } from '@hooks/useFile'
import { ImageFile } from "@interface/ImageFile"

export enum FileActionType {
	ADD_PROJECT = 'ADD_PROJECT',
	ADD_DESCRIPTION = 'ADD_DESCRIPTION',
	ADD_FILE = 'ADD_FILE',
	ADD_CONVERTED_FILES = 'ADD_CONVERTED_FILES',
	REMOVE_IMAGE = 'REMOVE_IMAGE',
	REMOVE_FILES = 'REMOVE_FILES',
}

type ReducerState = {
	project: string
	description: string
	file: ImageFile
	renamedFiles: ImageFile[] | []
	isDisabled: boolean
}

type ProjectPayload = {
	type: FileActionType.ADD_PROJECT
	payload: string
}

type DescriptionPayload = {
	type: FileActionType.ADD_DESCRIPTION
	payload: string
}

type FilePayload = {
	type: FileActionType.ADD_FILE
	payload: File
}

type RemoveImagePayload = {
	type: FileActionType.REMOVE_IMAGE
	payload?: null
}

type AddConvertedFilesPayload = {
	type: FileActionType.ADD_CONVERTED_FILES
	payload: ImageFile
}

type RemoveFilesPayload = {
	type: FileActionType.REMOVE_FILES
	payload?: null
}

type ReducerAction =
	| DescriptionPayload
	| ProjectPayload
	| FilePayload
	| RemoveImagePayload
	| AddConvertedFilesPayload
	| RemoveFilesPayload

const { calculateFileSize } = useFile()

export const fileReducer = (state: ReducerState, action: ReducerAction): ReducerState => {
	
	const { type, payload } = action

	switch (type) {
		case FileActionType.ADD_PROJECT:
			return {
				...state,
				project:  payload.toUpperCase(),
			}
		case FileActionType.ADD_DESCRIPTION:			
			return {
				...state,
				description: payload,
			}
		case FileActionType.ADD_FILE:
			return {
				...state,
				file: {
					id: state.renamedFiles.length + 1,
					name:  payload.name,
					previewImage: URL.createObjectURL( payload ),
					size: calculateFileSize(payload.size),
					project: state.project,
					description: state.description,
					oldFile: payload,
				},
			}
		case FileActionType.ADD_CONVERTED_FILES:
			return {
				...state,
				project: '',
				description: '',
				file: {} as ImageFile,
				renamedFiles: [...state.renamedFiles, payload],
			}
		case FileActionType.REMOVE_IMAGE:
			return {
				...state,
				file: {} as ImageFile,
			}
		case FileActionType.REMOVE_FILES:
			return {
				...state,
				renamedFiles: [],
			}
		default:
			return state
	}
}
