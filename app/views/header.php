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
    <title>SpaVita</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"> 
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <!--jquery-->
    <script src="assets/librairies/jquery/jquery.min.js"></script>

    <!--jquery-ui-->
    <link rel="stylesheet" href="assets/librairies/jquery-ui/jquery-ui.min.css">
    <script src="assets/librairies/jquery-ui/jquery-ui.min.js"></script>

    <!--main.js-->
    <script defer src="assets/js/main.js"></script>
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
