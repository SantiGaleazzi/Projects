import { AnimatePresence, motion } from "framer-motion"
import React from "react"

interface ItemCountBadgeProps {
  count: number
}

const ItemCountBadge: React.FC<ItemCountBadgeProps> = ({ count }) => {
  return (
    <AnimatePresence>
      <motion.div className="font-semibold leading-none px-3 py-1 bg-blue-600 inline-block rounded-full">
        { count }
      </motion.div>
    </AnimatePresence>
  )
}

export default ItemCountBadge