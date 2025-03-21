<?php
if (!isset($_SESSION['user'])) {
    echo "<p>Vous devez être connecté pour réserver un soin.</p>";
    exit;
}
?>

<?php require_once 'header.php'; ?>

<div class="reservation-page">
    <h2>Réserver un soin</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="error-message">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- Sélection du soin -->
    <div class="reservation-details">
        <label for="soin_id">Sélectionnez le soin :</label>
        <select name="soin_id" id="soin_id" required>
            <?php if (!empty($soins)): ?>
                <?php foreach ($soins as $soin): ?>
                    <option value="<?= $soin['id'] ?>"><?= htmlspecialchars($soin['nom']) ?></option>
                <?php endforeach; ?>
            <?php else: ?>
                <option disabled>Aucun soin disponible</option>
            <?php endif; ?>
        </select>
    </div>

    <!-- Calendrier dynamique -->
    <div id="calendar" class="calendar-container"></div>

    <!-- Formulaire de réservation -->
    <div class="reservation-summary">
        <h3>Récapitulatif</h3>
        <p id="recap-soin"></p>
        <p id="recap-date"></p>
        <button id="confirm-button" disabled>Confirmer la réservation</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        let selectedDate = null;
        let selectedSoin = null;

        // Récupérer le soin sélectionné
        $('#soin_id').on('change', function() {
            selectedSoin = $(this).find(':selected').text();
            $('#recap-soin').text("Soin sélectionné : " + selectedSoin);
        });

        // Initialiser le calendrier
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'fr',
            initialView: 'dayGridMonth',
            selectable: true,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: 'index.php?page=get_reservations',  // Chargement dynamique des créneaux
            select: function(info) {
                selectedDate = info.startStr;
                $('#recap-date').text("Date sélectionnée : " + new Date(info.start).toLocaleString());
                $('#confirm-button').prop('disabled', false);
            }
        });
        calendar.render();

        // Confirmation de la réservation
        $('#confirm-button').on('click', function() {
            const soinId = $('#soin_id').val();
            $.ajax({
                url: 'index.php?page=reservations',
                method: 'POST',
                data: {
                    soin_id: soinId,
                    date: selectedDate
                },
                success: function(response) {
                    alert("Réservation confirmée !");
                    calendar.refetchEvents();  // Actualiser les créneaux
                },
                error: function() {
                    alert("Erreur lors de la réservation.");
                }
            });
        });
    });
</script>

<?php include 'footer.php'; ?>
