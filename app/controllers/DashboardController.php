<?php
require_once __DIR__ . '/../models/Employe.php';
require_once __DIR__ . '/../models/Soin.php';
require_once __DIR__ . '/../models/Reservation.php';

/*var_dump($_SESSION['user']);
die();*/

class DashboardController {
    public function afficherDashboard() {
        if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['role'],['admin','employe'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $reservationModel = new Reservation();
        $soinModel = new soin();
        //recuperation des infos de l'employé connecté
        $employe = Employe::getByUserId($_SESSION['user']['id']);

        //statistiques generales pr le dashboard
        
        $nbRdvAujourdHui = $reservationModel->compterPourAujourdhui();
        $nbClientSemaine = $reservationModel->compterPourSemaine();
        $nbtauxOccupation = $reservationModel->calculerTauxOccupation();
        $soinsSoins = $reservationModel->getStatsSoins(); // Avec chart.js

             

        require __DIR__ . '/../views/dashboard.php';
    }
}
