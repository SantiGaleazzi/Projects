import * as React from "react"
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome"
import {
  faFacebookF,
  faTwitter,
  faLinkedinIn,
} from "@fortawesome/free-brands-svg-icons"

import { useSiteMetadata } from "../hooks/useSiteMetadata"

const SocialMedia = () => {
  const { social } = useSiteMetadata()

  return (
    <div className="text-white flex items-center gap-x-3">
      <a
        href={`https://www.facebook.com/${social.facebook}/`}
        target="_blank"
        rel="noreferrer"
        className="w-6 h-6 inline-flex items-center justify-end pr-1 bg-digi-pink rounded-md"
      >
        <FontAwesomeIcon icon={faFacebookF} size="sm" />
      </a>

      <a
        href={`https://twitter.com/${social.twitter}/`}
        target="_blank"
        rel="noreferrer"
        className="w-6 h-6 inline-flex items-center justify-center bg-digi-pink rounded-md"
      >
        <FontAwesomeIcon icon={faTwitter} size="sm" />
      </a>

      <a
        href={`https://www.linkedin.com/company/${social.linkedin}/`}
        target="_blank"
        rel="noreferrer"
        className="w-6 h-6 inline-flex items-center justify-center bg-digi-pink rounded-md"
      >
        <FontAwesomeIcon icon={faLinkedinIn} size="sm" />
      </a>
    </div>
  )
}

export default SocialMedia
