export default function handler(req, res) {
	const { id, q } = req.query
	res.status(200).json({ name: 'John Doe' })
}
