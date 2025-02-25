<?php
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

// On inclut le contrôleur correspondant à la page demandée
switch ($page) {
    case 'soins':
        $controller = new SoinController();
        $controller->index();
        break;
    
    case 'reservations':
        $controller = new ReservationController();
        $controller->reserver(); // Appel direct de la méthode reserver()
        break;

    case 'login':
        require '../app/views/login.php';
        break;

    case 'register':
        require '../app/views/register.php';
        break;

    default:
        echo "Page introuvable";
        break;
}

?>
