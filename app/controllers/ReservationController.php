<?php
require_once __DIR__ . '/../models/Reservation.php';
require_once __DIR__ . '/../models/Soin.php';

class ReservationController {
    private $model;

    public function __construct() {
        $this->model = new Reservation();
    }

    public function reserver() {
        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            echo "Vous devez être connecté pour réserver un soin.";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['soin_id'], $_POST['date'])) {
                $user_id = $_SESSION['user']['id']; // Récupération de l'ID utilisateur depuis la session
                $soin_id = intval($_POST['soin_id']);
                $date = htmlspecialchars($_POST['date']);

                // Vérifier que la date est valide et future
                if (strtotime($date) < time()) {
                    echo "La date choisie est invalide.";
                    exit;
                }

                if ($this->model->ajouterReservation($user_id, $soin_id, $date)) {
                    header('Location: /reservations'); // Redirection après succès
                    exit;
                } else {
                    echo "Erreur lors de la réservation.";
                }
            } else {
                echo "Données manquantes.";
            }
        } else {
            // En cas de requête GET, on prépare la liste des soins pour le formulaire
            $soinModel = new Soin();
            $soins = $soinModel->getAllSoins();
        }

        require_once __DIR__ . '/../views/reservation.php';
    }
}
?>
