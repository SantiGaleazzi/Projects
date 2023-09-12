import { useStaticQuery, graphql } from "gatsby"

export const useSiteMetadata = () => {
  const {
    site: { siteMetadata },
  } = useStaticQuery(graphql`
    query {
      site {
        siteMetadata {
          title
          description
          address {
            street1
            street2
            city
            state
            pc
            country
          }
          externalLinks {
            home
            privacy
            terms
            contact
          }
          social {
            facebook
            twitter
            linkedin
          }
        }
      }
    }
  `)

  return siteMetadata
}
