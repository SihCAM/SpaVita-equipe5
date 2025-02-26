<?php
session_start();

// Inclusion des contrôleurs
require_once '../app/controllers/SoinController.php';
require_once '../app/controllers/ReservationController.php';
require_once '../app/controllers/UserController.php';

// Routage simple
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home'; // Par défaut, on affiche la page d'accueil
}

switch ($page) {
    case 'home':
        require '../app/views/home.php';
        break;

    case 'soins':
        $controller = new SoinController();
        $controller->soins();
        break;
    
    case 'reservations':
        $controller = new ReservationController();
        $controller->reserver();
        break;

    case 'login':
        $controller = new UserController();
        $controller->login();
        break;

    case 'register':
        $controller = new UserController();
        $controller->register();
        break;

    case 'logout':
        $controller = new UserController();
        $controller->logout();
        break;

    default:
        echo "Page introuvable";
        break;
}
?>
