<?php
require_once __DIR__ . '/../../app/models/Reservation.php';

header('Content-Type: application/json');

$reservationModel = new Reservation ();
$planning = $reservationModel ->getPlanningByDay();

echo json_encode($planning);
