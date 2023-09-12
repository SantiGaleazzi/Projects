import React, { useState } from "react"
import Logo from "../Logo"
import { Link } from "gatsby"
import Hamburger from "./Hamburger"
import { useGetClients } from "../../hooks/useGetClients"

const Navigation = ({ localUrl }) => {
  const [menuOpen, setMenuOpen] = useState(false)
  const clients = useGetClients()

  const handleHamburger = () => {
    setMenuOpen(prevState => {
      return !prevState
    })
  }

  return (
    <header className="w-full p-5 lg:py-6 bg-white fixed top-0 left-0 z-50">
      <div className="container">
        <div className="flex items-center justify-between">
          <div className="w-full md:w-auto md:flex-none flex items-center justify-between">
            <Logo navType="single" url={localUrl} />

            <Hamburger whenClicked={handleHamburger} menuIsOpen={menuOpen} />
          </div>

          <div
            className={`w-3/5 h-full md:h-auto md:w-auto p-6 md:p-0 bg-white md:flex-1 flex flex-col md:flex-row md:items-center md:justify-end fixed md:relative top-20 md:top-0 left-0 z-40 transition-all duration-150 ease-in-out -translate-x-full md:translate-x-0 ${
              menuOpen ? "translate-x-0" : ""
            } `}
          >
            <ul className="has-dots flex flex-col md:flex-row md:items-center gap-x-10">
              {clients?.map((client, index) => (
                <li
                  key={index}
                  className="md:leading-none mb-2 md:mb-0 last:mb-0"
                >
                  <Link
                    to={"/client/" + client.slug}
                    className="text-digi-blue md:text-sm lg:text-base font-medium inline-block uppercase"
                    activeClassName="font-bold"
                  >
                    {client.title}
                  </Link>
                </li>
              ))}
            </ul>
          </div>
        </div>
      </div>

      <div
        className={`${
          menuOpen ? "opacity-100 visible" : "opacity-0 invisible"
        } w-full h-full backdrop-blur-sm bg-black bg-opacity-30 fixed z-20 top-20 left-0 transition-all duration-150 ease-in-out block md:hidden`}
      ></div>
    </header>
  )
}

export default Navigation
