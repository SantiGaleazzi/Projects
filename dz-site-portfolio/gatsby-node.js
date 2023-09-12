exports.createPages = async ({ graphql, actions, reporter }) => {
  const clients = await getClients(graphql, reporter)

  if (!clients.length) return
  await createClientPage(clients, actions)
}

const createClientPage = async (clients, actions) =>
  Promise.all(
    clients.map(({ previous, client, next }) =>
      actions.createPage({
        path: `/client/${client.slug}`,
        component: require.resolve("./src/templates/client.js"),
        context: {
          slug: client.slug,
          previousClientSlug: previous ? previous.slug : null,
          nextClientSlug: next ? next.slug : null,
        },
      })
    )
  )

async function getClients(graphql, reporter) {
  const graphqlResult = await graphql(`
    query getClient {
      clients: allWpClient(sort: { title: ASC }) {
        nodes: edges {
          previous {
            slug
          }
          client: node {
            slug
            title
          }
          next {
            slug
          }
        }
      }
    }
  `)

  if (graphqlResult.errors) {
    reporter.panicOnBuild(
      `There was an error loading your client data`,
      graphqlResult.errors
    )
    return
  }

  return graphqlResult.data.clients.nodes
}
