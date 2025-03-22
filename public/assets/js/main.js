
document.addEventListener('DOMContentLoaded', function() {
    console.log("Scripts chargés");

    // Charge le slider des témoignages
    $.getScript("assets/js/animations/slider.js")
        .fail(function() {
            console.error("Erreur lors du chargement du script slider.js");
        });


        // Charger les fonctions du calendirer 'le fichier booking.js
    $.getScript("assets/js/animations/booking.js")
    .fail(function() {
        console.error("Erreur lors du chargement du script booking.js");
    });

});