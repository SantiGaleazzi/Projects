const Card = ({ className, children }) => {
	return (
		<div
			className={`p-6 bg-white dark:bg-zinc-900 border border-slate-200/80 dark:border-zinc-700 rounded-xl ${className}`}
		>
			{children}
		</div>
	)
}

export default Card
