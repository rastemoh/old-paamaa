var map;
var markersArray = [];
function initializeMap() {
	var myCenter = new google.maps.LatLng(35.6833, 51.4167);// Tehran
	console.log("Hello");
	var mapProp = {
		center : myCenter,
		zoom : 10,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	};

	map = new google.maps.Map(document.getElementById("mapContainer"), mapProp);
	google.maps.event.addListener(map, 'click', function(event) {
		placeNewMarker(event.latLng);
	});
}
function placeNewMarker(location) {
    clearOverlays();
	var marker = new google.maps.Marker({
		position : location,
		map : map,
	});
	markersArray.push(marker);
	$('#inputX').val(location.lat);
	$('#inputY').val(location.lng);
//	var infowindow = new google.maps.InfoWindow({
//		content : 'اینجا'
//	});
//	infowindow.open(map, marker);
}

function clearOverlays() {
	for (var i = 0; i < markersArray.length; i++) {
		markersArray[i].setMap(null);
	}
}