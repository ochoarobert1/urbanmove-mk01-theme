const quantityInput = document.getElementById('quantity');
const elementContainer = document.getElementById('inputRepeat');
quantityInput.addEventListener('change', get_passengers_quantity, true);

function get_passengers_quantity() {
    jQuery('#inputRepeat').html('');
    for (i = 0; i < quantityInput.value; i++) {
        
        jQuery('#inputRepeat').append('<div class="form-inline form-inline-repeat col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"><label for="pasajero[]">Pasajero ' + (i + 1) + '</label><select name="pasajero[]" id="" class="form-control"><option value="adult">Adulto</option><option value="kid">Niño/a</option></select></div>');
    }
    

}