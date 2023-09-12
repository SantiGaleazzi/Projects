import * as React from "react"
import PropTypes from "prop-types"
import parse from "html-react-parser"
import { GatsbyImage, getImage } from "gatsby-plugin-image"

const ClientDesktop = ({ title, description, devices }) => {
  return (
    <section className="px-5 pt-48 mb-10 md:mb-32 relative">
      <div className="container relative z-10">
        <div className="flex flex-col lg:flex-row lg:gap-x-16">
          <div className="w-full lg:w-1/2">
            {devices?.main && (
              <GatsbyImage
                image={getImage(devices?.main?.localFile)}
                alt={devices?.main?.altText}
                className="!w-full !h-auto relative -mt-32"
              />
            )}
          </div>

          <div className="w-full lg:w-1/2 xl:w-1/3">
            <div className="text-white text-4xl md:text-5xl font-spirit font-light mb-5">
              {title}
            </div>

            <div className="text-white font-medium leading-9 mb-12 xl:mb-0">
              {parse(description)}
            </div>
          </div>
        </div>

        {devices?.second && (
          <div className="md:w-[32rem] xl:w-auto">
            <GatsbyImage
              image={getImage(devices?.second?.localFile)}
              alt={devices?.second?.altText}
              className="relative xl:-ml-20"
            />
          </div>
        )}
      </div>

      <div className="inset-0 absolute bg-gradient-to-r from-digi-off-white via-digi-sky to-digi-blue -skew-y-15 overflow-hidden">
        <div className="w-1/2 h-full bg-gradient-to-tr from-digi-pink/30 via-transparent to-transparent absolute bottom-0 left-0"></div>
        <div className="container">
          <div className="hidden md:block md:w-[32rem] xl:w-auto skew-y-15 absolute -bottom-40 right-0 xl:right-20">
            <GatsbyImage
              image={getImage(devices?.third?.localFile)}
              alt={devices?.third?.altText}
            />
          </div>
        </div>
      </div>
    </section>
  )
}

ClientDesktop.propTypes = {
  title: PropTypes.string,
  description: PropTypes.string,
  devices: PropTypes.object,
}

ClientDesktop.defaultProps = {
  title: "Lorem Ipsum Title",
  description: "Lorem Ipsum",
  devices: {},
}

export default ClientDesktop
