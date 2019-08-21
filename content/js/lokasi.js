function updateMarkerPosition(latLng) {
	"use strict";
		document.getElementById('lat').value = [latLng.lat()];
		document.getElementById('lng').value = [latLng.lng()];
	}

 
	var google;
    var myOptions = {
      zoom: 14,
        scaleControl: true,
      center:  new google.maps.LatLng(-6.9174639,107.61912280000001),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

	
    var map = new google.maps.Map(document.getElementById("map"),
        myOptions);
		
	

	var marker = new google.maps.Marker({
	position : new google.maps.LatLng(-6.9174639,107.61912280000001),
	title : 'lokasi',
	map : map,
	draggable : true
	});
	
	
	//updateMarkerPosition(latLng);

	google.maps.event.addListener(marker, 'drag', function() {
		"use strict";
		updateMarkerPosition(marker.getPosition());
	});

// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.


	

	