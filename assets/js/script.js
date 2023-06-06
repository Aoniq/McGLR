document.addEventListener('DOMContentLoaded', function() {
    // Plaats hier de code voor het toevoegen van de eventlisteners
    // Zoek de elementen voor plus en min op
    var plusBtn = document.getElementById('plus');
    var minusBtn = document.getElementById('minus');
    var aantalInput = document.getElementById('aantal');

    // Voeg een eventlistener toe aan de plusknop
    plusBtn.addEventListener('click', function() {
        // Verhoog de waarde van aantal met 1
        aantalInput.value = parseInt(aantalInput.value) + 1;
    });

    // Voeg een eventlistener toe aan de minknop
    minusBtn.addEventListener('click', function() {
        // Verlaag de waarde van aantal met 1, maar niet lager dan 1
        if (parseInt(aantalInput.value) > 1) {
            aantalInput.value = parseInt(aantalInput.value) - 1;
        }
    });

    
});
        
        
        