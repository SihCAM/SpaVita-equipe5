<?php include 'header.php'; ?>

<main>
    <h1 style="text-align: center;">Mon compte</h1>

    <div class="compte-wrapper">
        <div class="compte-card">
            <div class="avatar"><i class="fas fa-user-circle"></i></div>
            <p><strong>Nom :</strong> <?= htmlspecialchars($_SESSION['user']['name']) ?></p>
            <p><strong>Email :</strong> <?= htmlspecialchars($_SESSION['user']['email']) ?></p>
        </div>

        <div class="compte-card">
            <h2>Mes réservations</h2>
            <?php if (!empty($reservations)) : ?>
                <ul>
                    <?php foreach ($reservations as $reservation) : ?>
                        <li style="margin-bottom: 15px;">
                            <strong>Date :</strong> <?= $reservation['date_reservation'] ?><br>
                            <strong>Soins :</strong>
                            <ul>
                                <?php foreach ($reservation['soins'] as $soin) : ?>
                                    <li><?= $soin['nom'] ?> (<?= $soin['duree'] ?> min - <?= $soin['prix'] ?> €)</li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p>Aucune réservation enregistrée.</p>
            <?php endif; ?>
        </div>
    </div>
</main>


<?php include 'footer.php'; ?>
