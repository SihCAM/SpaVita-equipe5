
<?php 
require_once 'header.php'; 
?>

<div class="page-banner">
    <div class="page-banner-overlay"></div>
    <div class="container">
        <h2>Nos Soins</h2>
        <p>Découvrez notre collection de soins pour votre bien-être</p>
    </div>
</div>

<nav class="soin-navigation">
    <div class="container">
        <ul class="soin-nav-links">
            <li><a href="#massage">Massages</a></li>
            <li><a href="#visage">Soins du visage</a></li>
            <li><a href="#hammam">Hammam</a></li>
            <li><a href="#jacuzzi">Bains à remous</a></li>
        </ul>
    </div>
</nav>

< class="soins-container">
    <?php if (empty($soins)): ?>
        <p class="no-soins">Aucun soin disponible pour le moment.</p>
    <?php else: ?>
        <div class="soins-grid">
        <?php foreach ($soins as $soin): ?> 
            <section id="<?=strtolower(str_replace(' ', '-', $soin['nom'])) ?>" class="soin-section">
                <div class="soin-card">
                    <div class="soin-card-img">
                        <img src="SpaVita-equipe5/public/assets/images/<?= !empty($soin['image']) ? htmlspecialchars($soin['image']) : 'default.jpg' ?>" alt="?= htmlspecialchars($soin['nom']) ?>
                    </div>
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
        </div>
    <?php endif; ?>
</div>

<?php require_once 'footer.php'; ?>