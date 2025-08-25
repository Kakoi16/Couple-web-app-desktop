<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
          <link
    href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css"
    rel="stylesheet"
  />

  <style>
    html, body { height: 100%; margin: 0; }
      #map {
        width: 100%;
        height: 500px; 
        border-radius: 8px;
    }
    .mapboxgl-ctrl-top-right { margin-top: 10px; }
  </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main>
                {{ $slot }}
            </main>
        </div>
        @stack('scripts')
    </body>

    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>

  <script>
document.addEventListener("DOMContentLoaded", async () => {
    // 🔹 Ambil token dari backend
    const tokenRes = await fetch("{{ route('mapbox.token') }}");
    const tokenData = await tokenRes.json();
    mapboxgl.accessToken = tokenData.token;

    // 🔹 Inisialisasi map
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [107.3041, -6.3227], 
        zoom: 12
    });

    // Kontrol navigasi & geolokasi
    map.addControl(new mapboxgl.NavigationControl(), 'top-right');
    map.addControl(new mapboxgl.GeolocateControl({
        positionOptions: { enableHighAccuracy: true },
        trackUserLocation: true,
        showUserHeading: true
    }), 'top-right');

    // Simpan marker supaya tidak dobel tiap refresh
    let markers = [];

    // 🔹 Fungsi ambil lokasi semua user
    async function loadUsers() {
        try {
            const res = await fetch("{{ route('mapbox.users') }}");
            const users = await res.json();

            // Hapus marker lama
            markers.forEach(m => m.remove());
            markers = [];

            // Gabungkan user berdasarkan koordinat
            const grouped = {};
            users.forEach(user => {
                if(user.latitude && user.longitude){
                    const key = `${user.latitude},${user.longitude}`;
                    if (!grouped[key]) grouped[key] = [];
                    grouped[key].push(user);
                }
            });

            // Buat marker untuk setiap titik unik
            Object.keys(grouped).forEach(coord => {
                const [lat, lng] = coord.split(",");
                const listUser = grouped[coord];

                // Isi popup: daftar user di titik ini
                let popupHtml = `<strong>Lokasi (${lat}, ${lng})</strong><br><ul>`;
                listUser.forEach(u => {
                    popupHtml += `<li>${u.name} (${u.email})</li>`;
                });
                popupHtml += `</ul>`;

                const marker = new mapboxgl.Marker({ color: 'red' })
                    .setLngLat([parseFloat(lng), parseFloat(lat)])
                    .setPopup(new mapboxgl.Popup().setHTML(popupHtml))
                    .addTo(map);

                markers.push(marker);
            });

        } catch (err) {
            console.error("Error load user lokasi:", err);
        }
    }

    // Load pertama kali
    loadUsers();

    // Refresh setiap 10 detik
    setInterval(loadUsers, 10000);

    // 🔹 Update lokasi user aktif
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(async (pos) => {
            const lat = pos.coords.latitude;
            const lng = pos.coords.longitude;

            try {
                await fetch("{{ route('mapbox.updateLocation') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ latitude: lat, longitude: lng })
                });
            } catch (err) {
                console.error("Gagal update lokasi:", err);
            }
        });
    }
});
</script>

</html>