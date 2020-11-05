document.addEventListener('DOMContentLoaded', function(){ 
    google.maps.event.addDomListener(window, 'load', initialize);
}, false);

function initialize() {
    var input = document.getElementById('location');
    var autocomplete = new google.maps.places.Autocomplete(input);
}