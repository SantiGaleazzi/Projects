import { useReducer } from "react"
import { ImageFile } from "@interface/ImageFile"
import { useFile } from "@hooks/useFile"
import Input from "@components/form/Input"
import Label from "@components/form/Label"
import Button from "@components/form/Button"
import EmptyFiles from "@components/EmptyFiles"
import FileUploader from "@components/FileUploader"
import ItemCountBadge from "@components/ItemCountBadge"
import ConvertedFiles from "@components/ConvertedFiles"
import { fileReducer, FileActionType } from "../reducers/file-reducer"

const RenameFile : React.FC = () => {

  const { getToday, renameFile, capitalizeWord } = useFile()
  
  const [{ project, description, file, renamedFiles, isDisabled }, dispatch] = useReducer(fileReducer, {
    project: '',
    description: '',
    file: {} as ImageFile,
    renamedFiles: [] as ImageFile[],
    isDisabled: true
  })

  const handleRenameFiles = () : void => {

    const newName: string = `${getToday()}-${project}-${description.split(' ').map((word: string) => capitalizeWord(word)).join('-')}`

    dispatch({
      type: FileActionType.ADD_CONVERTED_FILES,
      payload: {
        id: file.id,
        name: newName,
        previewImage: file.previewImage,
        size: file.size,
        project,
        description,
        newFile: renameFile(file.oldFile!, newName)
      }
    }) 
  }

  return (
    <section className="px-6 py-12">
      <div className="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
        <div>
          <div className="p-6 bg-zinc-900 rounded-2xl">
            <div className="flex-grow mb-4">
              <Label htmlFor="file">File</Label>
              <FileUploader file={file} dispatch={dispatch} />
            </div>
            
            <div className="flex-grow mb-4">
              <Label htmlFor="project">Project</Label>
              <Input
                name="project"
                type="text"
                value={project}
                placeholder="Project Name" 
                onChange={(e: React.ChangeEvent<HTMLInputElement>) => dispatch({ type: FileActionType.ADD_PROJECT, payload: e.currentTarget.value })} />
            </div>

            <div className="mb-4">
              <Label htmlFor="description">Description</Label>
              <textarea
                name="description"
                className="w-full px-4 py-2 dark:bg-zinc-800 border dark:border-zinc-600 rounded-xl resize-none"
                value={description}
                placeholder="Additional Information"
                onChange={(e: React.ChangeEvent<HTMLTextAreaElement>) => dispatch({ type: FileActionType.ADD_DESCRIPTION, payload: e.currentTarget.value})} />
            </div>
          
            <div className="flex justify-end">
              <Button onClick={ handleRenameFiles }>Rename File</Button>
            </div>
          </div>
        </div>
        
        <div className="xl:col-span-2">
          <div className="flex items-center justify-between mb-4">
            <div className="flex items-center">
              <div className="text-2xl mr-2">
                Files uploaded
              </div> 
              <ItemCountBadge count={renamedFiles.length} />
            </div>

            { renamedFiles.length > 0 && <Button onClick={() => dispatch({ type: FileActionType.REMOVE_FILES })}>Clear All</Button> }
          </div>

          {renamedFiles.length > 0
            ? <ConvertedFiles files={renamedFiles} />
            : <EmptyFiles />
          }
        </div>
      </div>
    </section>
  )
}
export default RenameFile