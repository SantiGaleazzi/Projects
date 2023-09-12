import * as React from "react"
import { Helmet } from "react-helmet"

import Footer from "../footer"
import NavigationSingle from "../navigation/Single"

import { useSiteMetadata } from "../../hooks/useSiteMetadata"

const LayoutSingle = ({ children }) => {
  const { title, address, externalLinks } = useSiteMetadata()

  return (
    <>
      <Helmet>
        <link rel="stylesheet" href="https://use.typekit.net/yzn1sul.css" />
      </Helmet>

      <NavigationSingle localUrl="/" />

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

export default LayoutSingle
