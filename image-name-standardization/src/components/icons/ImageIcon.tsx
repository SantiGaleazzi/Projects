interface ImageIconProps {
  primary: string
  secondary: string
  className?: string
}

const ImageIcon: React.FC<ImageIconProps> = ({ primary, secondary, ...props }) => {
  return (
    <svg {...props} viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path className={secondary} opacity="0.4" d="M8.5 10.5C9.60457 10.5 10.5 9.60457 10.5 8.5C10.5 7.39543 9.60457 6.5 8.5 6.5C7.39543 6.5 6.5 7.39543 6.5 8.5C6.5 9.60457 7.39543 10.5 8.5 10.5Z" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
      <path className={primary} d="M21 15L17.1314 11.1314C16.7354 10.7354 16.5373 10.5373 16.309 10.4632C16.1082 10.3979 15.8918 10.3979 15.691 10.4632C15.4627 10.5373 15.2646 10.7354 14.8686 11.1314L6.36569 19.6343C5.93731 20.0627 5.72312 20.2769 5.70865 20.4608C5.69609 20.6203 5.76068 20.7763 5.88238 20.8802M7.8 21H16.2C17.8802 21 18.7202 21 19.362 20.673C19.9265 20.3854 20.3854 19.9265 20.673 19.362C21 18.7202 21 17.8802 21 16.2V7.8C21 6.11984 21 5.27976 20.673 4.63803C20.3854 4.07354 19.9265 3.6146 19.362 3.32698C18.7202 3 17.8802 3 16.2 3H7.8C6.11984 3 5.27976 3 4.63803 3.32698C4.07354 3.6146 3.6146 4.07354 3.32698 4.63803C3 5.27976 3 6.11984 3 7.8V16.2C3 17.8802 3 18.7202 3.32698 19.362C3.6146 19.9265 4.07354 20.3854 4.63803 20.673C5.27976 21 6.11984 21 7.8 21Z" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
    </svg>
  )
}

export default ImageIcon