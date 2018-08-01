$(document).ready(function(){
   //Show Map on France
   mapboxgl.accessToken = 'pk.eyJ1IjoibHVjaWVnYXJjaWF3ZWIiLCJhIjoiY2pqNnRjbWhoMXhxZDN3cDYxMHJ4OHZ3biJ9.hbAlwrjLCAoloBU7mfYY3g';

   var map = new mapboxgl.Map({
       container: 'map',
       style: 'mapbox://styles/mapbox/streets-v9',
       center: [2.320582, 46.859489],
       zoom: 5
   });


map.addControl(new MapboxLanguage({
       defaultLanguage: 'fr'
   }));

   // Add geolocate control to the map.
   map.addControl(new mapboxgl.GeolocateControl({
       positionOptions: {
           enableHighAccuracy: true
       },
       trackUserLocation: true
   }));



   autocomplete = true;

   map.addControl(new MapboxDirections({
       accessToken: mapboxgl.accessToken
   }), 'top-left');


 
   //MARKER
   map.on('load', function () {
       var marker = document.createElement('div');
       marker.classList = 'point';
       // Create a new marker
       pointMarker = new mapboxgl.Marker(marker)
               .setLngLat(pointLocation)
               .addTo(map);
       
       
   });
   
   


 
   $('.mapboxgl-ctrl-geocoder').change(function () {
               $('#depart').val($('#mapbox-directions-origin-input .mapboxgl-ctrl-geocoder > input').val());
               $('#arriver').val($('#mapbox-directions-destination-input .mapboxgl-ctrl-geocoder > input').val());

                setTimeout(function(){
                    var result = $('.mapbox-directions-route-summary h1').text();
                    var km = (result.substring(0, result.length-2) * 1.609).toFixed(2);
                    $('#distance').val(km);
                    var aPos = $(".mapbox-directions-step");
                    $('#lat_dep').val($(aPos[0]).data("lng"));
                    $('#lng_dep').val($(aPos[0]).data("lat"));
                    $('#lat_arr').val($(aPos[aPos.length - 1]).data("lng"));
                    $('#lng_arr').val($(aPos[aPos.length - 1]).data("lat"));
                }, 1000);
    });
});
    
   
    
