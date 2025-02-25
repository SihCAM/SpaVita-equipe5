<?php
require_once '../config/config.php';

class Reservation {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function ajouterReservation($user_id, $soin_id, $date) {
        $stmt = $this->pdo->prepare("INSERT INTO reservations (user_id, soin_id, date_reservation, statut) VALUES (?, ?, ?, 'confirmé')");
        return $stmt->execute([$user_id, $soin_id, $date]);
    }

    public function getReservationsByUser($user_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM reservations WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
