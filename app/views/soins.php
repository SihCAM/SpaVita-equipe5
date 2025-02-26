<?php
require_once 'header.php';
?>

<h1>Nos Soins</h1>

<?php if (empty($soins)): ?>
    <p>Aucun soin disponible pour le moment.</p>
<?php else: ?>
    <ul>
        <?php foreach ($soins as $soin): ?>
            <li>
                <?= htmlspecialchars($soin['nom']) ?> - <?= number_format($soin['prix'], 2) ?>€
                <a href="/reservations?soin_id=<?= $soin['id'] ?>">Réserver</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php
require_once 'footer.php';
?>
