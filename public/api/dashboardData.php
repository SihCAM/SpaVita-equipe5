<?php
require_once __DIR__ . '/../../app/models/Reservation.php';

header('Content-Type: application/json');

$reservationModel = new Reservation ();

$response = [
    'rdvAujourdHui' => $reservationModel ->compterPourAujourdhui(),
    'clientsSemaine' => $reservationModel ->compterPourSemaine(),
    'tauxOccupation' => $reservationModel ->CalculerTauxOccupation(),
    'statsSoins' => $reservationModel ->getStatsSoins(),
];

echo json_encode($response);


//getStats.php renvoi les données pour le scartes statitiques (rdv, taux, etc)
// get SessionsByDay.php renvoi les séances par jour (bar chart)
//getStats.php renvoi les données 