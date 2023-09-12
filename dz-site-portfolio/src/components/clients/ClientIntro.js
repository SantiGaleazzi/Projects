import * as React from "react"
import PropTypes from "prop-types"
import parse from "html-react-parser"
import { getImage } from "gatsby-plugin-image"

import ClientBanner from "./ClientBanner"

const ClientIntro = ({ banner, title, description, bgImage }) => {
  const background = getImage(bgImage?.localFile)

  return (
    <section className="px-5 pt-48 pb-16 md:pb-20 lg:pb-48 bg-gradient-to-r from-digi-blue via-digi-sky to-digi-off-white overflow-hidden relative">
      <ClientBanner
        url={banner.url}
        description={banner.description}
        logo={banner.logo}
      />

      <div className="container relative z-10">
        <div className="md:flex">
          <div className="w-full md:w-1/2 2xl:pr-10">
            <div className="text-white text-5xl lg:text-7xl font-spirit font-light mb-5">
              {title && parse(title)}
            </div>

            <div className="text-white font-medium text-2xl leading-9">
              {description && parse(description)}
            </div>
          </div>
        </div>
      </div>

      {background && (
        <div
          className="opacity-30 md:opacity-100 absolute inset-0 bg-cover bg-right sm:bg-center bg-no-repeat"
          style={{
            backgroundImage: `url(${background?.images?.fallback?.src})`,
          }}
        ></div>
      )}
      <div className="w-1/2 h-full bg-gradient-to-tr from-transparent via-transparent to-digi-pink/30 absolute top-0 right-0"></div>
    </section>
  )
}

ClientIntro.propTypes = {
  banner: PropTypes.object,
  title: PropTypes.string,
  description: PropTypes.string,
  bgImage: PropTypes.object,
}

ClientIntro.defaultProps = {
  banner: {},
  title: "Lorem Ipsum Title",
  description: "Lorem Ipsum Description",
  bgImage: {},
}

export default ClientIntro
