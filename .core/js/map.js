
function initMap() {

  var map = new google.maps.Map(document.getElementById('map'), {

    // Initial map settings:

    center: {lat: -5.784730, lng: -35.208857},
    zoom: 19,
    disableDefaultUI: true,
    scaleControl: false,

    // Remove places, buildings and bus stations:
    
    styles: [ 

    	{
              
      	featureType: 'poi',
      	stylers: [ { visibility: "off" } ]
            
      },

      {

        featureType: 'transit.station',
        stylers: [ { visibility: "off" } ]

      },

    ],

  });

  // For each occurrence in occurrences:

  for (var occurrence in occurrences) {

    //draws a circle if reports is greater than 3:

    if (occurrences[occurrence].reports >= 3) {
      
      var riskarea = new google.maps.Circle({

        strokeColor: '#D91E18',
        strokeOpacity: 0,
        strokeWeight: 0,
        fillColor: '#D91E18',
        fillOpacity: 0.5,
        map: map,
        center: occurrences[occurrence].center,
        radius: (occurrences[occurrence].reports * 10), // Multiply every report by 10, this radius is in meters unit.

      }); 

    }

  } 

  // Get user location:

  if (navigator.geolocation) {

    navigator.geolocation.getCurrentPosition(function(position) {

      var pos = {

        lat: position.coords.latitude,
        lng: position.coords.longitude

      };

      // Set map's center with user coords:

      map.setCenter(pos);

      // Store this in Inputs:

      document.getElementById("Lat").value = pos.lat;
      document.getElementById("Lng").value = pos.lng;

    });

  }

}
