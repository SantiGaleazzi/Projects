import * as React from "react"
import { Link } from "gatsby"
import PropTypes from "prop-types"
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome"
import {
  faChevronLeft,
  faChevronRight,
} from "@fortawesome/free-solid-svg-icons"
import { getImage } from "gatsby-plugin-image"

const ClientFooter = ({ bgImage, externalLinks, prevClient, nextClient }) => {
  const background = getImage(bgImage?.localFile)

  return (
    <section className="px-5 py-16 md:py-20 lg:py-48 bg-gradient-to-r from-digi-off-white via-digi-sky to-digi-blue relative">
      <div className="container relative z-20">
        <div className="text-center md:text-left lg:w-1/3 text-white text-4xl font-bold mb-10">
          Want to see the Digizent difference for yourself?
        </div>

        <div className="text-center md:text-left mb-8">
          <a
            href={externalLinks.home + externalLinks.contact}
            target="_blank"
            rel="nofollow noreferrer noopener"
            className="text-white font-bold px-7 py-3 bg-digi-pink rounded-md inline-flex items-center"
          >
            CONTACT US
            <FontAwesomeIcon icon={faChevronRight} size="sm" className="ml-2" />
          </a>
        </div>
        <div className="flex items-center lg:justify-end">
          <div className="w-full lg:w-auto flex items-center justify-between gap-x-12">
            {prevClient && (
              <Link
                to={`/client/${prevClient.slug}`}
                rel="prev"
                className="inline-flex items-center justify-center"
              >
                <div className="w-6 h-6 flex-none flex items-center justify-center bg-white rounded-full mr-2">
                  <FontAwesomeIcon
                    icon={faChevronLeft}
                    size="sm"
                    className="text-digi-pink"
                  />
                </div>
                <div className="text-white font-spirit text-2xl lg:text-3xl leading-none">
                  Previous Project
                </div>
              </Link>
            )}

            {nextClient && (
              <Link
                to={`/client/${nextClient.slug}`}
                rel="next"
                className="inline-flex items-center justify-center"
              >
                <div className="text-white font-spirit text-2xl lg:text-3xl leading-none">
                  Next Project
                </div>
                <div className="w-6 h-6 flex-none flex items-center justify-center bg-white rounded-full ml-2">
                  <FontAwesomeIcon
                    icon={faChevronRight}
                    size="sm"
                    className="text-digi-pink"
                  />
                </div>
              </Link>
            )}
          </div>
        </div>
      </div>

      {bgImage && (
        <div
          className="bg-cover bg-center bg-no-repeat absolute inset-0 z-10"
          style={{
            backgroundImage: `url(${background.images.fallback?.src})`,
          }}
        ></div>
      )}
      <div className="w-1/2 h-full bg-gradient-to-tr from-digi-pink/30 via-transparent to-transparent absolute top-0 left-0"></div>
    </section>
  )
}

ClientFooter.propTypes = {
  bgImage: PropTypes.object,
  externalLinks: PropTypes.object,
  prevClient: PropTypes.object,
  nextClient: PropTypes.object,
}

export default ClientFooter
