import * as React from "react"
import parse from "html-react-parser"
import { GatsbyImage, getImage } from "gatsby-plugin-image"

const ClientTablet = ({ title, description, devices }) => {
  return (
    <section className="px-5 py-20 md:py-24 lg:pt-32 lg:pb-0 relative overflow-x-hidden xl:overflow-x-visible">
      <div className="container relative z-10">
        <div className="flex flex-col md:flex-row items-center">
          <div className="w-full md:w-1/2 xl:w-1/3 mb-8 md:mb-0">
            {title && (
              <div className="text-digi-blue text-4xl md:text-5xl font-spirit mb-8">
                {title}
              </div>
            )}

            {description && (
              <div className="text-gray-900 tracking-wider leading-8 md:pr-6">
                {parse(description)}
              </div>
            )}
          </div>

          <div className="w-full md:w-1/2 xl:w-2/3 relative">
            <GatsbyImage
              image={getImage(devices?.main?.localFile)}
              alt={devices?.main?.altText}
              className="relative md:-bottom-10 lg:bottom-0"
            />

            {devices?.second?.localFile && (
              <div className="md:absolute top-0 md:-top-16 lg:-top-16 xl:-top-64 md:left-20 lg:left-auto md:-right-20 lg:-right-80 xl:right-0 z-10">
                <GatsbyImage
                  image={getImage(devices?.second?.localFile)}
                  alt={devices?.second?.altText}
                />
              </div>
            )}
          </div>
        </div>
      </div>
      <div className="w-1/2 h-full blur-lg bg-gradient-to-tl from-transparent via-transparent to-digi-pink/20 absolute top-0 left-0"></div>
    </section>
  )
}

export default ClientTablet
