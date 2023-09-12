import { useStaticQuery, graphql } from "gatsby"

export const useFooterMenu = () => {
  const {
    menu: { menuItems },
  } = useStaticQuery(graphql`
    query GetFooterMenu {
      menu: wpMenu(name: { eq: "Footer Menu" }) {
        menuItems {
          nodes {
            id
            url
            label
            parentId
            children {
              id
            }
          }
        }
      }
    }
  `)

  return flatListToHierarchical(menuItems.nodes)
}

const flatListToHierarchical = (
  data = [],
  { idKey = "id", parentKey = "parentId", childrenKey = "children" } = {}
) => {
  const tree = []
  const childrenOf = {}

  data.forEach(item => {
    const newItem = { ...item }
    const { [idKey]: id, [parentKey]: parentId = 0 } = newItem
    childrenOf[id] = childrenOf[id] || []
    newItem[childrenKey] = childrenOf[id]
    parentId
      ? (childrenOf[parentId] = childrenOf[parentId] || []).push(newItem)
      : tree.push(newItem)
  })

  return tree
}
