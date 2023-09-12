import * as React from "react"
import PropTypes from "prop-types"

import "../../css/components/hamburger.css"

const Hamburger = ({ menuIsOpen, whenClicked }) => {
  return (
    <button
      className={`hamburger ${menuIsOpen && "open"}`}
      type="button"
      aria-label="Open Menu"
      onClick={whenClicked}
    >
      <span className="hamburger-box">
        <span className="hamburger-inner"></span>
      </span>
    </button>
  )
}

Hamburger.protoTypes = {
  menuIsOpen: PropTypes.bool,
  whenClicked: PropTypes.func,
}

Hamburger.defaultProps = {
  menuIsOpen: false,
}

export default Hamburger
