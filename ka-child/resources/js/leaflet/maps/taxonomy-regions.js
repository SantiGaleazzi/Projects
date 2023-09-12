import L from 'leaflet'
import { MAP_SETTINGS } from '../map-settings'

const taxonomyRegions = document.getElementById('taxonomy-regions-map')

if (taxonomyRegions !== null) {
	try {
		fetch(`/wp-json/kidsalive-api/v1/country/region/${taxonomyRegions.dataset.termId}`)
			.then(response => response.json())
			.then(region => {
				const map = L.map(taxonomyRegions, {
					center: [Number(region.map?.latitude), Number(region.map?.longitude)],
					zoom: region.map?.zoom,
					zoomControl: false,
					closePopupOnClick: false,
					attributionControl: false,
					keyboard: false,
					doubleClickZoom: false,
					scrollWheelZoom: false,
				})

				L.tileLayer(MAP_SETTINGS.url, {
					minZoom: 2,
					maxZoom: 8,
					detectRetina: true,
				}).addTo(map)

				L.geoJSON(
					{
						type: 'FeatureCollection',
						features: MAP_SETTINGS.zones[region.slug],
					},
					{
						style: () => {
							return {
								color: '#DF7D38',
								weight: 0,
								fillColor: '#E87722',
								fillOpacity: 0.8,
							}
						},
					}
				).addTo(map)

				fetch(`/wp-json/kidsalive-api/v1/country/${taxonomyRegions.dataset.termId}`)
					.then(response => response.json())
					.then(countries => {
						countries?.forEach(country => {
							L.popup([Number(country.popup?.latitude), Number(country.popup?.longitude)], {
								content: `<div class="tw-w-48 tw-text-center">
          <div class="tw-text-white tw-text-sm tw-font-bold tw-mb-1">${country.name}</div>
          <a class="tw-py-3 tw-bg-orange-800 tw-block" href="${country.permalink}">Learn more about our work »</a>
        </div>`,
								autoClose: false,
								keepInView: true,
								autoPan: false,
								closeButton: false,
								closeOnEscapeKey: false,
								closeOnClick: false,
								className: `${country.popup?.tip_class}`,
							}).openOn(map)
						})
					})
			})
	} catch (error) {
		throw new Error(error)
	}
}
