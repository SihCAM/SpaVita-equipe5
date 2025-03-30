<?php include 'header.php'; ?>

<main class="container">
    <h1>Mon compte</h1>

    <section class="account-info">
        <h2>Mes informations</h2>
        <p><strong>Nom :</strong> <?= htmlspecialchars($_SESSION['user']['name']) ?></p>
        <p><strong>Email :</strong> <?= htmlspecialchars($_SESSION['user']['email']) ?></p>
    </section>

    <section class="account-reservations">
        <h2>Mes réservations</h2>
        <?php if (!empty($reservations)) : ?>
            <ul>
                <?php foreach ($reservations as $reservation) : ?>
                    <li>
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
    </section>
</main>

<?php include 'footer.php'; ?>
