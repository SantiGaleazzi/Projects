import express from 'express'
const clientsRoute = express.Router()
import { get } from '../controllers/clients.controller.js'

clientsRoute.get('/', get)

export default clientsRoute
