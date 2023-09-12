import { useStaticQuery, graphql } from "gatsby"

export const useGetClients = () => {
  const { clients } = useStaticQuery(graphql`
    query {
      clients: allWpClient(sort: { title: ASC }) {
        nodes {
          slug
          title
        }
      }
    }
  `)

  return clients.nodes
}
