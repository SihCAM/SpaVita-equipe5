<?php
if (!isset($_SESSION['user'])) {
    echo "<p>Vous devez être connecté pour réserver un soin.</p>";
    exit;
}
?>

<!--Nathan, A voir si on garde json ou on defini le soin en js (booking.js) ???-->
<?php require_once 'header.php'; ?>
<?php if (isset($soins)) : ?>
<script>
    const soins = <?= json_encode($soins); ?>
</script>
<?php endif; ?>

<!--NOUVELLE VERSION-->

<?php
if (!isset($_SESSION['user'])) {
    echo "<p>Vous devez être connecté pour réserver un soin.</p>";
    exit;
}
?>

<?php require_once 'header.php'; ?>



<main>

    <div class="heading">
            <h1>RESERVER</h1>
            <h2>Vos Soins</h2>
    </div>

<!--Conteneur principal-->
        <div class="container-booking">
            <div class="booking-container">
                <div class="booking-main"> 
                    <!--calendrier-->
                <div 
                class="booking-section" id="calendar-section">

                    <h2>Choissisez une date</h2>

                    <div id="booking-calendar"></div>
                </div>

                <!--Selection du soin-->
                <div class="booking-section" id="selection">
                    <h2>Choissisez vos soins</h2>
                    <div class="form-group">
                        <label for="booking-time">Heure</label>
                        <select id="booking-time" class="input-field" disabled>
                            <option value=" " selected disabled> Selectionnez une heure</option>
                            <option value="10:00">10H00</option>
                            <option value="11:00">11H00</option>
                            <option value="13:00">13H00</option>
                            <option value="14:00">14H00</option>
                            <option value="15:00">15H00</option>
                            <option value="16:00">16H00</option>
                            <option value="17:00">17H00</option>
                            <option value="18:00">18H00</option>
                            <option value="19:00">19H00</option>
                            <option value="20:00">20H00</option>
                        </select>
                    </div>
                <div class="form-group">
                    <label for="soin-select">Soin Souhaité</label>
                    <select id="soin-select" class="input-field" disabled>
                        <option value=" "selected disabled> Selectionnez un soin</option>
                        <!--les soins seront ajoutés en php-->
                    </select>
                </div>
                <div class="form-group">
                    <label for="soin-personne">Nombre de personne</label>
                    <input type="number" id="personne-nombre" class="input field" min="1" max="5" value ="1" disabled>
                </div>

                <button id="add-soin" class="btn-primary" disabled>
                <i class="fas fa-plus"></i> Ajouter ce soin
                </button>
            </div>
        </div>


<!-- Section Recapitulatif de reservation-->

    <div class="booking-recap">
        <div class="booking-section" id="recap">
            <h2>Récapitulatif de votre réservation</h2>

            <div class="recap-item">
                <div class="recap-header">
                    <i class="fas fa-calendar"></i>
                    <span class="span-recap">Date et heure</span>
                </div>
                <div id="recap-datetime" class="recap-content">
                    <p class="empty-message">Aucune date selectionnée</p>
                </div>
            </div>

            <div class="recap-item">
            <div class="recap-header">
                    <i class="fas fa-spa"></i>
                    <span class="span-recap">Soins sélectionnés</span>
                </div>
                <div id="recap-soin" class="recap-content">
                    <p class="empty-message">Aucun soin selectionné</p>
                    <ul id="soin-list"></ul>
                    
                    <div id="total-price" class="recap-total"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="commentaire"> Commentaires ou demandes spéciales</label>
            </div>

            <button id="confirm-booking" class="button-primary button-large" disabled> Confirmer la réservation</button>
            </div>
    </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>