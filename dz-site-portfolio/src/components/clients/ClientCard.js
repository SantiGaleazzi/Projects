import * as React from "react"
import { Link } from "gatsby"
import PropTypes from "prop-types"
import { GatsbyImage, getImage } from "gatsby-plugin-image"
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome"
import { faChevronRight } from "@fortawesome/free-solid-svg-icons"

const ClientCard = ({ client }) => {
  const thumbnail = client?.clientsPortfolio?.cardLogo
  const bgImage = getImage(client.featuredImage?.node?.localFile)

  return (
    <div
      className="h-96 md:h-[30rem] flex items-end group bg-cover bg-center bg-no-repeat rounded-xl overflow-hidden relative group transition duration-200 ease-in-out transform translate-y-0 lg:hover:-translate-y-6 hover:drop-shadow-2xl"
      style={{
        backgroundImage: 'url("' + bgImage.images.fallback.src + '")',
      }}
      title={client.title}
    >
      <div className="opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 ease-in-out bg-gradient-to-tr from-digi-off-white via-digi-sky/80 to-digi-blue/80 absolute inset-0 z-10"></div>
      <div className="bg-gradient-to-t from-black/90 absolute inset-0 z-20"></div>
      <div className="text-white p-10 lg:p-12 relative z-30">
        {thumbnail && (
          <div className="transition-all duration-200 ease-in-out transform md:translate-y-48 lg:translate-y-40 xl:translate-y-28 md:group-hover:translate-y-0">
            <GatsbyImage
              image={getImage(thumbnail.localFile)}
              alt={thumbnail.altText}
            />
          </div>
        )}
        <div className="md:opacity-0 md:invisible md:group-hover:opacity-100 md:group-hover:visible transition-all duration-300 ease-in-out">
          <div className="xl:w-3/4 text-lg font-bold mt-2 mb-4">
            {client.clientsPortfolio?.clientCardDescription}
          </div>

          <div>
            <Link
              to={"/client/" + client.slug}
              className="text-center text-sm leading-none font-bold px-12 py-3 bg-digi-pink rounded uppercase inline-block"
            >
              View Case{" "}
              <FontAwesomeIcon
                icon={faChevronRight}
                size="xs"
                className="ml-1"
              />
            </Link>
          </div>
        </div>
      </div>
    </div>
  )
}

ClientCard.propTypes = {
  client: PropTypes.object,
}

ClientCard.defaultProps = {
  client: {},
}

export default ClientCard
