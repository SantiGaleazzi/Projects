import * as am4core from '@amcharts/amcharts4/core'
import * as am4maps from '@amcharts/amcharts4/maps'
import am4geodata_usaLow from '@amcharts/amcharts4-geodata/usaLow'

if (document.querySelector('#map-chart')) {
	am4core.ready(function () {
		let map = am4core.create('map-chart', am4maps.MapChart)

		// Set map definition
		map.geodata = am4geodata_usaLow

		// Set projection
		map.projection = new am4maps.projections.AlbersUsa()

		// Create map polygon series
		var polygonSeries = map.series.push(new am4maps.MapPolygonSeries())

		// Make map load polygon (like country names) data from GeoJSON
		polygonSeries.useGeodata = true

		// Configure series
		var polygonTemplate = polygonSeries.mapPolygons.template
		polygonTemplate.tooltipHTML =
			'<div class="states-map-hover text-center"><div style="font-weight:bold;">{name}</div> <div>Rank: {rank}</div> <div>Score: {score}</div></div>'
		polygonTemplate.url = '{url}'
		polygonTemplate.fill = am4core.color('#1e3764')
		polygonTemplate.properties.stroke = '#ffffff'

		// Create hover state and set alternative fill color
		var hoverProperty = polygonTemplate.states.create('hover')
		hoverProperty.properties.fill = am4core.color('#1e3764')

		// Create active state
		polygonSeries.data = [
			{
				id: 'US-AL',
				rank: 15,
				fill: am4core.color('#ffb434'),
				url: '/states/alabama',
				score: '51%',
			},
			{
				id: 'US-AK',
				rank: 42,
				fill: am4core.color('#ff7300'),
				url: '/states/alaska',
				score: '32%',
			},
			{
				id: 'US-AZ',
				rank: 5,
				fill: am4core.color('#ffb434'),
				url: '/states/arizona',
				score: '67%',
			},
			{
				id: 'US-AR',
				rank: 20,
				fill: am4core.color('#ff7300'),
				url: '/states/arkansas',
				score: '48%',
			},
			{
				id: 'US-CA',
				rank: 44,
				fill: am4core.color('#d7172a'),
				url: '/states/california',
				score: '28%',
			},
			{
				id: 'US-CO',
				rank: 29,
				fill: am4core.color('#ff7300'),
				url: '/states/colorado',
				score: '43%',
			},
			{
				id: 'US-CT',
				rank: 49,
				fill: am4core.color('#d7172a'),
				url: '/states/connecticut',
				score: '18%',
			},
			{
				id: 'US-DE',
				rank: 45,
				fill: am4core.color('#d7172a'),
				url: '/states/delaware',
				score: '28%',
			},
			{
				id: 'US-FL',
				rank: 43,
				fill: am4core.color('#d7172a'),
				url: '/states/florida',
				score: '29%',
			},
			{
				id: 'US-GA',
				rank: 19,
				fill: am4core.color('#ff7300'),
				url: '/states/georgia',
				score: '49%',
			},
			{
				id: 'US-HI',
				rank: 47,
				fill: am4core.color('#d7172a'),
				url: '/states/hawaii',
				score: '27%',
			},
			{
				id: 'US-ID',
				rank: 10,
				fill: am4core.color('#ffb434'),
				url: '/states/idaho',
				score: '57%',
			},
			{
				id: 'US-IL',
				rank: 24,
				fill: am4core.color('#ff7300'),
				url: '/states/illinois',
				score: '46%',
			},
			{
				id: 'US-IN',
				rank: 12,
				fill: am4core.color('#ffb434'),
				url: '/states/indiana',
				score: '56%',
			},
			{
				id: 'US-IA',
				rank: 3,
				fill: am4core.color('#54a557'),
				url: '/states/iowa',
				score: '75%',
			},
			{
				id: 'US-KS',
				rank: 6,
				fill: am4core.color('#ffb434'),
				url: '/states/kansas',
				score: '65%',
			},
			{
				id: 'US-KY',
				rank: 16,
				fill: am4core.color('#ffb434'),
				url: '/states/kentuchy',
				score: '50%',
			},
			{
				id: 'US-LA',
				rank: 27,
				fill: am4core.color('#ff7300'),
				url: '/states/lousiana',
				score: '44%',
			},
			{
				id: 'US-ME',
				rank: 31,
				fill: am4core.color('#ff7300'),
				url: '/states/maine',
				score: '42%',
			},
			{
				id: 'US-MD',
				rank: 46,
				fill: am4core.color('#d7172a'),
				url: '/states/maryland',
				score: '27%',
			},
			{
				id: 'US-MA',
				rank: 38,
				fill: am4core.color('#ff7300'),
				url: '/states/massachusetts',
				score: '37%',
			},
			{
				id: 'US-MI',
				rank: 2,
				fill: am4core.color('#54a557'),
				url: '/states/michigan',
				score: '77%',
			},
			{
				id: 'US-MN',
				rank: 36,
				fill: am4core.color('#ff7300'),
				url: '/states/minnesota',
				score: '37%',
			},
			{
				id: 'US-MS',
				rank: 21,
				fill: am4core.color('#ff7300'),
				url: '/states/mississippi',
				score: '48%',
			},
			{
				id: 'US-MO',
				rank: 14,
				fill: am4core.color('#ffb434'),
				url: '/states/missouri',
				score: '52%',
			},
			{
				id: 'US-MT',
				rank: 33,
				fill: am4core.color('#ff7300'),
				url: '/states/montana',
				score: '40%',
			},
			{
				id: 'US-NE',
				rank: 22,
				fill: am4core.color('#ff7300'),
				url: '/states/nebraska',
				score: '47%',
			},
			{
				id: 'US-NV',
				rank: 4,
				fill: am4core.color('#ffb434'),
				url: '/states/nevada',
				score: '70%',
			},
			{
				id: 'US-NH',
				rank: 35,
				fill: am4core.color('#ff7300'),
				url: '/states/new-hampshire',
				score: '38%',
			},
			{
				id: 'US-NJ',
				rank: 37,
				fill: am4core.color('#ff7300'),
				url: '/states/new-jersey',
				score: '37%',
			},
			{
				id: 'US-NM',
				rank: 9,
				fill: am4core.color('#ffb434'),
				url: '/states/new-mexico',
				score: '58%',
			},
			{
				id: 'US-NY',
				rank: 50,
				fill: am4core.color('#d7172a'),
				url: '/states/new-york',
				score: '15%',
			},
			{
				id: 'US-NC',
				rank: 13,
				fill: am4core.color('#ffb434'),
				url: '/states/north-carolina',
				score: '56%',
			},
			{
				id: 'US-ND',
				rank: 34,
				fill: am4core.color('#ff7300'),
				url: '/states/north-dakota',
				score: '39%',
			},
			{
				id: 'US-OH',
				rank: 30,
				fill: am4core.color('#ff7300'),
				url: '/states/ohio',
				score: '42%',
			},
			{
				id: 'US-OK',
				rank: 11,
				fill: am4core.color('#ffb434'),
				url: '/states/oklahoma',
				score: '56%',
			},
			{
				id: 'US-OR',
				rank: 25,
				fill: am4core.color('#ff7300'),
				url: '/states/oregon',
				score: '45%',
			},
			{
				id: 'US-PA',
				rank: 26,
				fill: am4core.color('#ff7300'),
				url: '/states/pennsylvania',
				score: '44%',
			},
			{
				id: 'US-RI',
				rank: 41,
				fill: am4core.color('#ff7300'),
				url: '/states/rhode-island',
				score: '34%',
			},
			{
				id: 'US-SC',
				rank: 40,
				fill: am4core.color('#ff7300'),
				url: '/states/south-carolina',
				score: '36%',
			},
			{
				id: 'US-SD',
				rank: 32,
				fill: am4core.color('#ff7300'),
				url: '/states/south-dakota',
				score: '41%',
			},
			{
				id: 'US-TN',
				rank: 18,
				fill: am4core.color('#ff7300'),
				url: '/states/tennessee',
				score: '49%',
			},
			{
				id: 'US-TX',
				rank: 7,
				fill: am4core.color('#ffb434'),
				url: '/states/texas',
				score: '63%',
			},
			{
				id: 'US-UT',
				rank: 17,
				fill: am4core.color('#ff7300'),
				url: '/states/utah',
				score: '49%',
			},
			{
				id: 'US-VT',
				rank: 28,
				fill: am4core.color('#ff7300'),
				url: '/states/vermont',
				score: '43%',
			},
			{
				id: 'US-VA',
				rank: 8,
				fill: am4core.color('#ffb434'),
				url: '/states/virginia',
				score: '58%',
			},
			{
				id: 'US-WA',
				rank: 48,
				fill: am4core.color('#d7172a'),
				url: '/states/washington',
				score: '22%',
			},
			{
				id: 'US-WV',
				rank: 27,
				fill: am4core.color('#ff7300'),
				url: '/states/west-virginia',
				score: '47%',
			},
			{
				id: 'US-WI',
				rank: 1,
				fill: am4core.color('#54a557'),
				url: '/states/wisconsin',
				score: '86%',
			},
			{
				id: 'US-WY',
				rank: 39,
				fill: am4core.color('#ff7300'),
				url: '/states/wyoming',
				score: '36%',
			},
		]

		// Bind "fill" property to "fill" key in data
		polygonTemplate.propertyFields.fill = 'fill'
	})
}

