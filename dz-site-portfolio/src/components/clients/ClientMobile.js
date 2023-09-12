import * as React from "react"
import PropTypes from "prop-types"
import parse from "html-react-parser"
import { GatsbyImage, getImage } from "gatsby-plugin-image"

const ClientMobile = ({ title, description, devices }) => {
  return (
    <section className="px-5 pt-16 md:pt-24 lg:pt-40">
      <div className="container relative">
        <div className="flex flex-col md:flex-row items-center">
          <div className="w-full md:w-1/2 xl:w-1/3 mb-8 md:mb-0">
            <div className="text-digi-blue text-4xl md:text-5xl font-spirit mb-8 md:pr-6">
              {title}
            </div>

            <div className="text-gray-900 tracking-wider leading-8 md:pr-6">
              {description && parse(description)}
            </div>
          </div>

          <div className="w-full md:w-1/2 xl:w-2/3 text-center relative mt-32 md:mt-0">
            <GatsbyImage
              image={getImage(devices?.main?.localFile)}
              alt={devices?.main?.altText}
              className="w-48 xl:w-auto relative z-20"
            />

            {devices?.left && (
              <div className="w-48 xl:w-auto absolute -top-32 xl:-top-56 left-0 md:-left-5 lg:left-0 2xl:left-32 z-10">
                <GatsbyImage
                  image={getImage(devices?.left?.localFile)}
                  alt={devices?.left?.altText}
                />
              </div>
            )}

            {devices?.right && (
              <div className="w-48 xl:w-auto absolute -top-24 md:-top-1/2 right-0 md:-right-0 lg:right-0 2xl:right-32 z-30">
                <GatsbyImage
                  image={getImage(devices?.right?.localFile)}
                  alt={devices?.right?.altText}
                />
              </div>
            )}
          </div>
        </div>
      </div>
    </section>
  )
}

ClientMobile.propTypes = {
  title: PropTypes.string,
  description: PropTypes.string,
  devices: PropTypes.object,
}

ClientMobile.defaultProps = {
  title: "Lorem Ipsum Title",
  description: "Lorem Ipsum Description",
  devices: {},
}

export default ClientMobile
