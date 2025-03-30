<?php
require_once __DIR__ . '/../models/Reservation.php';
require_once __DIR__ . '/../models/Soin.php';

class CompteController {
    public function afficherCompte() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $user_id = $_SESSION['user']['id'];
        $reservationModel = new Reservation();
        $soinModel = new Soin();

        $reservations = $reservationModel->getReservationsByUser($user_id);

        // Ajouter les soins à chaque réservation
        foreach ($reservations as $index => $reservation) {
            $reservations[$index]['soins'] = $reservationModel->getSoinsByReservation($reservation['id']);
        }        

        require __DIR__ . '/../views/compte.php';
    }
}
