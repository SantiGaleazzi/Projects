import { AnimatePresence, motion } from "framer-motion"
import DownloadFile from "@components/DownloadFile"

interface FileCardProps {
  name: string
  previewImage: string
  size: string
  project: string
  description: string
}

const FileCard: React.FC<FileCardProps> = ({ name, previewImage, size, project, description }) => {
  return (
    <AnimatePresence>
      <motion.div
        initial={{ opacity: 0, y: 20 }}
        animate={{ opacity: 1, y: 0 }}
        exit={{ opacity: 0, y: 20 }}
        className="bg-zinc-700 rounded-xl overflow-hidden">
        <div className="h-40 relative">
          <img className="w-full h-full object-cover" src={previewImage} alt={name} />

          <DownloadFile name={name} file={previewImage} />
          
          <div className="text-sm leading-none px-3 py-2 bg-black drop-shadow-md absolute bottom-3 left-3 rounded-full">
            {size}
          </div>
        </div>
        <div className="p-4">
          <div className="font-semibold">
           {project}
          </div>
          <div className="text-zinc-300 truncate">
            {description}
          </div>
        </div>
      </motion.div>
    </AnimatePresence>
  )
}

export default FileCard