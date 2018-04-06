<!DOCTYPE html>
<html>

<head>
    <script async type="text/javascript" src="js/webgazer.js"></script>
	
    <title>Webgazer</title>
</head>
<body>
	<h1>Testing Webgazer</h1>
</body>
    <script src="js/main.js" type="text/javascript"></script>
    <script src="js/webgazer.js" type="text/javascript"></script>
    <script src="js/precision_calculation.js" type="text/javascript"></script>
    <script src="js/precision_store_points.js" type="text/javascript"></script>
    <script src="js/calibration.js" type="text/javascript"></script>
	<script type="text/javascript">
    //start the webgazer tracker
    webgazer.setRegression('ridge') /* currently must set regression and tracker */
        .setTracker('clmtrackr')
        .setGazeListener(function(data, clock) {
             //console.log(data); /* data is an object containing an x and y key which are the x and y prediction coordinates (no bounds limiting) */
             //console.log(clock); /* elapsed time in milliseconds since webgazer.begin() was called */
        })
        .begin()
        .showPredictionPoints(true); /* shows a square every 100 milliseconds where current prediction is */
    
         
	</script>
</html>