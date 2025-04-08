
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


    // Lancer les graphiques si on  est sur la page dahsboard

    if(window.location.href.includes("page=dashboard")) {
        $getScript("assets/js/dashboard.js")
        .done(function() {
            console.log("dashboard.js chargé");
        })
        .fail(function() {
            console.errir("Erreur lors du chargement de dashboard.js");
        });
    }

});