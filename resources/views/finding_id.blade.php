<!DOCTYPE html>
<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $name }}</title>
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
    <h1>{{ $name }}</h1>
    <h2>{{ $contacts }}</h2> 
    <img src="/findings/{{ $find->id }}/file?v={{ time()}}" alt="image not found">
    @if (Auth::check())
    <form action="/findings/{{ $find->id }}" method="POST">
      @csrf
      @method('DELETE')
    <button type="submit">Удалить</button>
    </form>

    <form action="/findings/{{ $find->id }}/edit" method="GET">
    @csrf
    <a href="/findings/{{ $find->id }}/edit">Редактировать</a>
    </form>
    @endif
</body>
<script>    
    var mymap = L.map('map').setView([{!! $latitude !!}, {!! $longitude !!}], 8);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © ' +
            '<a href="https://www.mapbox.com/">mapbox</a>',
        maxZoom: 18,
    }).addTo(mymap);

var findingsData = {!! $findData !!};
findingsData.forEach(function(finding) {
L.marker([finding.latitude, finding.longitude]).addTo(mymap)
    .bindPopup(finding.name);
});
</script>
</html>

