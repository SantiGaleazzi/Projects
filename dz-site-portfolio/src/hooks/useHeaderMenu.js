import { useStaticQuery, graphql } from 'gatsby'

export const useHeaderMenu = () => {

  const {
    wpMenu: { menuItems },
  } = useStaticQuery(graphql`
    query GetHeaderMenu {
      wpMenu(name: { eq: "Header Menu" }) {
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