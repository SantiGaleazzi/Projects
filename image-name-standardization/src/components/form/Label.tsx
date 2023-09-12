interface LabelProps {
  htmlFor: string,
  children: React.ReactNode
}

const Label: React.FC<LabelProps> = ({ htmlFor, children }) => {
  return (
    <label className="mb-2 block font-semibold" htmlFor={htmlFor}>
      { children }
    </label>
  )
}

export default Label