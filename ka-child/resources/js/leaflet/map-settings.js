import { latinAmerica } from './countries/latin-america'
import { africa } from './countries/africa'
import { asia } from './countries/asia'
import { middleEast } from './countries/middle-east'

export const MAP_SETTINGS = {
	url: 'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
	zones: {
		'latin-america': [...latinAmerica],
		africa: [...africa],
		asia: [...asia],
		'middle-east': [...middleEast],
	},
}
