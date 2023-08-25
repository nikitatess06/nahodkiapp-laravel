<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Карта Беларуси</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
   integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
   integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
   crossorigin=""></script>
   <style>
    #map { height: 720px; }
   </style>
</head>
<body>    
    <div id="map"></div>
<div>
    <h2>Последние находки</h2>
    <ul>
        @foreach ($lastFindings as $finding)
            <li><a href="/findings/{{ $finding->id }}">{{ $finding->name }}</a></li>
        @endforeach
    </ul>
    <a href="/findings">Перейти в архив находок</a>
</div>
</body>
<script>
        var mymap = L.map('map').setView([53.9, 27.56], 8);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © ' +
                '<a href="https://www.mapbox.com/">mapbox</a>',
            maxZoom: 18,
        }).addTo(mymap);
var findingsData = {!! $findingsData !!};
findingsData.forEach(function(finding) {
    L.marker([finding.latitude, finding.longitude]).addTo(mymap)
        .bindPopup(finding.name);
});
    </script>
</html>
