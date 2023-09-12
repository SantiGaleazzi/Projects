import FileCard from "@components/FileCard"
import { ImageFile } from "@interface/ImageFile"

interface ConvertedFilesProps {
  files: ImageFile[]
}

const ConvertedFiles: React.FC<ConvertedFilesProps> = ({ files }) => {
  return (
    <>
      <div className="grid sm:grid-cols-2 xl:grid-cols-3 gap-4">
        {
          files?.map(({ id, name, previewImage, size, project, description }) =>
            <FileCard
              key={id}
              name={name}
              previewImage={previewImage}
              size={size}
              project={project}
              description={description}
            />)
        }
      </div>
    </>
  )
}
export default ConvertedFiles