$(function() {
    
});
function initialize() {
  autocomplete = new google.maps.places.Autocomplete(document.getElementById('locationSearch'));
  autocomplete.setComponentRestrictions({'country': 'se'});
}
