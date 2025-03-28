
<?php 
include '../app/views/header.php';
?>

<!--section contact ds home.php deplacée ici-->

<!--Section Contact-->
<section class="contact" id="contact">
   <div class="container">
        <div class="section-header">
            <h2>Contactez-nous</h2>
            <p>Pour toute question ou pour réserver, n'hesitez pas à nous contacter.</p>
        </div>
    <div class="contact-container">
        <div class="contact-info">
            <div class="info-item">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Adresse</h3>
                <p> 15 Rue du lac <br> 74000 Annecy</p>
            </div>
            <div class="info-item">
            <i class="fas fa-clock"></i>
                <h3>Horaires</h3>
                <p>Lundi - Vendredi : 10h00 -20h00<br>Samedi: 9h00 - 21h00<br>Dimanche: 10h00 - 21h00</p>
            </div>
            <div class="info-item">
                <i class="fas fa-phone-alt"></i>
                <h3>Contact</h3>
                <p> Téléphone: 04 23 45 67 89<br> Email: contact@spavita.fr</p>
            </div>
        </div>
        <div class="contact-form">
            <form action="/contact" method="POST">
                <div class="form-group">
                    <input type="text" id="name" name="name" placeholder="Votre nom" required>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Votre email" required>
                </div>
                <div class="form-group">
                    <input type="tel" id="phone" name="phone" placeholder="Votre téléphone">
                </div>
                <div class="form-group">
                    <textarea name="message" id="message" placeholder="Votre message" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>
</section>

<!-- Carte Google maps-->
<section class="map-section">
    <div class="map-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2776.5518330201976!2d6.124122812073876!3d45.90027580411653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478b8ffa39528785%3A0x6620a871b9437a0f!2s15%20Rue%20du%20Lac%2C%2074000%20Annecy!5e0!3m2!1sen!2sfr!4v1743152273325!5m2!1sen!2sfr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>






<?php 
include '../app/views/footer.php';
?>
