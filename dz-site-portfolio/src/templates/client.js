import * as React from "react"
import { graphql } from "gatsby"

import Seo from "../components/seo"
import LayoutSingle from "../components/layouts/single"
import ClientIntro from "../components/clients/ClientIntro"
import ClientFooter from "../components/clients/ClientFooter"
import ClientTablet from "../components/clients/ClientTablet"
import ClientMobile from "../components/clients/ClientMobile"
import ClientDesktop from "../components/clients/ClientDesktop"
import ClientShowcase from "../components/clients/ClientShowcase"
import ClientSiteOverview from "../components/clients/ClientSiteOverview"

import { useSiteMetadata } from "../hooks/useSiteMetadata"

const ClientSingle = ({ data: { previous, client, next } }) => {
  const { externalLinks } = useSiteMetadata()

  const data = {
    banner: {
      url: client?.portfolio?.clientBannerWebsite,
      description: client?.portfolio?.clientBannerDescription,
      logo: client?.portfolio?.clientBannerLogo,
    },
    intro: {
      title: client?.portfolio?.clientIntroTitle,
      description: client?.portfolio?.clientIntroDescription,
      bgImage: client?.portfolio?.clientIntroBackground,
    },
    tablet: {
      title: client?.portfolio?.tabletTitle,
      description: client?.portfolio?.tabletDescription,
      devices: {
        main: client?.portfolio?.tabletMainDevice,
        second: client?.portfolio?.tabletSecondDevice,
      },
    },
    desktop: {
      title: client?.portfolio?.desktopTitle,
      description: client?.portfolio?.desktopDescription,
      devices: {
        main: client?.portfolio?.desktopMainDevice,
        second: client?.portfolio?.desktopSecondDevice,
        third: client?.portfolio?.desktopThirdDevice,
      },
    },
    mobile: {
      title: client?.portfolio?.mobileTitle,
      description: client?.portfolio?.mobileDescription,
      devices: {
        main: client?.portfolio?.mobileMainDevice,
        left: client?.portfolio?.mobileLeftDevice,
        right: client?.portfolio?.mobileRightDevice,
      },
    },
    siteOverview: {
      desktopImage: client?.portfolio?.siteOverviewDesktopImage,
      title: client?.portfolio?.siteOverviewOverlayTitle,
      description: client?.portfolio?.siteOverviewOverlayDescription,
    },
    showcase: {
      title: client?.portfolio?.showcaseTitle,
      description: client?.portfolio?.showcaseDescription,
      device: client?.portfolio?.showcaseDevice,
    },
    footer: {
      bgImage: client?.portfolio?.difference,
    },
  }

  return (
    <LayoutSingle>
      <Seo title={client?.title} />

      <ClientIntro
        banner={data.banner}
        title={data.intro.title}
        description={data.intro.description}
        bgImage={data.intro.bgImage}
      />

      <ClientTablet
        title={data.tablet.title}
        description={data.tablet.description}
        devices={data.tablet.devices}
      />

      <ClientDesktop
        title={data.desktop.title}
        description={data.desktop.description}
        devices={data.desktop.devices}
      />

      <ClientMobile
        title={data.mobile.title}
        description={data.mobile.description}
        devices={data.mobile.devices}
      />

      {data.siteOverview.desktopImage && (
        <ClientSiteOverview
          desktopImage={data.siteOverview.desktopImage}
          mobileImage={data.siteOverview.mobileImage}
          title={data.siteOverview.title}
          description={data.siteOverview.description}
        />
      )}

      {data.showcase.title && data.showcase.description && (
        <ClientShowcase
          title={data.showcase.title}
          description={data.showcase.description}
          device={data.showcase.device}
        />
      )}

      <ClientFooter
        bgImage={data.footer.bgImage}
        externalLinks={externalLinks}
        prevClient={previous}
        nextClient={next}
      />
    </LayoutSingle>
  )
}

export default ClientSingle

export const clientQuery = graphql`
  query getClient(
    $slug: String
    $previousClientSlug: String
    $nextClientSlug: String
  ) {
    client: wpClient(slug: { eq: $slug }) {
      title
      portfolio: clientsPortfolio {
        clientBannerWebsite
        clientBannerDescription
        clientBannerWebsite
        clientBannerLogo {
          altText
          localFile {
            childImageSharp {
              gatsbyImageData(placeholder: NONE, formats: AUTO)
            }
          }
        }
        clientIntroTitle
        clientIntroDescription
        clientIntroBackground {
          localFile {
            childImageSharp {
              gatsbyImageData(placeholder: NONE, formats: AUTO)
            }
          }
        }
        tabletTitle
        tabletDescription
        tabletMainDevice {
          altText
          localFile {
            childImageSharp {
              gatsbyImageData(placeholder: NONE, formats: AUTO)
            }
          }
        }
        tabletSecondDevice {
          altText
          localFile {
            childImageSharp {
              gatsbyImageData(placeholder: NONE, formats: AUTO)
            }
          }
        }
        desktopTitle
        desktopDescription
        desktopMainDevice {
          altText
          localFile {
            childImageSharp {
              gatsbyImageData(placeholder: NONE, formats: AUTO)
            }
          }
        }
        desktopSecondDevice {
          altText
          localFile {
            childImageSharp {
              gatsbyImageData(placeholder: NONE, formats: AUTO)
            }
          }
        }
        desktopThirdDevice {
          altText
          localFile {
            childImageSharp {
              gatsbyImageData(placeholder: NONE, formats: AUTO)
            }
          }
        }
        mobileTitle
        mobileDescription
        mobileMainDevice {
          altText
          localFile {
            childImageSharp {
              gatsbyImageData(placeholder: NONE, formats: AUTO)
            }
          }
        }
        mobileLeftDevice {
          altText
          localFile {
            childImageSharp {
              gatsbyImageData(placeholder: NONE, formats: AUTO)
            }
          }
        }
        mobileRightDevice {
          altText
          localFile {
            childImageSharp {
              gatsbyImageData(placeholder: NONE, formats: AUTO)
            }
          }
        }
        siteOverviewDesktopImage {
          altText
          localFile {
            childImageSharp {
              gatsbyImageData(placeholder: NONE, formats: AUTO)
            }
          }
        }
        siteOverviewOverlayTitle
        siteOverviewOverlayDescription
        showcaseTitle
        showcaseDescription
        showcaseDevice {
          altText
          localFile {
            childImageSharp {
              gatsbyImageData(placeholder: NONE, formats: AUTO)
            }
          }
        }
        difference: differenceBackground {
          altText
          localFile {
            childImageSharp {
              gatsbyImageData(placeholder: NONE, formats: AUTO)
            }
          }
        }
      }
    }
    previous: wpClient(slug: { eq: $previousClientSlug }) {
      slug
      title
    }
    next: wpClient(slug: { eq: $nextClientSlug }) {
      slug
      title
    }
  }
`
