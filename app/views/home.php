
<?php 
include '../app/views/header.php';
?>

<!--Section hero-->
<section class="her" style ="background-image: url ('../public/assets/images/spa-hero.jpg');">
    <div class="hero-content">
        <h1>Bienvenue chez SpaVita</h1>
        <p>Offrez-vous un moment de bien-être et de relaxation</p>
    </div>
</section>

<!--Presentation du spa-->
<section class="presentation">
    <h2>Un havre de paix pour votre bien-être</h2>
    <p>Découvrea un espace dédié à la détente , à la sérénité et au bien-être absolu.</p>
    <div class="presentation-content">
        <img src="/public/assets/images/spa-interieur.jpg" alt="Intérieur du spa">
            <p>SpaVita vous propose une expérience unique avec des soins relaxants, des massages thérapeutiques et des installations haut de gammes</p>
    </div>
</section>

<!--Section nos soins -->
<section class="services">
    <h2>Nos soins</h2>
    <div class="serivce-list">
        <div class="service-item">
            <img src="/public/assets/images/massage.jpg" alt="Massage relaxant">
            <h3>Massage relaxant</h3>
            <p>Un moment de pure détente</p>
        </div>
        <div class="service-item">
            <img src="/public/assets/images/soin-visage.jpg" alt="Soins du visage">
            <h3>Soins du visage</h3>
            <p>Un soin adapté à votre peau</p>
        </div>
        <div class="service-item">
            <img src="/public/assets/images/jacuzzi.jpg" alt="Jaccuzzi">
            <h3>Bains à remous</h3>
            <p>Profitez d'un spa de qualité</p>
        </div>
    </div>
</section>


<!--Section Témoignages -->
<section class="temoignages-List">
    <h2>Ce que disent nos clients</h2>
    <div class="temoignage">
        <p>"Un lieu magique pour se détendre et oublier le stress du quotidien. Une équipe aux petits soins ! "</p>
        <strong> -Sphie L.</strong>
    </div>
    <div class="temoignage">
        <p>"Le meilleur massage que j'ai jamais eu ! Je recommande fortement SpaVita."</p>
        <strong> -Marc D.</strong>
    </div>
</section>

<!--Section Reservation-->
<section class="reservation">
    <h2>Prenez soin de vous</h2>
    <p>Réservez dès maintenant votre moment de détente</p>
    <a href="index.php ?page=reservations" class="btn"> Réserver maintenant</a>    
</section>

<?php include '../app/views/footer.php'; ?>

