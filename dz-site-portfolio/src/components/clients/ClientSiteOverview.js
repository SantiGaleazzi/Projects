import * as React from "react"
import parse from "html-react-parser"
import { GatsbyImage, getImage } from "gatsby-plugin-image"
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome"
import { faChevronDown } from "@fortawesome/free-solid-svg-icons"

const ClientSiteOverview = ({ desktopImage, title, description }) => {
  return (
    <section className="xl:mb-32">
      <div className="text-center pb-20">
        <FontAwesomeIcon
          icon={faChevronDown}
          size="2x"
          className="text-digi-pink"
        />
      </div>

      {desktopImage && (
        <GatsbyImage
          image={getImage(desktopImage?.localFile)}
          alt={desktopImage?.altText}
          objectPosition="top center"
          className="w-full drop-shadow-lg"
        />
      )}

      <div className="px-5">
        <div className="container xl:pb-32 relative">
          <div className="w-full text-center md:text-left text-white relative -mt-20 xl:mt-0 xl:absolute xl:-bottom-1/2">
            <div className="flex flex-col md:flex-row items-center md:gap-x-12 px-6 md:px-12 lg:px-20 py-16 sm:py-20 lg:py-32 backdrop-blur-lg bg-digi-blue/40 rounded-xl">
              <div className="w-full md:w-2/5 lg:w-1/3 text-4xl md:text-5xl font-spirit md:text-right mb-6 md:mb-0">
                {title}
              </div>

              <div className="w-full md:w-3/5 lg:w-2/3">
                <div className=" tracking-wider leading-9">
                  {description && parse(description)}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}

export default ClientSiteOverview
