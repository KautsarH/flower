<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-florist') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://atlas.microsoft.com/sdk/javascript/mapcontrol/2/atlas.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=en_RU&amp;apikey=pdct.1.1.20191210T081339Z.3eb163a740fb0d92.adcd805c20f3847a004df15f2ef1d9c9e0e302a7" type="text/javascript"></script>
    <script src="direct_geocode.js" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://atlas.microsoft.com/sdk/javascript/mapcontrol/2/atlas.min.css" type="text/css" />
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
    <style> 
        html,body {
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
        }

        #map {
        width: 100%;
        height: 100%;
        }

        .popup-content {
        padding: 10px;
        }
    </style>
    
    <script type="text/javascript">

ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map('map', {
        center: [3.1390, 101.6869],
        zoom: 9
    });

    // Finding coordinates of the center of Nizhny Novgorod.
    ymaps.geocode('Nizhny Novgorod', {
        /**
         * Request options
         * @see https://api.yandex.com/maps/doc/jsapi/2.1/ref/reference/geocode.xml
          */
        /**
         * Sorting the results from the center of the map window
         *  boundedBy: myMap.getBounds(),
         *  strictBounds: true,
         *  Together with the boundedBy option, the search will be strictly inside the area specified in boundedBy.
         *  If you need only one result, this will minimize the user's traffic.
         */
        results: 1
    }).then(function (res) {
            // Selecting the first result of geocoding.
            var firstGeoObject = res.geoObjects.get(0),
                // The coordinates of the geo object.
                coords = firstGeoObject.geometry.getCoordinates(),
                // The viewport of the geo object.
                bounds = firstGeoObject.properties.get('boundedBy');

            firstGeoObject.options.set('preset', 'islands#darkBlueDotIconWithCaption');
            // Getting the address string and displaying it in the geo object icon.
            firstGeoObject.properties.set('iconCaption', firstGeoObject.getAddressLine());

            // Adding first found geo object to the map.
            myMap.geoObjects.add(firstGeoObject);
            // Scaling the map to the geo object viewport.
            myMap.setBounds(bounds, {
                // Checking the availability of tiles at the given zoom level.
                checkZoomRange: true
            });

            /**
             * All data in the form of a javascript object.
             */
            console.log('All the geo object data: ', firstGeoObject.properties.getAll());
            /**
             * The metadata of the request and geocoder response.
             * @see https://api.yandex.com/maps/doc/geocoder/desc/reference/GeocoderResponseMetaData.xml
              */
            console.log('The metadata of the geocoder response: ', res.metaData);
            /**
             * Metadata of the geocoder returned for the found object.
             * @see https://api.yandex.com/maps/doc/geocoder/desc/reference/GeocoderMetaData.xml
              */
            console.log('Geocoder metadata: ', firstGeoObject.properties.get('metaDataProperty.GeocoderMetaData'));
            /**
             * The accuracy of the response (precision) is only returned for houses.
             * @see https://api.yandex.com/maps/doc/geocoder/desc/reference/precision.xml
              */
            console.log('precision', firstGeoObject.properties.get('metaDataProperty.GeocoderMetaData.precision'));
            /**
             * The type of found object (kind).
             * @see https://api.yandex.com/maps/doc/geocoder/desc/reference/kind.xml
              */
            console.log('Type of geo object: %s', firstGeoObject.properties.get('metaDataProperty.GeocoderMetaData.kind'));
            console.log('Object name: %s', firstGeoObject.properties.get('name'));
            console.log('Object description: %s', firstGeoObject.properties.get('description'));
            console.log('Full object description: %s', firstGeoObject.properties.get('text'));
            /**
            * Direct methods for working with the geocoding results.
            * @see https://tech.yandex.com/maps/doc/jsapi/2.1/ref/reference/GeocodeResult-docpage/#getAddressLine
             */
            console.log('\nState: %s', firstGeoObject.getCountry());
            console.log('Municipality: %s', firstGeoObject.getLocalities().join(', '));
            console.log('Address of the object: %s', firstGeoObject.getAddressLine());
            console.log('Name of the building: %s', firstGeoObject.getPremise() || '-');
            console.log('Building number: %s', firstGeoObject.getPremiseNumber() || '-');

            /**
             * To add a placemark with its own styles and balloon content at the coordinates found by the geocoder, create a new placemark at the coordinates of the found placemark and add it to the map in place of the found one.
             */
            /**
             var myPlacemark = new ymaps.Placemark(coords, {
             iconContent: 'my placemark',
             balloonContent: 'Content of the <strong>my placemark</strong> balloon'
             }, {
             preset: 'islands#violetStretchyIcon'
             });

             myMap.geoObjects.add(myPlacemark);
             */
        });
}
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'E-florist') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('Profile') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('delivery.index') }}">{{ __('My Address') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('product.index') }}">{{ __('Shop') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('product.cart') }}">{{ __('Cart') }} 
                                    <span class="badge"> {{Session::has('cart') ? Session::get('cart')->totalQty : ''}}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('order.index') }}">{{ __('Purchase History') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <script>
    // Call Geocode
    //geocode();

    // Get location form
    var locationForm = document.getElementById('location-form');

    // Listen for submiot
    locationForm.addEventListener('submit', geocode);

    function geocode(e){
      // Prevent actual submit
      e.preventDefault();

      var location = document.getElementById('location-input').value;

      axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
        params:{
          address:location,
          key:'AIzaSyDGFBtVMmW_0BjBXYErG0Qxpl94FgTTFtw'
        }
      })
      .then(function(response){
        // Log full response
        console.log(response);

        // Formatted Address
        var formattedAddress = response.data.results[0].formatted_address;
        var formattedAddressOutput = `
          <ul class="list-group">
            <li class="list-group-item">${formattedAddress}</li>
          </ul>
        `;

        // Address Components
        var addressComponents = response.data.results[0].address_components;
        var addressComponentsOutput = '<ul class="list-group">';
        for(var i = 0;i < addressComponents.length;i++){
          addressComponentsOutput += `
            <li class="list-group-item"><strong>${addressComponents[i].types[0]}</strong>: ${addressComponents[i].long_name}</li>
          `;
        }
        addressComponentsOutput += '</ul>';

        // Geometry
        var lat = response.data.results[0].geometry.location.lat;
        var lng = response.data.results[0].geometry.location.lng;
        var geometryOutput = `
          <ul class="list-group">
            <li class="list-group-item"><strong>Latitude</strong>: ${lat}</li>
            <li class="list-group-item"><strong>Longitude</strong>: ${lng}</li>
          </ul>
        `;

        // Output to app
        document.getElementById('formatted-address').innerHTML = formattedAddressOutput;
        document.getElementById('address-components').innerHTML = addressComponentsOutput;
        document.getElementById('geometry').innerHTML = geometryOutput;
        document.getElementById("latitude").value = lat;
        document.getElementById("longitude").value= lng;


      })
      .catch(function(error){
        console.log(error);
      });
    }
  </script>
    </div>
    
</body>
</html>
