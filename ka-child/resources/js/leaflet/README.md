To add new countries to the map, you need to open the `countries.geojson` file in this [website]('https://jsonformatter.org/json-pretty-print')

Then search for the name of the country and copy the entire object to your code editor. After that, you need to copy the geometry object which includes the `type` and `coordinates` properties.

Then add replace this object geometry object with the one you just copied. Make sure to increment the `id` and chnage the name of the country in the `properties->name` object.

```
{
  type: 'Feature',
  id: '04',
  properties: { name: 'Zambia' },
  geometry: {
    type: 'Polygon',
    coordinates: []
  }
}
```

Then open the corresponding country file in this directory and add the object you just created to the list.

### Important Note
This integration only support the current areas such as `Latin America`, `Africa`, `Asia` and `Middle East`.If you want to add a country that is not in this list, you need to add it to the `countries` directory and import it in your `map-settings.js` file and add it to the zones object. The key of the object should be the name of the `taxonomy` in your WordPress site.