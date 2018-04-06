<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DET') }}</title>

    <!-- Scripts -->

    <!-- Individual Webgazer modules -->
    <script src="{{ asset('js/webgazer.js') }}"></script>
    <script src="{{ asset('js/includes/calibration.js') }}"></script>
    <script src="{{ asset('js/includes/main.js') }}"></script>
    <script src="{{ asset('js/includes/precision_store_points.js') }}"></script>
    <script src="{{ asset('js/includes/precision_calculation.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
</head>
<body>
    <div id="app">
        <main class="">
            @include('inc.navbar')
            <a href="#" id="mylink">Gaze</a>
            @include('inc.messages')
            @yield('content')
        </main>
    </div>
    <script>
        window.onload = function() {

          //Get a reference to the link on the page
          // with an id of "mylink"
          var a = document.getElementById("mylink");

          //Set code to run when the link is clicked
          // by assigning a function to "onclick"
          a.onclick = function() {

            // Your code here...

            //If you don't want the link to actually 
            // redirect the browser to another page,
            // "google.com" in our example here, then
            // return false at the end of this block.
            // Note that this also prevents event bubbling,
            // which is probably what we want here, but won't 
            // always be the case.

            //start the webgazer tracker
            webgazer.setRegression('ridge') /* currently must set regression and tracker */
            .setTracker('clmtrackr')
            .setGazeListener(function(data, clock) {
             console.log(data); /* data is an object containing an x and y key which are the x and y prediction coordinates (no bounds limiting) */
             console.log(clock); /* elapsed time in milliseconds since webgazer.begin() was called */
            })
            .begin()
            .showPredictionPoints(true); /* shows a square every 100 milliseconds where current prediction is */
            
            return false;
          }
        }
    </script>
</body>

</html>
