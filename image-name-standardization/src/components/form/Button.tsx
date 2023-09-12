interface ButtonProps {
  disabled?: boolean;
  onClick: () => void;
  children: React.ReactNode;
}

const Button: React.FC<ButtonProps> = ({ disabled, onClick, children }) => (
  <button
    type="button"
    className={`${ disabled ? 'cursor-not-allowed bg-zinc-700' : 'bg-blue-600 hover:bg-blue-700' } leading-none px-5 py-3 rounded-lg transition-colors duration-150 ease-in-out`}
    disabled={disabled}
    onClick={onClick}
  >
    {children}
  </button>
);

export default Button