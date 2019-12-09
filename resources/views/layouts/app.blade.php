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
    <script>
        //URL to fetch Access token
        var url = 'https://adtokens.azurewebsites.net/api/HttpTrigger1?code=dv9Xz4tZQthdufbocOV9RLaaUhQoegXQJSeQQckm6DZyG/1ymppSoQ==';

        var map = new atlas.Map("map", {
        //Add your Azure Maps subscription client ID to the map SDK. Get an Azure Maps client ID at https://azure.com/maps
        authOptions: {
            authType: "anonymous",
            clientId: "35267128-0f1e-41de-aa97-f7a7ec8c2dbd",
            getToken: function(resolve, reject, map) {
                fetch(url).then(function(response) {
                    return response.text();
                }).then(function(token) {
                    resolve(token);
                });
            }
        },
        center: [3.1390, 101.6869],
        zoom: 12
        });

        /* Ensure that the map resources load fully */
        map.events.add("load", function(e){
        /* Update the style of mouse cursor to a pointer */
        map.getCanvasContainer().style.cursor = "pointer";
        /* Create a popup */
        var popup = new atlas.Popup();

        /* Upon a mouse click, open a popup at the clicked location and render in the popup the address of the clicked location*/
        map.events.add("click", function(e) {  
            //send a request to Azure Maps reverse address search API */
            var url = "https://atlas.microsoft.com/search/address/reverse/json?";
            url += "&api-version=1.0";
            url += "&query=" + e.position[1] + "," + e.position[0];
            
            /*Process request*/
            fetch(url, {
            headers: {
                "Authorization" : "Bearer " + map.authentication.getToken(),
                "x-ms-client-id" : "35267128-0f1e-41de-aa97-f7a7ec8c2dbd"
            } 
            }).then(function (response) {
            return response.json();
            }).then(function (res) {
            var popupContent = document.createElement("div");
            popupContent.classList.add("popup-content");
            var address = res["addresses"];
            popupContent.innerHTML =
                address.length !== 0
                ? address[0]["address"]["freeformAddress"]
            : "No address for that location!";
            popup.setOptions({
                position: e.position,
                content: popupContent
            });      
            // render the popup on the map 
            popup.open(map);
            });
        });
        });
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
                                <a class="nav-link" href="{{ route('history.index') }}">{{ __('Purchase History') }}</a>
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
    </div>
    
</body>
</html>
