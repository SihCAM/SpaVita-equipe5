
<?php 
require_once 'header.php'; 
?>

<div class="container-soin-hero">
    
    <div class="spa-banner-soin">
        <div class="main-soin-image-section">
            
            <div class="discount-container">
                <div class="discount-box">
                    <span class="discount-pourcentage">-30%</span>
                    <span class="discount-text">OFF</span>
                 <div class="discount-support"></div>   
                </div>
            </div>
        
    </div>

        <!--Contenu de la bannière-->
        <div class="soin-banner-content">
                <h2 class="main-soin-title">Rechargez votre énergie</h2>
                <div class="subtitle-line"></div>
                <p class="subtitle">TRAITEMENT EXCLUSIF</p>
                <div class="subtitle-line"></div>
        </div>
    </div>
            <!--Conteneur des images de services-->
            <div class="soins-service-container">
                <div class="service-soin-images">
                    <div class="service-soin-image">
                        <img src="../public/assets/images/service1.jpg" alt="Massage relaxant">
                    </div>      
                </div>
                    <div class="service-soin-image">
                        <img src="../public/assets/images/service2.jpg" alt="Massage relaxant">
                    </div>
                    <div class="service-soin-image">
                        <img src="../public/assets/images/service3.jpg" alt="Massage relaxant">
                    </div>
                </div>
    <div class="hero-soins-info">
        <div class="hero-text-soin">
             <p>Offrez-vous une parenthèse de sérénité et laissez-vous envelopper par nos soins apaisants. Une expérience de bien-être ultime vous attend.</p>
        </div>
         <div class="contact-soin-item">
            <i class="fas fa-phone-alt"></i> 
            <h3>Service client</h3>
                 <span>Besoin d'aide pour choisir un soin ? Contactez notre équipe au<strong> 04 23 45 67 89</strong></span>
        </div>
    </div>
    
    </div>
   
    
    
            

<!--Section Soins-->
<div class="heading">
            <h1>PARCOURIR</h1>
            <h2>Nos Soins</h2>
</div>

  
</div>


<nav class="soin-navigation">
    <div class="container-soin-nav-hero">
        <ul class="soin-nav-links">
            <li><a href="#massage">Massages</a></li>
            <li><a href="#visage">Soins du visage</a></li>
            <li><a href="#hammam">Hammam</a></li>
            <li><a href="#jacuzzi">Bains à remous</a></li>
            <li><a href="#outdoor">Bains extérieurs</a></li>
        </ul>
    </div>
</nav>

<div class="soins-decouverte-container">
    <?php if (empty($soins)): ?>
        <p class="no-soins">Aucun soin disponible pour le moment.</p>
    <?php else: ?>
        
        <?php foreach ($soins as $soin): ?> 
            <section class="soin-section">
                <div class="soin-card">
                    <!-- Image du soin -->
                    <div class="soin-card-img">
                        <img src="../public/assets/images/<?= !empty($soin['image']) ? htmlspecialchars($soin['image']) : 'default.jpg' ?>" alt="<?= htmlspecialchars($soin['nom']) ?>">
                        <!--Overlay-->
                        <div class="soin-overlay">
                            <span>Découvrir</span>
                        </div>
                    </div>
                    <div class="soin-card-content">
                        <h3><?= htmlspecialchars($soin['nom']) ?></h3>
                        <div class="soin-details">
                            <span><i class="fas fa-clock"></i> <?= htmlspecialchars($soin['duree']) ?> minutes</span>
                            <span class="soin-price"><?= number_format($soin['prix'], 2) ?>€</span>
                        </div>
                        <p><?= htmlspecialchars($soin['description']) ?></p>
                        
                         <div class="soin-action">
                            <a href="/SpaVita-equipe5/public/?page=reservations&soin_id=<?= $soin['id'] ?>" class="btn btn-primary">Réserver</a>
                         </div>
                        </div>
                    </div>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php require_once 'footer.php'; ?>