import L from 'leaflet'
import { MAP_SETTINGS } from '../map-settings'
import { world } from '../countries/word'

const whereWeWork = document.getElementById('areas-map')

if (whereWeWork !== null) {
	const map = L.map(whereWeWork, {
		center: [15.4, 18.37],
		zoom: 3,
		zoomControl: false,
		closePopupOnClick: false,
		attributionControl: false,
		keyboard: false,
		doubleClickZoom: false,
		scrollWheelZoom: false,
	})

	L.tileLayer(MAP_SETTINGS.url, {
		minZoom: 2,
		maxZoom: 5,
		detectRetina: true,
	}).addTo(map)

	if (world) {
		L.geoJSON(world, {
			style: () => {
				return {
					color: '#DF7D38',
					weight: 0,
					fillColor: '#E87722',
					fillOpacity: 0.8,
				}
			},
		}).addTo(map)
	}

	try {
		fetch('/wp-json/kidsalive-api/v1/country/regions')
			.then(response => response.json())
			.then(regions => {
				regions?.forEach(region => {
					L.circle([Number(region.area?.latitude), Number(region.area?.longitude)], {
						color: '#DF7D38',
						weight: 1,
						fillColor: '#E87722',
						fillOpacity: 0.25,
						radius: Number(region.area.length),
						interactive: false,
					}).addTo(map)

					L.popup([parseInt(region.popup?.latitude), parseInt(region.popup?.longitude)], {
						content: `<div class="tw-w-48 tw-text-center">
          <div class="tw-text-white tw-text-sm tw-font-bold tw-mb-1">${region.name}</div>
          <a class="tw-py-3 tw-bg-orange-800 tw-block" href="${region.permalink}">See Our Work »</a>
        </div>`,
						autoClose: false,
						keepInView: true,
						autoPan: false,
						closeButton: false,
						closeOnEscapeKey: false,
						closeOnClick: false,
					}).openOn(map)
				})
			})
	} catch (error) {
		throw new Error(error)
	}
}
