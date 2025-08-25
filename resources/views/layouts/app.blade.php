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
    /* Peta harus punya ukuran; 100vh agar full tinggi layar */
    html, body { height: 100%; margin: 0; }
    #map { width: 100%; height: 100vh; }
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
    // 🔹 Inisialisasi Mapbox
    mapboxgl.accessToken = 'pk.eyJ1IjoiY2VpaWF1bWQiLCJhIjoiY204ZWdwaHhqMDFweDJsc2NjeHE0Y3RuaCJ9.2hkh_3P2vpB0oydxJUOv6A';

    const map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v11',
      center: [107.3041, -6.3227], // Default ke Karawang
      zoom: 14
    });

    // Kontrol zoom/rotate
    map.addControl(new mapboxgl.NavigationControl(), 'top-right');

    // Kontrol geolokasi (opsional)
    map.addControl(new mapboxgl.GeolocateControl({
      positionOptions: { enableHighAccuracy: true },
      trackUserLocation: true,
      showUserHeading: true
    }), 'top-right');

    // Marker di pusat peta
    const center = [107.3041, -6.3227];
    new mapboxgl.Marker().setLngLat(center).addTo(map);

    // Tooltip koordinat saat klik peta
    map.on('click', (e) => {
      const lngLat = e.lngLat.wrap();
      new mapboxgl.Popup()
        .setLngLat(lngLat)
        .setHTML(`<strong>Koordinat</strong><br/>${lngLat.lng.toFixed(6)}, ${lngLat.lat.toFixed(6)}`)
        .addTo(map);
      console.log('Clicked at:', lngLat);
    });
  </script>
</html>