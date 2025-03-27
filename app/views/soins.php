

<?php 
require_once 'header.php'; 

// Regrouper les soins par categorie//
$soinsParCategorie = [];
foreach ($soins as $soin) {
    $categorie = $soin['categorie'];
    if (!isset($soinsParCategorie[$categorie])) {
        $soinsParCategorie[$categorie] = [];
}
$soinsParCategorie[$categorie] [] =$soin;
}
?>






<!--Section Soins-->
<div class="heading">
            <h1>PARCOURIR</h1>
            <h2>Nos Soins</h2>
</div>
<nav class="soin-navigation">
        <ul class="soin-nav-links">
            <li><a href="#massage" class="cat-link"><i class="fas fa-spa"></i><span>Massage</span></a></li>
            <li><a href="#soin_visage" class="cat-link"><i class="fas fa-smile"></i><span>Visage</span></a></li>
            <li><a href="#soin_du_corp" class="cat-link"><i class="fas fa-user-circle"></i><span>Corps</span></a></li>
            <li><a href="#hammam" class="cat-link"><i class="fas fa-water"></i><span>Hammam</span></a></li>
            <li><a href="#jacuzzi" class="cat-link"><i class="fas fa-hot-tub"></i><span>Jacuzzi</span></a></li>
            <li><a href="#hydrotherapie" class="cat-link"><i class="fas fa-bath"></i><span>Hydrothérapie</span></a></li>
        </ul>
</nav>


<div class="soins-decouverte-container">
    <?php if (empty($soinsParCategorie)): ?>
        <p class="no-soins">Aucun soin disponible pour le moment.</p>
    <?php else: ?>
        
        <?php foreach ($soinsParCategorie as $categorie => $soinsDeCetteCategorie): ?> 
            <section id="<?= strtolower(str_replace(' ', '_', $categorie)) ?>" class="categorie-section">
            <h2 class="categorie-title"><?= htmlspecialchars($categorie) ?></h2>


            <div class="categorie-soins-grid">
                <?php foreach ($soinsDeCetteCategorie as $soin): ?>

                <div class="soin-card">
                    <!-- Image du soin -->
                    <div class="soin-card-img">
                        <img src="assets/images/<?= !empty($soin['image']) ? htmlspecialchars($soin['image']) : 'default.jpg' ?>" alt="<?= htmlspecialchars($soin['nom']) ?>">
                        <!--Overlay-->
                        <div class="soin-overlay">
                            <span class="soin-decouvrir">Découvrir</span>
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
                            <a href="index.php?page=reservations&soin_id=<?= $soin['id'] ?>" class="btn btn-primary">Réserver</a>
                         </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<section class="offre-mois"id="offre-mois">
    <div class="offre-container">
        <h2>Profitez de l'offre du mois</h2>
        <p>Un soin visage complet + Massage relaxant à 
            <span class="shine-text"> -30%</span></p>
        <a href="index.php?page=reservations" class="btn-offre"> J'en profite</a>
    </div>
</section>


<?php require_once 'footer.php'; ?>
