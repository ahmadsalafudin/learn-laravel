<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Intro</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
</head>

<body>
    <div id="map" style="height: 800px"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        var mymap = L.map('map').setView([-6.235555120962657, 106.82518392295015], 17);
        // default
        L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(mymap);
        //hybrid
        // L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
        //     maxZoom: 20,
        //     subdomains:['mt0','mt1','mt2','mt3']
        // }).addTo(mymap);
        //satelite
        // L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
        //     maxZoom: 20,
        //     subdomains:['mt0','mt1','mt2','mt3']
        // }).addTo(mymap);
        //terain
        // L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
        //     maxZoom: 20,
        //     subdomains:['mt0','mt1','mt2','mt3']
        // }).addTo(mymap);

        // marker
        L.marker([-6.235555120962657, 106.82518392295015]).addTo(mymap).bindPopup('Nama Kota dll');
        //marker custom icon
        // https://leafletjs.com/examples/custom-icons/
        // var LeafIcon = L.Icon.extend({
        //     options: {
        //         // shadowUrl: 'marker.png',
        //         iconSize:     [30, 65],
        //         shadowSize:   [50, 64],
        //         iconAnchor:   [22, 54],
        //         shadowAnchor: [4, 62],
        //         popupAnchor:  [-3, -76]
        //     }
        // });
        // var greenIcon = new LeafIcon({iconUrl: 'marker.png'});
        // L.marker([-6.235555120962657, 106.82518392295015], {icon: greenIcon}).addTo(mymap).bindPopup('Nama Kota dll');

        //polyline
        // var latlngs = [
        //     [
        //     -6.263427567216299,
        //     106.96014404296875,
        //     ],
        //     [
        //         -6.32348821770752,
        //         106.66763305664062,
        //     ],
        //     [
        //         -6.219742749707098,
        //         106.4849853515625,
        //     ],
        //     [
        //         -6.277078324239117,
        //         106.37786865234375,
        //     ]
        // ];
        // var polyline = L.polyline(latlngs, {color: 'red'}).addTo(mymap);
        // mymap.fitBounds(polyline.getBounds())
        var latlngs = [ [ -6.277078324239117, 106.37786865234375,], [ -6.547288662168586, 106.52206420898438, ], [ -6.450411558010167, 106.94366455078125, ],  [ -6.271618064314864, 106.95465087890625,  ],  [ -6.105052896455727, 106.754150390625, ],  [-6.122804134421456, 106.4520263671875,], [ -6.277078324239117, 106.37786865234375, ] ];
        var polygon = L.polygon(latlngs, {color: 'red'}).addTo(mymap).bindPopup('area terlarang');
        mymap.fitBounds(polygon.getBounds());
    </script>
</body>

</html>
