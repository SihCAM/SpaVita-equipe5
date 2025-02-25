<?php
// Démarrer la session pour récupérer l'utilisateur connecté
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    echo "<p>Vous devez être connecté pour réserver un soin.</p>";
    exit;
}

$soins = $soins ?? []; // Éviter une erreur si `$soins` n'est pas défini
?>

<h2>Réserver un soin</h2>

<form method="POST" action="/reservation/reserver">
    <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">

    <label for="soin_id">Soin :</label>
    <select name="soin_id" id="soin_id" required>
        <?php if (!empty($soins)): ?>
            <?php foreach ($soins as $soin) : ?>
                <option value="<?= $soin['id'] ?>"><?= htmlspecialchars($soin['nom']) ?></option>
            <?php endforeach; ?>
        <?php else: ?>
            <option disabled>Aucun soin disponible</option>
        <?php endif; ?>
    </select>

    <label for="date">Date :</label>
    <input type="datetime-local" name="date" required>

    <button type="submit">Réserver</button>
</form>
