<?php
require_once __DIR__ . '/../models/Reservation.php';
require_once __DIR__ . '/../models/Soin.php'; // Pour récupérer la liste des soins

class ReservationController {
    private $model;

    public function __construct() {
        $this->model = new Reservation();
    }

    public function reserver() {
        if (!isset($_SESSION['user'])) {
            echo "Vous devez être connecté pour réserver un soin.";
            exit;
        }
    
        $soin_id = null;
        
        if (isset($_GET['soin_id'])) { // Si l'utilisateur arrive depuis un lien avec soin_id
            $soin_id = intval($_GET['soin_id']);
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['soin_id'], $_POST['date'])) {
                $user_id = $_SESSION['user']['id'];
                $soin_id = intval($_POST['soin_id']);
                $date = htmlspecialchars($_POST['date']);
    
                if (strtotime($date) < time()) {
                    echo "La date choisie est invalide.";
                    exit;
                }
    
                if ($this->model->ajouterReservation($user_id, $soin_id, $date)) {
                    header('Location: index.php?page=reservations');
                    exit;
                } else {
                    echo "Erreur lors de la réservation.";
                }
            } else {
                echo "Données manquantes.";
            }
        }
    
        // Charger les soins pour le formulaire de réservation
        $soinModel = new Soin();
        $soins = $soinModel->getAllSoins();
        require_once __DIR__ . '/../views/reservation.php';
    }
}
