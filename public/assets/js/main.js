
document.addEventListener('DOMContentLoaded', function() {
    console.log("Scripts chargés");

    // Charge le slider des témoignages
    $.getScript("assets/js/animations/slider.js")
        .fail(function() {
            console.error("Erreur lors du chargement du script slider.js");
        });
});
