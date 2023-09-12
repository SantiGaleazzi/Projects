import CloudDownload from '@icons/CloudDownload'

interface DownloadFileProps {
  name: string
  file: string
}

const DownloadFile : React.FC<DownloadFileProps> = ({ name, file }) => {

  return (
    <>
      <a className="w-8 h-8 flex items-center justify-center bg-slate-700 rounded-full absolute bottom-3 right-3" href={file} download={name}>
        <CloudDownload className="w-4" />
      </a>
    </>
  )
}

export default DownloadFile