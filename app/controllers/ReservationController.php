<?php
require_once __DIR__ . '/../models/Reservation.php';


class ReservationController {
    private $model;

    public function __construct() {
        $this->model = new Reservation();
    }

    public function reserver() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['user_id'], $_POST['soin_id'], $_POST['date'])) {
                $user_id = intval($_POST['user_id']);
                $soin_id = intval($_POST['soin_id']);
                $date = htmlspecialchars($_POST['date']);
    
                if ($this->model->ajouterReservation($user_id, $soin_id, $date)) {
                    header('Location: /reservations'); // Redirection vers la liste des réservations
                    exit;
                } else {
                    echo "Erreur lors de la réservation.";
                }
            } else {
                echo "Données manquantes.";
            }
        }
        require_once __DIR__ . '/../views/reservation.php';
    }
    
}
?>
