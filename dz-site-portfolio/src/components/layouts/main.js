import * as React from "react"
import { Helmet } from "react-helmet"

import Footer from "../footer"
import Navigation from "../navigation"

import { useSiteMetadata } from "../../hooks/useSiteMetadata"

const LayoutMain = ({ children }) => {
  const { title, address, externalLinks } = useSiteMetadata()

  return (
    <>
      <Helmet>
        <link rel="stylesheet" href="https://use.typekit.net/yzn1sul.css" />
      </Helmet>

      <Navigation localUrl="/" links={externalLinks} />

      {children}

      <Footer
        siteName={title}
        localUrl="/"
        links={externalLinks}
        address={address}
      />
    </>
  )
}

export default LayoutMain
