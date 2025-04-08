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

    public function getSoinsByReservation($reservation_id) {
        $stmt = $this->pdo->prepare("
            SELECT s.nom, s.prix, s.duree
            FROM reservation_soins rs
            JOIN soins s ON rs.soin_id = s.id
            WHERE rs.reservation_id = ?
        ");
        $stmt->execute([$reservation_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Methodes pour le dashboard

    public function compterPourAujourdhui() {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM reservations WHERE DATE(date_reservation) = CURDATE()");
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    
    public function compterPourSemaine() {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM reservations WHERE WEEK(date_reservation, 1) = WEEK(CURDATE(), 1)");
        $stmt->execute();
        return $stmt->fetchColumn();
    }


    public function calculerTauxOccupation() {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as total FROM reservations WHERE DATE(date_reservation) = CURDATE()");
        $stmt->execute();
        $total = $stmt->fetchColumn();

        $capaciteMax = 80; 
        return round(($total / $capaciteMax) * 100, 1);
    }


    public function getStatsSoins() {
        $pdo = $this->pdo;

        $sql = "
        SELECT s.categorie, COUNT(*) AS total
            FROM reservation_soins rs
            JOIN soins s ON rs.soin_id = s.id
            JOIN reservations r ON rs.reservation_id = r.id
            WHERE r.statut ='confirme'
            GROUP BY s.categorie
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results =$stmt->fetchAll(PDO::FETCH_ASSOC);

        $stats =[];
        foreach ($results as $row) {
            $stats[$row['categorie']] = (int)$row['total'];
        } 
        return $stats; 
    }


     public function getSessionsByDay() {

        $stmt = $this->pdo->prepare("
            SELECT 
                DAYNAME(date_reservation) AS jour,
                COUNT(*) AS total
            FROM reservations
            WHERE WEEK(date_reservation, 1) =WEEK(CURDATE(), 1)
            AND statut ='confirme'
            GROUP By jour
        ");
        $stmt->execute();
        $results =$stmt->fetchAll(PDO::FETCH_ASSOC);

        // Gestion l'ordre des jours
        $joursOrdre =['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday','Sunday'];
        $joursFr =[
            'Monday' => 'Lundi',
            'Tuesday' => 'Mardi',
            'Wednesday' => 'Mercredi',
            'Thursday' => 'Jeudi',
            'Friday' => 'Vendredi',
            'Saturday' => 'Samedi',
            'Sunday' => 'Dimanche',
        ];

        //Initialisaiton des valeurs 
        $data =[];
        foreach ($joursOrdre as $day) {
            $data[$joursFr[$day]] = 0;
        }

        foreach ($results as $row) {
            $jourEN = $row['jour'];
            $jourFR = $joursFr[$jourEN] ?? $jourEN;
            $data[$jourFR] = (int)$row['total'];
        }
        return $data;
    }   

    //planing
    public function getPlanningByDay() {

        $stmt = $this->pdo->prepare("
            SELECT 
                s.nom AS soin,
                r.date_reservation,
                u.name AS client
            FROM reservations r
            JOIN reservation_soins rs ON r.id =rs.reservation_id
            JOIN soins s ON rs.soin_id =s.id
            JOIN users u ON r.user_id = u.id
            WHERE r.statut ='confirme'
        ");
        $stmt->execute();
        $results =$stmt->fetchAll(PDO::FETCH_ASSOC);

        $jours = [
            'Monday' => 'Lundi',
            'Tuesday' => 'Mardi',
            'Wednesday' => 'Mercredi',
            'Thursday' => 'Jeudi',
            'Friday' => 'Vendredi',
            'Saturday' => 'Samedi',
            'Sunday' => 'Dimanche',
        ];

        //Initialisaiton des valeurs 
        $planning =[];
        foreach ($results as $row) {
            $jour = $jours[date('l', strtotime($row['date_reservation']))];
            $planning[$jour][] = $row['soin'] . " - " . $row['client'];
        }
        return $planning;
}





}