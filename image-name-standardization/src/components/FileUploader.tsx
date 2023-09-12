import React, { useEffect, useRef } from "react";
import { AnimatePresence, motion } from "framer-motion";
import CloseIcon from "@icons/CloseIcon";
import ImageIcon from "@icons/ImageIcon"
import { ImageFile } from "@interface/ImageFile"

interface FileUploaderProps {
  file: ImageFile
  dispatch: React.Dispatch<any>
}

const FileUploader : React.FC<FileUploaderProps> = ({ file, dispatch }) => {

  const imageRef = useRef<HTMLInputElement>(null)

  useEffect(() => {
    if (Object.keys(file).length) {
      imageRef.current ? imageRef.current.value = '' : null
    }
  }, [file])

  return (
    <>
      <div className={`${Object.keys(file).length ? 'border-solid border-blue-500 bg-blue-900/20' : 'bg-zinc-800 border-dashed border-zinc-600 hover:border-solid hover:border-blue-500 hover:bg-blue-900/20' } h-96 border-2 rounded-xl mb-2 relative transition-colors duration-200 ease-in-out`}>
        <input
          ref={imageRef}
          className="cursor-pointer absolute inset-0 z-10 opacity-0"
          type="file"
          id="file"
          name="file"
          accept="image/png, image/jpeg, image/webp"
          onChange={(e: React.ChangeEvent<HTMLInputElement>) => dispatch({ type: 'ADD_FILE', payload: e.target.files![0] })}
        />
        
        <div className="h-full flex items-center justify-center">
          {Object.keys(file).length
            ? (
              <>
                <AnimatePresence>
                  <motion.button
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    exit={{ opacity: 0, y: 20 }}
                    type="button"
                    title="Remove image"
                    className="w-8 h-8 bg-zinc-600 flex items-center justify-center absolute -top-4 -right-4 rounded-full z-20"
                    onClick={() => dispatch({ type: 'REMOVE_IMAGE' })}>
                    <CloseIcon className="w-4" primary="text-whitew" />
                  </motion.button>
                </AnimatePresence>
                <img className="w-full h-full object-contain rounded-lg" src={file.previewImage} alt={file.name} />
              </>
              )
            : (
              <div className="flex flex-col items-center justify-center">
                <ImageIcon className="w-16" primary="text-zinc-400" secondary="text-zinc-400" />
                <div className="text-xl font-semibold mt-2">Select an image</div>
                <div className="text-sm text-zinc-400">or drag and drop it here</div>
              </div>
            )
          }
        </div>
      </div>
      <div className="text-sm"><span className="text-zinc-400">Only</span> PNG, JPEG <span className="text-zinc-400">and</span> WEBP <span className="text-zinc-400">are supported.</span></div>
    </>
  )
}

export default FileUploader