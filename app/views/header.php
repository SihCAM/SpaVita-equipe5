<?php
// Vérifier l'heure actuelle
$hour = date('H'); // Obtenir l'heure actuelle (format 24h)
if ($hour >= 18) {
    $greeting = "Bonsoir";
} else {
    $greeting = "Bonjour";
}

// Vérifier si la session est déjà démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Affichage du message d'erreur stocké dans la session
if (isset($_SESSION['error'])): ?>
    <div style="color: red; padding: 10px; margin: 10px; border: 1px solid red; background-color: #ffe6e6;">
        <?= htmlspecialchars($_SESSION['error']); ?>
    </div>
    <?php unset($_SESSION['error']); // Supprime l'erreur après affichage ?>
<?php endif; 
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SpaVita - Réservez facilement vos soins bien-être dans notre spa moderne. Massages, soins du visage et rituels relaxants.">
    <meta name="keywords" content="Spa, bien-être, massage, soin visage, hammam, réservation en ligne">
    <meta name="author" content="SpaVita Équipe 5">

    <title>SpaVita - Beauté & Soin</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) ? '/' : '/SpaVita/' ?>assets/images/favicon.ico">

    <!-- Préconnexion pour Google Fonts (performance) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <?php
    $base = (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) ? '/' : '/SpaVita/';
    ?>

    <!-- CSS -->
    <link rel="stylesheet" href="<?= $base ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>assets/css/custom.css">
    <link rel="stylesheet" href="<?= $base ?>assets/librairies/jquery-ui/jquery-ui.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- JS (jQuery & jQuery UI) -->
    <script src="<?= $base ?>assets/librairies/jquery/jquery.min.js"></script>
    <script src="<?= $base ?>assets/librairies/jquery-ui/jquery-ui.min.js"></script>

    <!-- JS principal -->
    <script defer src="<?= $base ?>assets/js/main.js"></script>
</head>
<body>


    <header>
        <div>
            <a href="index.php?page=home">
                <img src="assets/images/logo.png" alt="Logo SpaVita" class="logo">
            </a>
        </div>
        
        <nav>
            <!-- Partie gauche (centrée dans le header) -->
            <div class="left-menu">
                <ul>
                    <li><a href="index.php?page=home">Accueil</a></li>
                    <li><a href="index.php?page=soins">Nos Soins</a></li>
                    <li><a href="index.php?page=reservations">Réservations</a></li>
                    <li><a href="index.php?page=contact">Contact</a></li>
                </ul>
            </div>

            <!-- Partie droite (alignée sur la droite) -->
            <div class="right-menu">
                <ul>
                    <?php if (isset($_SESSION['user'])): ?>
                        <li><?= $greeting ?>, <?= htmlspecialchars($_SESSION['user']['name']) ?></li>
                        <li><a href="index.php?page=logout">Se déconnecter</a></li>
                    <?php else: ?>
                        <li><a href="index.php?page=login">Se connecter</a></li>
                        <li><a href="index.php?page=register">S'inscrire</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>


    </header>
