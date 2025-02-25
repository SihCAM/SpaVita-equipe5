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
    $page = 'soins'; // Par défaut, on affiche les soins
}

switch ($page) {
    case 'soins':
        $controller = new SoinController();
        $controller->index();
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

    default:
        echo "Page introuvable";
        break;
}
?>
