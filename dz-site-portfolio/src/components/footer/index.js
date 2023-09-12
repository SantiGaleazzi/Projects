import * as React from "react"
import PropTypes from "prop-types"

import Logo from "../Logo"
import SocialMedia from "../SocialMedia"

import { useFooterMenu } from "../../hooks/useFooterMenu"

const Footer = ({ siteName, localUrl, links, address }) => {
  const menu = useFooterMenu()

  return (
    <footer className="px-5 py-8 md:py-12 bg-white border-t">
      <div className="container">
        <div className="flex flex-col md:flex-row justify-between">
          <div>
            <div className="flex flex-col lg:flex-row items-center md:items-start lg:items-center mb-5">
              <div className="mb-5 lg:mb-0 lg:mr-10">
                <Logo url={localUrl} />
              </div>

              <SocialMedia />
            </div>

            <div className="text-center md:text-left text-digi-blue font-medium mb-4">
              <div>{address.street1}</div>
              <div>
                {address.city} {address.pc}
              </div>
            </div>

            <div className="flex flex-col lg:flex-row items-center md:items-start lg:items-center justify-center md:justify-start gap-x-2 lg:gap-x-3 text-digi-blue font-medium mb-5 md:mb-0">
              <div>
                © {new Date().getFullYear()} {siteName}
              </div>

              <div className="hidden lg:inline-block w-1 h-1 bg-digi-blue rounded-full"></div>

              <div>
                <a
                  href={links.home + links.privacy}
                  className="text-digi-legacy underline"
                >
                  Privacy Policy
                </a>
              </div>

              <div className="hidden lg:inline-block w-1 h-1 bg-digi-blue rounded-full"></div>

              <div>
                <a
                  href={links.home + links.terms}
                  className="text-digi-legacy underline"
                >
                  Terms of Use
                </a>
              </div>
            </div>
          </div>

          <div className="md:flex-1 lg:flex-none lg:w-3/5 md:pl-8 lg:pl-0">
            <ul className="text-center md:text-left text-sm flex flex-col md:flex-row md:justify-between gap-x-6">
              {menu &&
                menu.map(item => {
                  if (item.children.length > 0) {
                    return (
                      <li key={item.id} className="mb-5 md:mb-0">
                        <a
                          href={links.home + item.url}
                          target="_blank"
                          className="text-digi-blue text-sm font-bold uppercase inline-block mb-2"
                          rel="noopener noreferrer nofollow"
                        >
                          {item.label}
                        </a>
                        <ul>
                          {item.children.map(submenu => (
                            <li
                              key={submenu.id}
                              className="mb-2 last-of-type:mb-0"
                            >
                              <a
                                href={links.home + submenu.url}
                                target="_blank"
                                className="text-gray-500 hover:text-digi-pink transition-colors duration-300 ease-in-out"
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
                    <li key={item.id} className="mb-5 md:mb-0">
                      <a
                        href={links.home + item.url}
                        target="_blank"
                        rel="noopener noreferrer nofollow"
                        className="text-digi-blue text-sm font-bold uppercase"
                      >
                        {item.label}
                      </a>
                    </li>
                  )
                })}
              <li className="flex-none">
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
          </div>
        </div>
      </div>
    </footer>
  )
}

Footer.propTypes = {
  siteName: PropTypes.string,
  localUrl: PropTypes.string,
  links: PropTypes.object,
  address: PropTypes.object,
}

Footer.defaultProps = {
  siteName: "Digizent",
  localUrl: "/",
}

export default Footer
