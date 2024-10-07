<!DOCTYPE html>
<html>
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Создание новой находки</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
</head>
<body>
  
  <h1>Создание новой находки</h1>
  <form action="/findings/create" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Название:</label>
    <input type="text" id="name" name="name" required><br><br>

    <div id="map" style="height: 400px;"></div>

    <input type="hidden" id="latitude" name="latitude">
    <input type="hidden" id="longitude" name="longitude">
    @error('longitude')
    <div style="color: red">Выберите местонахождение</div>
    @enderror

    <label for="contacts">Контакты:</label>
    <input type="text" id="contacts" name="contacts" required><br><br>
  
    <label for="photo">Фото:</label>
    <input type="file" id="photo" name="photo" accept="image/*">

    <input type="submit" value="Подтвердить">
    
  </form>

  <script>
    var mymap = L.map('map').setView([51.505, -0.09], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                   '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © ' +
                   '<a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
    }).addTo(mymap);

    mymap.on('click', function(event) {
      var lat = event.latlng.lat;
      var lng = event.latlng.lng;
      document.getElementById('latitude').value = lat;
      document.getElementById('longitude').value = lng;
      if (typeof marker !== 'undefined') {
        mymap.removeLayer(marker);
      }
      marker = L.marker([lat, lng]).addTo(mymap);
    });
  </script>

</body>
</html>



