import { NavLink } from "react-router-dom"

const Navigation : React.FC = () => {
  return (
    <nav className="flex items-center justify-between px-5 py-4 border-b dark:border-zinc-700 bg-zinc-900">
      <div>
        <NavLink to="/">
          Home
        </NavLink>
      </div>

      <div>
        <NavLink to="/rename-file">
          Rename
        </NavLink>
      </div>
    </nav>
  )
}

export default Navigation