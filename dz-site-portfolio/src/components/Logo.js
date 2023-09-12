import * as React from "react"
import PropTypes from "prop-types"

import { Link } from "gatsby"

import fullLogo from "../images/digizent-logo.svg"
import markLogo from "../images/mark-logo.svg"

const Logo = ({ url, navType }) => {
  return (
    <Link to={url}>
      {navType === "single" ? (
        <img src={markLogo} alt="Digizent Logo" className="w-10" />
      ) : (
        <img src={fullLogo} alt="Digizent Logo" />
      )}
    </Link>
  )
}

Logo.propTypes = {
  url: PropTypes.string,
  navType: PropTypes.string,
}

Logo.defaultProps = {
  url: "/",
  navType: "main",
}

export default Logo
