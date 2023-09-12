import * as React from "react"

import { Link } from "gatsby"
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome"
import { faChevronLeft } from "@fortawesome/free-solid-svg-icons"

import Seo from "../components/seo"
import LayoutMain from "../components/layouts/main"

const NotFoundPage = ({ location }) => {
  return (
    <LayoutMain location={location}>
      <Seo title="Page Not Found" />

      <section className="px-5 py-16 md:py-20 lg:py-32 bg-gradient-to-r from-digi-blue via-digi-sky to-digi-off-white overflow-hidden relative">
        <div className="container">
          <div className="flex justify-center">
            <div className="w-full md:w-1/2 lg:w-1/3 text-white text-center">
              <div className="text-7xl leading-none font-medium">404</div>
              <div className="text-2xl font-bold mb-4">PAGE NOT FOUND</div>
              <div className="mb-5">
                We can’t find the page you are looking for. You can either
                return to the previous page, visit our homepage or contact our
                support team.
              </div>
              <div>
                <Link
                  to="/"
                  className="font-bold px-7 py-3 bg-digi-pink rounded-md inline-flex items-center"
                >
                  <FontAwesomeIcon
                    icon={faChevronLeft}
                    size="sm"
                    className="mr-2"
                  />
                  Back to Homepage
                </Link>
              </div>
            </div>
          </div>
        </div>
        <div className="w-1/2 h-full bg-gradient-to-tr from-transparent via-transparent to-digi-pink/30 absolute top-0 right-0"></div>
      </section>
    </LayoutMain>
  )
}

export default NotFoundPage
