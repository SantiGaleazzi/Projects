import { latinAmerica } from './latin-america.js'
import { africa } from './africa.js'
import { asia } from './asia.js'
import { middleEast } from './middle-east.js'

export const world = {
	type: 'FeatureCollection',
	features: [...latinAmerica, ...africa, ...asia, ...middleEast],
}
