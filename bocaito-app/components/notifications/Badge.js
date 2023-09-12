const Badge = ({ className, total }) => {
	return (
		<>
			<div
				className={`${className} w-5 h-5 flex items-center justify-center text-white text-xs font-bold leading-none bg-indigo-500 rounded-full`}
			>
				{total}
			</div>
		</>
	)
}

export default Badge
