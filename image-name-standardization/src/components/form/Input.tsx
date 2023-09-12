interface InputProps {
  name: string;
  type: string;
  value: string;
  placeholder: string;
  onChange: React.ChangeEventHandler<HTMLInputElement>;
}

const Input: React.FC<InputProps> = ({ name, type, value, placeholder, onChange }) => {
  return (
    <input
      className="w-full px-4 py-2 dark:bg-zinc-800 border dark:border-zinc-600 rounded-xl block"
      name={name}
      type={type}
      value={value}
      placeholder={placeholder}
      onChange={onChange}
    />
  )
}

export default Input