<?php
require_once __DIR__ . '/../../config/config.php'; // lien bdd obligatoire

class Reservation {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function ajouterReservationAvecSoins($user_id, $date, $soins) {
        $this->pdo->beginTransaction();
    
        try {
            $stmt = $this->pdo->prepare("INSERT INTO reservations (user_id, date_reservation, statut) VALUES (?, ?, 'confirmé')");
            $stmt->execute([$user_id, $date]);
    
            $reservation_id = $this->pdo->lastInsertId();
    
            $stmtSoin = $this->pdo->prepare("INSERT INTO reservation_soins (reservation_id, soin_id) VALUES (?, ?)");
    
            foreach ($soins as $soin_id) {
                $stmtSoin->execute([$reservation_id, $soin_id]);
            }
    
            $this->pdo->commit();
            return true;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            return false;
        }
    }    

    public function getReservationsByUser($user_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM reservations WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}