import * as React from "react"
import PropTypes from "prop-types"
import parse from "html-react-parser"
import { GatsbyImage, getImage } from "gatsby-plugin-image"

const ClientShowcase = ({ title, description, device }) => {
  return (
    <section className="px-5 pt-12 relative">
      <div className="container relative z-10">
        <div className="lg:w-2/5 text-center mx-auto mb-12">
          <div className="text-digi-blue text-5xl font-spirit font-light mb-6">
            {title}
          </div>

          <div className="text-gray-900">
            {description && parse(description)}
          </div>
        </div>

        {device?.localFile && (
          <div>
            <GatsbyImage
              image={getImage(device?.localFile)}
              alt={device.altText}
            />
          </div>
        )}
      </div>
      <div className="w-1/2 h-full blur-xl bg-gradient-to-tl from-transparent via-transparent to-digi-sky/20 absolute top-0 md:top-48 left-0"></div>
    </section>
  )
}

ClientShowcase.propTypes = {
  title: PropTypes.string,
  description: PropTypes.string,
}

ClientShowcase.defaultProps = {
  title: "Lorem Ipsum Title",
  description: "Lorem Ipsum Description",
}

export default ClientShowcase
