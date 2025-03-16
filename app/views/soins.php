
<?php 
require_once 'header.php'; 
?>

<div class="page-banner">
    <div class="page-banner-overlay"></div>
    <div class="container">
        <div class="page-banner-content">
            <div class="banner-text">
                <h2>Rechargez votre énergie</h2>
            <p>Offrez-vous une parenthèse de sérénité et laissez-vous envelopper par nos soins apaisants. Une expérience de bien-être ultime vous attend.</p>

            <ul class="banner-list">

                <li><i class="fas fa-leaf"></i> Massages relaxants</li>
                <li><i class="fas fa-leaf"></i> Soins du visage</li>
                <li><i class="fas fa-leaf"></i> Hammam & Sauna</li>
                <li><i class="fas fa-leaf"></i> Bains à remous</li>
                <li><i class="fas fa-leaf"></i> Bains extérieurs</li>
            </ul>

            <div class="customer-service">
                <i class="fas fa-phone-alt"></i>
                <div>
                    <h3>Service client</h3>
                    <p>Besoin d'aide pour choisir un soin ? Contactez notre équipe au 04 23 45 67 89</p>
                </div>
            </div>

            <div class="banner-images">
                <img src="../public/assets/images/banner1.jpg" alt="Soin massage bannière">
                <img src="../public/assets/images/banner2.jpg" alt="Soin visage bannière">
            </div>
        </div>
    </div>
</div>
        <h2>Nos Soins</h2>
        <p>Découvrez notre collection de soins pour votre bien-être</p>
  
</div>

<nav class="soin-navigation">
    <div class="container">
        <ul class="soin-nav-links">
            <li><a href="#massage">Massages</a></li>
            <li><a href="#visage">Soins du visage</a></li>
            <li><a href="#hammam">Hammam</a></li>
            <li><a href="#jacuzzi">Bains à remous</a></li>
            <li><a href="#outdoor">Bains extérieurs</a></li>
        </ul>
    </div>
</nav>

<div class="soins-container">
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