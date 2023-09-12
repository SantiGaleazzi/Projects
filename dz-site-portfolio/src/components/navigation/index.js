import React, { useState, useCallback } from "react"
import PropTypes from "prop-types"
import Logo from "../Logo"
import Hamburger from "./Hamburger"
import SocialMedia from "../SocialMedia"

import { useHeaderMenu } from "../../hooks/useHeaderMenu"

const Navigation = ({ localUrl, links }) => {
  const [menuOpen, setMenuOpen] = useState(false)
  const menu = useHeaderMenu()

  const handleHamburger = useCallback(() => {
    setMenuOpen(prevState => {
      return !prevState
    })
  }, [])

  return (
    <header className="w-full p-5 lg:py-6 bg-white fixed top-0 left-0 z-50">
      <div className="container">
        <div className="flex items-center justify-between">
          <div className="w-full md:w-auto md:flex-none flex items-center justify-between">
            <div>
              <Logo url={localUrl} />
            </div>

            <Hamburger whenClicked={handleHamburger} menuIsOpen={menuOpen} />
          </div>

          <div
            className={`w-3/5 h-full md:h-auto md:w-auto p-6 md:p-0 bg-white md:flex-1 flex flex-col md:flex-row md:items-center md:justify-end fixed md:relative top-20 md:top-0 left-0 z-40 transition-all duration-150 ease-in-out -translate-x-full md:translate-x-0 
            ${menuOpen && "translate-x-0"} `}
          >
            <div className="flex-none mb-4 md:mb-0 ml-4 md:ml-0 md:mr-4">
              <SocialMedia />
            </div>

            <nav>
              <ul className="has-legacy-dots flex flex-col md:flex-row md:items-center gap-x-2">
                {menu &&
                  menu.map(item => {
                    if (item.children.length > 0) {
                      return (
                        <li
                          key={item.id}
                          className="has-children relative group"
                        >
                          <a
                            href={links.home + item.url}
                            target="_blank"
                            className="text-sm text-digi-blue font-bold px-3 lg:px-4 py-2 uppercase block md:inline-block"
                            rel="noopener noreferrer nofollow"
                          >
                            {item.label}
                          </a>

                          <ul className="ml-6 md:ml-0 md:w-32 md:p-2 bg-white md:absolute md:top-7 md:right-0 z-10 md:opacity-0 md:invisible rounded-md transition-all duration-150 ease-in-out md:drop-shadow-xl group-hover:opacity-100 group-hover:visible">
                            {item.children.map(submenu => (
                              <li
                                key={submenu.id}
                                className="hover:bg-digi-gray rounded-md"
                              >
                                <a
                                  href={links.home + submenu.url}
                                  target="_blank"
                                  className="text-sm text-digi-blue font-bold p-2 block"
                                  rel="noopener noreferrer nofollow"
                                >
                                  {submenu.label}
                                </a>
                              </li>
                            ))}
                          </ul>
                        </li>
                      )
                    }

                    return (
                      <li key={item.id} className="relative">
                        <a
                          href={links.home + item.url}
                          target="_blank"
                          rel="noopener noreferrer nofollow"
                          className="text-digi-blue text-sm font-bold px-3 lg:px-4 py-2 uppercase block md:inline-block"
                        >
                          {item.label}
                        </a>
                      </li>
                    )
                  })}

                <li className="flex-none is-contact mt-3 md:mt-0 md:ml-3">
                  <a
                    href={links.home + links.contact}
                    target="_blank"
                    rel="noopener noreferrer nofollow"
                    className="text-white text-sm font-bold leading-none px-5 py-3 bg-digi-legacy rounded-lg inline-block"
                  >
                    CONTACT US
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>

      <div
        className={` ${
          menuOpen ? "opacity-100 visible" : "opacity-0 invisible"
        } w-full h-full backdrop-blur-sm bg-black bg-opacity-30 fixed z-20 top-20 left-0 transition-all duration-150 ease-in-out block md:hidden`}
      ></div>
    </header>
  )
}

Navigation.propTypes = {
  localUrl: PropTypes.string,
  links: PropTypes.object,
}

Navigation.defaultProps = {
  localUrl: "/",
}

export default Navigation
