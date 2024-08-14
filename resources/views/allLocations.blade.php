<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Lokasi</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Template Main CSS File -->
    <link href="assets2/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Konten HTML Anda yang sudah ada di sini -->
  <!-- resources/views/allLocations.blade.php -->

<!-- Konten HTML Anda yang sudah ada di sini -->
<div id="map" style="height: 400px;"></div>

<script>
    var mymap = L.map('map');

    var markers = L.featureGroup(); // Membuat grup marker

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(mymap);

    // Menambahkan marker dinamis berdasarkan longitude dan latitude dari database
    @foreach($locations as $location)
        var marker = L.marker([{{ $location->latitude }}, {{ $location->longitude }}]);
        var popupContent = '{{ $location->nama_lengkap }}';

        marker.bindPopup(popupContent);
        markers.addLayer(marker); // Menambahkan marker ke grup

        // Pastikan bahwa $location->nama_lengkap berisi konten yang valid
    @endforeach

    // Menambahkan grup marker ke peta
    markers.addTo(mymap);

    // Menentukan batas-batas peta berdasarkan grup marker
    mymap.fitBounds(markers.getBounds());
</script>


</body>
</html>