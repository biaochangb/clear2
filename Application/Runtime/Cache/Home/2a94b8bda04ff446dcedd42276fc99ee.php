<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
    </style><script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=en">
		//zh-CN: Chinese (Simplified)
	</script> 

    <script type="text/javascript">
	var marker;
var map;
      function initialize() {
        var mapOptions = {
          center: { lat: 35, lng: 105},
          zoom: 5
        };
         map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
					var myLatlng = new google.maps.LatLng(35,110);
		 marker = new google.maps.Marker({
			  position: myLatlng,
			  map: map,
			  title: 'Hello World!'
		  });
		google.maps.event.addListener(marker, 'click', toggleBounce);  
      }
	  
function toggleBounce() {

  if (marker.getAnimation() != null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
<div id="map-canvas"></div>
  </body>
</html>