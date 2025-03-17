<?php
// Assure-toi que la session est démarrée dans index.php et que la variable $soins est définie
if (!isset($_SESSION['user'])) {
    echo "<p>Vous devez être connecté pour réserver un soin.</p>";
    exit;
}
?>
<?php require_once 'header.php'; ?>

<h2>Réserver un soin</h2>

<form method="POST" action="index.php?page=reservations">
    <label for="soin_id">Sélectionnez le soin :</label>
    <select name="soin_id" id="soin_id" required>
        <?php if (!empty($soins)): ?>
            <?php foreach ($soins as $soin) : ?>
                <option value="<?= $soin['id'] ?>" <?= isset($_GET['soin_id']) && $_GET['soin_id'] == $soin['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($soin['nom']) ?>
                </option>
            <?php endforeach; ?>
        <?php else: ?>
            <option disabled>Aucun soin disponible</option>
        <?php endif; ?>
    </select>

    <label for="date">Choisissez le créneau horaire :</label>
    <input type="datetime-local" name="date" id="date" required>

    <button type="submit">Réserver</button>
</form>

<?php include 'footer.php'; ?>
