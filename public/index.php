<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

    case 'confirmation':
        require '../app/views/confirmation.php';
        break;        
            
    case 'contact':
        require '../app/views/contact.php';
        break;

    default:
        echo "Page introuvable";
        break;

    case 'compte':
        require_once '../app/controllers/CompteController.php';
        $controller = new CompteController();
        $controller->afficherCompte();
        break;
        
}
?>
