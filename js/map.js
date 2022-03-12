function initMap() {

  var batifol = {lat: 46.935032, lng: -71.312611}
  var map = new google.maps.Map(document.getElementById('map'), {
    center: batifol,
    zoom: 15,
    disableDefaultUI: true,
    styles: [
{
"elementType": "geometry",
"stylers": [
{
  "color": "#f5f5f5"
}
]
},
{
"elementType": "labels.icon",
"stylers": [
{
  "visibility": "off"
}
]
},
{
"elementType": "labels.text.fill",
"stylers": [
{
  "color": "#616161"
}
]
},
{
"elementType": "labels.text.stroke",
"stylers": [
{
  "color": "#f5f5f5"
}
]
},
{
"featureType": "administrative.land_parcel",
"elementType": "labels.text.fill",
"stylers": [
{
  "color": "#bdbdbd"
}
]
},
{
"featureType": "poi",
"elementType": "geometry",
"stylers": [
{
  "color": "#eeeeee"
}
]
},
{
"featureType": "poi",
"elementType": "labels.text.fill",
"stylers": [
{
  "color": "#757575"
}
]
},
{
"featureType": "poi.park",
"elementType": "geometry",
"stylers": [
{
  "color": "#e5e5e5"
}
]
},
{
"featureType": "poi.park",
"elementType": "labels.text.fill",
"stylers": [
{
  "color": "#9e9e9e"
}
]
},
{
"featureType": "road",
"elementType": "geometry",
"stylers": [
{
  "color": "#ffffff"
}
]
},
{
"featureType": "road.arterial",
"elementType": "labels.text.fill",
"stylers": [
{
  "color": "#757575"
}
]
},
{
"featureType": "road.highway",
"elementType": "geometry",
"stylers": [
{
  "color": "#dadada"
}
]
},
{
"featureType": "road.highway",
"elementType": "labels.text.fill",
"stylers": [
{
  "color": "#616161"
}
]
},
{
"featureType": "road.local",
"elementType": "labels.text.fill",
"stylers": [
{
  "color": "#9e9e9e"
}
]
},
{
"featureType": "transit.line",
"elementType": "geometry",
"stylers": [
{
  "color": "#e5e5e5"
}
]
},
{
"featureType": "transit.station",
"elementType": "geometry",
"stylers": [
{
  "color": "#eeeeee"
}
]
},
{
"featureType": "water",
"elementType": "geometry",
"stylers": [
{
  "color": "#c9c9c9"
}
]
},
{
"featureType": "water",
"elementType": "labels.text.fill",
"stylers": [
{
  "color": "#9e9e9e"
}
]
}
]
  });

  var infowindow = new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);

  service.getDetails({
    placeId: 'ChIJ44LtpoCjuEwR3ienPOKYuBE'
  }, function(place, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
      var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location
      });
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent('<div class="map"><strong>' + place.name + '</strong><br>' +
          place.formatted_address +'<br><a href="https://www.google.com/maps/search/?api=1&query=46.935032,-71.312611">Obtenir un itinéraire</a>' +'</div>');
        infowindow.open(map, this);
      });
    }
  });
}
