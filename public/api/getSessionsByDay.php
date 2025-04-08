<?php
require_once __DIR__ . '/../../app/models/Reservation.php';

header('Content-Type: application/json');

$reservationModel = new Reservation ();
$sessions = $reservationModel ->getSessionsByDay();

echo json_encode($sessions);
