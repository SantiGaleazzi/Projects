import express from 'express'
import clientsRoute from './routes/clients.route.js'
const app = express()
const port = 5000

app.get('/', (req, res) => {
	res.send('API is working properly')
})

app.use('/clients', clientsRoute)

app.listen(port, () => {
	console.log(`Example app listening at http://localhost:${port}`)
})
