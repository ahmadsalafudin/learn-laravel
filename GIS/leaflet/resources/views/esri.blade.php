<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Load Leaflet from CDN -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>

<!-- Load Esri Leaflet from CDN -->
<script src="https://unpkg.com/esri-leaflet@3.0.3/dist/esri-leaflet.js"
  integrity="sha512-kuYkbOFCV/SsxrpmaCRMEFmqU08n6vc+TfAVlIKjR1BPVgt75pmtU9nbQll+4M9PN2tmZSAgD1kGUCKL88CscA=="
  crossorigin=""></script>

<!-- Load Esri Leaflet Vector from CDN -->
<script src="https://unpkg.com/esri-leaflet-vector@3.1.1/dist/esri-leaflet-vector.js"
  integrity="sha512-7rLAors9em7cR3/583gZSvu1mxwPBUjWjdFJ000pc4Wpu+fq84lXF1l4dbG4ShiPQ4pSBUTb4e9xaO6xtMZIlA=="
  crossorigin=""></script>

<style>
  body { margin:0; padding:0; }
  #map { position: absolute; top:0; bottom:0; right:0; left:0; }
</style>
</head>

<body>
    <div id="map" style="height: 600px"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        var map = L.map('map').setView([-6.235555120962657, 106.82518392295015], 17);
        var vectorTiles = {};
        var apiKey = 'AAPKb10821df102a46a4b930958d7a6a06593sdla7i0cMWoosp7XXlYflDTAxsZMUq-oKvVOaom9B8CokPvJFd-sE88vOQ2B_rC'
        var allEnums = [
            'ArcGIS:Imagery',
            'ArcGIS:Imagery:Standard',
            'ArcGIS:Imagery:Labels',
            'ArcGIS:LightGray',
            'ArcGIS:LightGray:Base',
            'ArcGIS:LightGray:Labels',
            'ArcGIS:DarkGray',
            'ArcGIS:DarkGray:Base',
            'ArcGIS:DarkGray:Labels',
            'ArcGIS:Navigation',
            'ArcGIS:NavigationNight',
            'ArcGIS:Streets',
            'ArcGIS:StreetsNight',
            'ArcGIS:StreetsRelief',
            'ArcGIS:StreetsRelief:Base',
            'ArcGIS:Topographic',
            'ArcGIS:Topographic:Base',
            'ArcGIS:Oceans',
            'ArcGIS:Oceans:Base',
            'ArcGIS:Oceans:Labels',
            'OSM:Standard',
            'OSM:StandardRelief',
            'OSM:StandardRelief:Base',
            'OSM:Streets',
            'OSM:StreetsRelief',
            'OSM:StreetsRelief:Base',
            'OSM:LightGray',
            'OSM:LightGray:Base',
            'OSM:LightGray:Labels',
            'OSM:DarkGray',
            'OSM-DarkGray:Base',
            'OSM-DarkGray:Labels',
            'ArcGIS:Terrain',
            'ArcGIS:Terrain:Base',
            'ArcGIS:Terrain:Detail',
            'ArcGIS:Community',
            'ArcGIS:ChartedTerritory',
            'ArcGIS:ChartedTerritory:Base',
            'ArcGIS:ColoredPencil',
            'ArcGIS:Nova',
            'ArcGIS:ModernAntique',
            'ArcGIS:ModernAntique:Base',
            'ArcGIS:Midcentury',
            'ArcGIS:Newspaper',
            'ArcGIS:Hillshade:Light',
            'ArcGIS:Hillshade:Dark'
        ];

        // the L.esri.Vector.vectorBasemapLayer basemap enum defaults to 'ArcGIS:Streets' if omitted
        vectorTiles.Default = L.esri.Vector.vectorBasemapLayer(null, {
            apiKey
        });
        allEnums.forEach((enumString) => {
            vectorTiles[
            enumString
            ] = L.esri.Vector.vectorBasemapLayer(enumString, {
            apiKey
            });
        });

        L.control
            .layers(vectorTiles, null, {
            collapsed: false
            })
            .addTo(map);

        vectorTiles.Default.addTo(map);
</script>
</body>

</html>
