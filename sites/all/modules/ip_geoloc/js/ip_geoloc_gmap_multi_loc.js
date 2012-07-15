
(function ($) {

  Drupal.behaviors.addGMapMultiLocation = {
    attach: function (context, settings) {

      var locations = settings.ip_geoloc_locations;
      var mapOptions = settings.ip_geoloc_multi_location_map_options;
      var accurateLocation = settings.ip_geoloc_multi_location_visitor_location_accurate;
      visitorMarker = settings.ip_geoloc_multi_location_visitor_marker;
      centerOption = settings.ip_geoloc_multi_location_center_option;

      if (!mapOptions) {
        alert(Drupal.t('Syntax error in map options.'));
      }
      map = new google.maps.Map(document.getElementById(settings.ip_geoloc_multi_location_map_div), mapOptions);

      // A map must have a type, a zoom and a center or nothing will show.
      if (!map.getMapTypeId()) {
        map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
      }
      if (!map.getZoom()) {
        map.setZoom(2);
      }
      centerSet = false;
      if (centerOption == 0 || locations.length == 0) {
        // If no center override option was specified, we set the center based
        // on the mapOptions. Without a center there won't be a map!
        map.setCenter(new google.maps.LatLng(
          mapOptions.centerLat ? mapOptions.centerLat : 0,
          mapOptions.centerLng ? mapOptions.centerLng : 0));
      }

      if (visitorMarker || centerOption >= 2) {
        // Retrieve visitor's location, fall back on supplied location, if not found.
        if (accurateLocation && geo_position_js.init()) {
          // Center the map on the user's current location, using the geo.js unified API.
          geo_position_js.getCurrentPosition(handleMapCenterAndVisitorMarker1, handlePositionError, {enableHighAccuracy: true});
        }
        else {
          // Use supplied visitor lat/lng to center and set marker.
          var latLng = settings.ip_geoloc_multi_location_center_latlng;
          handleMapCenterAndVisitorMarker2(latLng[0], latLng[1]);
        }
      }
      var i = 1;
      var balloonTexts = [];
      for (var key in locations) {
        var mouseOverText = Drupal.t('Location #@i', { '@i': i++ });
        var position = new google.maps.LatLng(locations[key].latitude, locations[key].longitude);
        if (!centerSet && centerOption == 1) {
          // If requested center map on the first location, if any.
          map.setCenter(position);
          centerSet = true;
        }

        marker = new google.maps.Marker({ map: map, position: position, title: mouseOverText });

        // Funny index is because listener callback only gives us position
        balloonTexts['LL' + position] = locations[key].balloonText;

        google.maps.event.addListener(marker, 'click', function(event) {
          new google.maps.InfoWindow({
            content: balloonTexts['LL' + event.latLng],
            position: event.latLng
          }).open(map);
        });
      }

      function handleMapCenterAndVisitorMarker1(visitorPosition) {
        handleMapCenterAndVisitorMarker2(visitorPosition.coords.latitude, visitorPosition.coords.longitude);
      }

      function handleMapCenterAndVisitorMarker2(latitude, longitude) {
        var visitorPosition = new google.maps.LatLng(latitude, longitude);
        if (centerOption >= 2) {
          map.setCenter(visitorPosition);
          centerSet = true;
        }
        if (visitorMarker) {
          showSpecialMarker(visitorPosition, Drupal.t('Your current position (' + latitude + ', ' + longitude + ')'));
        }
      }

      function showSpecialMarker(position, text) {
        if (visitorMarker == true) {
          specialMarker = new google.maps.Marker({ map: map, position: position, title: text });
        }
        else {
          // Interpret value of visitorMarker as the marker color
          var pinChar = "%E2%80%A2"; // or a letter, e.g. "X"
          var pinColor = visitorMarker; // eg "00FF00" for bright green
          var textColor = "000000";  // black
          // Note: cannot use https: here...
          var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=" + pinChar + "|" + pinColor + "|" + textColor,
            new google.maps.Size(21, 34), new google.maps.Point(0, 0), new google.maps.Point(10, 34));
          specialMarker = new google.maps.Marker({ icon: pinImage, map: map, position: position, title: text });
        }
        google.maps.event.addListener(specialMarker, 'click',  function(event) {
          new google.maps.InfoWindow({
            content: text,
            position: event.latLng
          }).open(map);
        });
      }

      // Fall back on IP address lookup, for instance when user declined to share location (error 1)
      function handlePositionError(error) {
        //alert(Drupal.t('IP Geolocation, multi-location map: getCurrentPosition() returned error !code', {'!code': error.code}));
        var latLng = settings.ip_geoloc_multi_location_center_latlng;
        handleMapCenterAndVisitorMarker2(latLng[0], latLng[1]);
      }
    }
  }
})(jQuery);
