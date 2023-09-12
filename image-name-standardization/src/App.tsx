import { Routes, Route } from "react-router-dom"
import RenameFile from "@pages/RenameFile"
import NotFound from "@pages/NotFound"

const App : React.FC = () => {
  return (
    <main>
      <Routes>
        <Route path="/" element={<RenameFile />} />
        <Route path='*' element={<NotFound />} />
      </Routes>
    </main>
  )
}

export default App
