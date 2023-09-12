interface CloseIconProps {
  primary?: string
  className?: string
}

const CloseIcon : React.FC<CloseIconProps> = ({ primary, ...props }) => {
  return (
    <svg {...props} viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path className={primary} d="M18 6L6 18M6 6L18 18" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
    </svg>
  )
}

export default CloseIcon