if (document.querySelector('#anti-slapp-map')) {
	am4core.ready(function () {
		let map = am4core.create('anti-slapp-map', am4maps.MapChart)

		// Set map definition
		map.geodata = am4geodata_usaLow

		// Set projection
		map.projection = new am4maps.projections.AlbersUsa()

		// Create map polygon series
		var polygonSeries = map.series.push(new am4maps.MapPolygonSeries())

		// Make map load polygon (like country names) data from GeoJSON
		polygonSeries.useGeodata = true

		// Configure series
		var polygonTemplate = polygonSeries.mapPolygons.template
		polygonTemplate.tooltipHTML =
			'<div class="states-map-hover text-center"><div style="font-weight:bold;">{name}</div> <div>Grade: {grade}</div> <div>Score: {score}</div></div>'
		polygonTemplate.url = '{url}'
		polygonTemplate.fill = am4core.color('#1e3764')
		polygonTemplate.properties.stroke = '#ffffff'

		// Create hover state and set alternative fill color
		var hoverProperty = polygonTemplate.states.create('hover')
		hoverProperty.properties.fill = am4core.color('#1e3764')

		// Create active state
		polygonSeries.data = [
			{
				id: 'US-AL',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/alabama',
				score: '0%',
			},
			{
				id: 'US-AK',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/alaska',
				score: '0%',
			},
			{
				id: 'US-AZ',
				grade: 'D-',
				fill: am4core.color('#ff7300'),
				url: '/anti-slapp-states/arizona',
				score: '29%',
			},
			{
				id: 'US-AR',
				grade: 'C',
				fill: am4core.color('#ffb434'),
				url: '/anti-slapp-states/arkansas',
				score: '61%',
			},
			{
				id: 'US-CA',
				grade: 'A+',
				fill: am4core.color('#54a557'),
				url: '/anti-slapp-states/california',
				score: '99%',
			},
			{
				id: 'US-CO',
				grade: 'B',
				fill: am4core.color('#90ee90'),
				url: '/anti-slapp-states/colorado',
				score: '82%',
			},
			{
				id: 'US-CT',
				grade: 'B+',
				fill: am4core.color('#90ee90'),
				url: '/anti-slapp-states/connecticut',
				score: '83%',
			},
			{
				id: 'US-DE',
				grade: 'D-',
				fill: am4core.color('#ff7300'),
				url: '/anti-slapp-states/delaware',
				score: '11%',
			},
			{
				id: 'US-DC',
				grade: 'B',
				fill: am4core.color('#90ee90'),
				url: '/anti-slapp-states/district-columbia',
				score: '78%',
			},
			{
				id: 'US-FL',
				grade: 'C-',
				fill: am4core.color('#ffb434'),
				url: '/anti-slapp-states/florida',
				score: '50%',
			},
			{
				id: 'US-GA',
				grade: 'A',
				fill: am4core.color('#54a557'),
				url: '/anti-slapp-states/georgia',
				score: '98%',
			},
			{
				id: 'US-HI',
				grade: 'D',
				fill: am4core.color('#ff7300'),
				url: '/anti-slapp-states/hawaii',
				score: '39%',
			},
			{
				id: 'US-ID',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/idaho',
				score: '0%',
			},
			{
				id: 'US-IL',
				grade: 'D+',
				fill: am4core.color('#ff7300'),
				url: '/anti-slapp-states/illinois',
				score: '46%',
			},
			{
				id: 'US-IN',
				grade: 'B+',
				fill: am4core.color('#90ee90'),
				url: '/anti-slapp-states/indiana',
				score: '86%',
			},
			{
				id: 'US-IA',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/iowa',
				score: '0%',
			},
			{
				id: 'US-KS',
				grade: 'A-',
				fill: am4core.color('#54a557'),
				url: '/anti-slapp-states/kansas',
				score: '93%',
			},
			{
				id: 'US-KY',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/kentuchy',
				score: '0%',
			},
			{
				id: 'US-LA',
				grade: 'A-',
				fill: am4core.color('#54a557'),
				url: '/anti-slapp-states/lousiana',
				score: '90%',
			},
			{
				id: 'US-ME',
				grade: 'D',
				fill: am4core.color('#ff7300'),
				url: '/anti-slapp-states/maine',
				score: '33%',
			},
			{
				id: 'US-MD',
				grade: 'D',
				fill: am4core.color('#ff7300'),
				url: '/anti-slapp-states/maryland',
				score: '37%',
			},
			{
				id: 'US-MA',
				grade: 'D+',
				fill: am4core.color('#ff7300'),
				url: '/anti-slapp-states/massachusetts',
				score: '43%',
			},
			{
				id: 'US-MI',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/michigan',
				score: '0%',
			},
			{
				id: 'US-MN',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/minnesota',
				score: '0%',
			},
			{
				id: 'US-MS',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/mississippi',
				score: '0%',
			},
			{
				id: 'US-MO',
				grade: 'D-',
				fill: am4core.color('#ff7300'),
				url: '/anti-slapp-states/missouri',
				score: '28%',
			},
			{
				id: 'US-MT',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/montana',
				score: '0%',
			},
			{
				id: 'US-NE',
				grade: 'D-',
				fill: am4core.color('#ff7300'),
				url: '/anti-slapp-states/nebraska',
				score: '11%',
			},
			{
				id: 'US-NV',
				grade: 'A',
				fill: am4core.color('#54a557'),
				url: '/anti-slapp-states/nevada',
				score: '98%',
			},
			{
				id: 'US-NH',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/new-hampshire',
				score: '0%',
			},
			{
				id: 'US-NJ',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/new-jersey',
				score: '0%',
			},
			{
				id: 'US-NM',
				grade: 'D',
				fill: am4core.color('#ff7300'),
				url: '/anti-slapp-states/new-mexico',
				score: '32%',
			},
			{
				id: 'US-NY',
				grade: 'A-',
				fill: am4core.color('#54a557'),
				url: '/anti-slapp-states/new-york',
				score: '91%',
			},
			{
				id: 'US-NC',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/north-carolina',
				score: '0%',
			},
			{
				id: 'US-ND',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/north-dakota',
				score: '0%',
			},
			{
				id: 'US-OH',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/ohio',
				score: '0%',
			},
			{
				id: 'US-OK',
				grade: 'A',
				fill: am4core.color('#54a557'),
				url: '/anti-slapp-states/oklahoma',
				score: '98%',
			},
			{
				id: 'US-OR',
				grade: 'A-',
				fill: am4core.color('#54a557'),
				url: '/anti-slapp-states/oregon',
				score: '91%',
			},
			{
				id: 'US-PA',
				grade: 'D-',
				fill: am4core.color('#ff7300'),
				url: '/anti-slapp-states/pennsylvania',
				score: '26%',
			},
			{
				id: 'US-RI',
				grade: 'B',
				fill: am4core.color('#90ee90'),
				url: '/anti-slapp-states/rhode-island',
				score: '81%',
			},
			{
				id: 'US-SC',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/south-carolina',
				score: '0%',
			},
			{
				id: 'US-SD',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/south-dakota',
				score: '0%',
			},
			{
				id: 'US-TN',
				grade: 'A',
				fill: am4core.color('#54a557'),
				url: '/anti-slapp-states/tennessee',
				score: '98%',
			},
			{
				id: 'US-TX',
				grade: 'A-',
				fill: am4core.color('#54a557'),
				url: '/anti-slapp-states/texas',
				score: '93%',
			},
			{
				id: 'US-UT',
				grade: 'D-',
				fill: am4core.color('#ff7300'),
				url: '/anti-slapp-states/utah',
				score: '22%',
			},
			{
				id: 'US-VT',
				grade: 'A',
				fill: am4core.color('#54a557'),
				url: '/anti-slapp-states/vermont',
				score: '98%',
			},
			{
				id: 'US-VA',
				grade: 'C+',
				fill: am4core.color('#ffb434'),
				url: '/anti-slapp-states/virginia',
				score: '70%',
			},
			{
				id: 'US-WA',
				grade: 'A-',
				fill: am4core.color('#54a557'),
				url: '/anti-slapp-states/washington',
				score: '93%',
			},
			{
				id: 'US-WV',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/west-virginia',
				score: '0%',
			},
			{
				id: 'US-WI',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/wisconsin',
				score: '0%',
			},
			{
				id: 'US-WY',
				grade: 'F',
				fill: am4core.color('#d7172a'),
				url: '/anti-slapp-states/wyoming',
				score: '0%',
			},
		]

		// Bind "fill" property to "fill" key in data
		polygonTemplate.propertyFields.fill = 'fill'
	})
}
