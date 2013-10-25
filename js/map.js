var map;
var myLatlng;
var feeling = "";
var latitude = "";
var longitude = "";
var marker;

function initialize() {
	//myLatlng = new google.maps.LatLng(-33.877, 151.244);
	var mapOptions = {
		zoom: 15,
		//center: myLatlng,
		panControl: true,
		zoomControl: true,
		mapTypeControl: false,
		scaleControl: true,
		streetViewControl: false,
		overviewMapControl: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById('map'),
		mapOptions);


	if(navigator.geolocation) {
    	navigator.geolocation.getCurrentPosition(function(position) {
      		var myLatlng = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      		marker = new google.maps.Marker({
        		map: map,
        		position: myLatlng,
        		draggable:true,
        		animation: google.maps.Animation.DROP,
        		content: 'I\'m here.'
      		});
      		latitude = myLatlng.lat()
      		longitude = myLatlng.lng();
    	map.setCenter(myLatlng);
    	}, function() {
      		handleNoGeolocation(true);
    	});
  	} else {
    	// Browser doesn't support Geolocation
    	handleNoGeolocation(false);
  	}
}

function handleNoGeolocation(errorFlag) {
	if (errorFlag) {
    	var content = 'Error: The Geolocation service failed.';
	} else {
    	var content = 'Error: Your browser doesn\'t support geolocation.';
	}
	var options = {
    	map: map,
    	position: new google.maps.LatLng(60, 105),
    	content: content
	};
	var infowindow = new google.maps.InfoWindow(options);
	map.setCenter(options.position);
	latitude = myLatlng.lat();
  longitude = myLatlng.lng();
}

google.maps.event.addDomListener(window, 'load', initialize);