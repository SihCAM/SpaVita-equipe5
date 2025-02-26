<?php
// Vérifier l'heure actuelle
$hour = date('H'); // Obtenir l'heure actuelle (format 24h)
if ($hour >= 18) {
    $greeting = "Bonsoir";
} else {
    $greeting = "Bonjour";
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaVita</title>
    <link rel="stylesheet" href="/public/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Bienvenue sur SpaVita</h1>
        <nav>
            <ul>
                <li><a href="/SpaVita-equipe5/public/?page=home">Accueil</a></li>
                <li><a href="/SpaVita-equipe5/public/?page=soins">Nos Soins</a></li>
                <li><a href="/SpaVita-equipe5/public/?page=reservations">Réservations</a></li>
            <?php if (isset($_SESSION['user'])): ?>
                <li> <?= $greeting ?>, <?= htmlspecialchars($_SESSION['user']['name']) ?> </li>
                <li><a href="/SpaVita-equipe5/public/?page=logout">Se déconnecter</a></li>
            <?php else: ?>
                <li><a href="/SpaVita-equipe5/public/?page=login">Se connecter</a></li>
                <li><a href="/SpaVita-equipe5/public/?page=register">S'inscrire</a></li>
            <?php endif; ?>
            </ul>
        </nav>
    </header>