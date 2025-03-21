
document.addEventListener('DOMContentLoaded', function() {
    console.log("Scripts chargés");

    // Charge le slider des témoignages
    $.getScript("assets/js/animations/slider.js")
        .fail(function() {
            console.error("Erreur lors du chargement du script slider.js");
        });
});

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    if (!calendarEl) {
      console.error("L'élément avec l'ID 'calendar' est introuvable.");
      return;
    }
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'fr',
      selectable: true,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      // Pour charger vos événements via AJAX, vous pouvez ajouter l'option "events"
      events: 'index.php?page=get_reservations',
      select: function(info) {
        console.log("Créneau sélectionné : ", info.startStr);
        // Vous pouvez ajouter ici le code pour afficher le récapitulatif ou activer le bouton de confirmation.
      }
    });
    calendar.render();
  });