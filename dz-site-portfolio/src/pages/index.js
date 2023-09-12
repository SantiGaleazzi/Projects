import * as React from "react"
import parse from "html-react-parser"
import { useStaticQuery, graphql } from "gatsby"
import { GatsbyImage, getImage } from "gatsby-plugin-image"
import Seo from "../components/seo"
import LayoutMain from "../components/layouts/main"
import ClientCard from "../components/clients/ClientCard"

const IndexPage = () => {
  const {
    homePage: {
      gatsbyHome: {
        introImage,
        introTitle,
        introDescription,
        portfolioTitle,
        portfolioDescription,
      },
    },
    clients,
  } = useStaticQuery(graphql`
    query getHomePageData {
      homePage: wpPage(slug: { eq: "home-gatsby" }) {
        gatsbyHome {
          introTitle
          portfolioDescription
          introDescription
          portfolioTitle
          introImage: introSideImage {
            altText
            localFile {
              childImageSharp {
                gatsbyImageData(placeholder: NONE, formats: AUTO)
              }
            }
          }
        }
      }
      clients: allWpClient(limit: 6, sort: { title: ASC }) {
        nodes {
          id
          title
          slug
          featuredImage {
            node {
              localFile {
                childImageSharp {
                  gatsbyImageData(placeholder: NONE, formats: AUTO)
                }
              }
            }
          }
          clientsPortfolio {
            cardLogo: clientCardLogo {
              altText
              localFile {
                childImageSharp {
                  gatsbyImageData(placeholder: NONE, formats: AUTO)
                }
              }
            }
            clientCardDescription
            clientIntroTitle
          }
        }
      }
    }
  `)

  return (
    <LayoutMain>
      <Seo title="Home" />

      <section className="px-5 bg-gradient-to-r from-digi-blue via-digi-sky to-digi-off-white overflow-hidden relative 2xl:static">
        <div className="container pt-16 md:py-20 lg:py-32 xl:pt-48 2xl:relative">
          <div className="md:flex">
            <div className="w-full md:w-1/2 lg:w-2/5 xl:w-1/3">
              {introTitle && (
                <div className="text-white text-[2.875rem] font-spirit font-light leading-snug mb-5">
                  {introTitle}
                </div>
              )}

              {introDescription && (
                <div className="text-white font-medium text-2xl mb-4 md:mb-0">
                  {parse(introDescription)}
                </div>
              )}
            </div>

            <div className="w-full md:w-1/2 lg:w-3/5 xl:w-2/3">
              <div className="md:w-full xl:w-auto md:absolute md:bottom-0 xl:right-0 lg:-mr-32 2xl:mr-0">
                <GatsbyImage
                  image={getImage(introImage?.localFile)}
                  alt={introImage?.altText}
                  className="relative z-10"
                />
              </div>
            </div>
          </div>
        </div>
        <div className="w-1/2 h-full bg-gradient-to-tr from-transparent via-transparent to-digi-pink/30 absolute top-0 right-0"></div>
      </section>

      <section className="px-5 py-12">
        <div className="container">
          <div className="lg:w-3/5 xl:w-1/2 text-center mx-auto mb-12 lg:px-6">
            {portfolioTitle && (
              <div className="text-digi-blue text-5xl font-spirit font-light mb-6">
                {portfolioTitle}
              </div>
            )}
            {portfolioDescription && (
              <div className="text-gray-900 tracking-wider leading-8">
                {parse(portfolioDescription)}
              </div>
            )}
          </div>

          {clients && (
            <div className="grid gap-5 sm:gap-6 xl:gap-10 grid-col-1 md:grid-cols-2">
              {clients.nodes.map(client => (
                <ClientCard key={client.id} client={client} />
              ))}
            </div>
          )}
        </div>
      </section>
    </LayoutMain>
  )
}

export default IndexPage
