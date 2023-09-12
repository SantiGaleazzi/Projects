import * as React from "react"
import PropTypes from "prop-types"
import { GatsbyImage, getImage } from "gatsby-plugin-image"

const ClientBanner = ({ url, description, logo }) => {
  return (
    <div className="w-full text-center md:text-left px-5 py-5 md:py-6 backdrop-blur-sm bg-black/30 absolute top-0 z-10 -mx-5">
      <div className="container">
        <div className="text-white flex flex-col md:flex-row items-center">
          <div className="md:mr-5">
            <a
              href={url}
              target="_blank"
              rel="noopener noreferrer nofollow"
              className="inline-block"
            >
              <GatsbyImage
                image={getImage(logo?.localFile)}
                alt={logo.altText}
              />
            </a>
          </div>

          <div className="hidden md:block">
            <div className="text-2xl font-medium">
              <a href={url} target="_blank" rel="noopener noreferrer nofollow">
                {url.replace("https://", "")}
              </a>
            </div>
            <div className="md:text-lg font-bold uppercase">{description}</div>
          </div>
        </div>
      </div>
    </div>
  )
}

ClientBanner.propTypes = {
  url: PropTypes.string,
  description: PropTypes.string,
  logo: PropTypes.object,
}

ClientBanner.defaultProps = {
  url: "/",
  description: "Lorem Ipsum Description",
  logo: {},
}

export default ClientBanner
