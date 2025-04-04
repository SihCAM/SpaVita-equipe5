<?php
require_once __DIR__ . '/../models/Reservation.php';
require_once __DIR__ . '/../models/Soin.php';
require_once __DIR__ . '/../services/EmailService.php';
use App\Services\EmailService;

class ReservationController {
    private $model;

    public function __construct() {
        $this->model = new Reservation();
    }

    public function reserver() {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Vous devez être connecté pour réserver un soin.";
            header('Location: index.php?page=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['date'], $_POST['soins']) && is_array($_POST['soins'])) {
                $user_id = $_SESSION['user']['id'];
                $date = htmlspecialchars($_POST['date']);
                $soins_ids = array_map('intval', $_POST['soins']);

                if (strtotime($date) < time()) {
                    $_SESSION['error'] = "La date choisie est invalide.";
                    header('Location: index.php?page=reservations');
                    exit;
                }

                if ($this->model->ajouterReservationAvecSoins($user_id, $date, $soins_ids)) {
                    $user_email = $_SESSION['user']['email'];
                    $user_name = $_SESSION['user']['name'];

                    $soinModel = new Soin();
                    $soinsDetails = [];

                    foreach ($soins_ids as $id) {
                        $soinsDetails[] = $soinModel->getSoinById($id);
                    }

                    // Construction HTML du tableau des soins
                    $soinHtml = '';
                    foreach ($soinsDetails as $soin) {
                        $soinHtml .= "<li>
                            <strong>{$soin['nom']}</strong> - {$soin['duree']} min - {$soin['prix']} €
                        </li>";
                    }

                    // Message de l'email
                    $subject = "Confirmation de votre réservation SpaVita";
                    $message = "
                    <html>
                    <head>
                        <meta charset='UTF-8'>
                        <style>
                            body {
                                font-family: 'Lato', sans-serif;
                                background-color: #F2F4F3; /* Fond clair SpaVita */
                                margin: 0;
                                padding: 0;
                            }

                            .container {
                                background-color: #fff;
                                border-radius: 4px;
                                max-width: 600px;
                                margin: 40px auto;
                                padding: 30px;
                                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15); /* Ombre douce */
                            }

                            .header {
                                text-align: center;
                                color: #5E503F; /* Couleur secondaire SpaVita */
                                font-family: 'Playfair Display', serif;
                            }

                            .title {
                                font-size: 26px;
                                margin-bottom: 20px;
                                font-family: 'Playfair Display', serif;
                            }

                            .details {
                                font-size: 16px;
                                color: #22333B; /* Texte principal sombre */
                                margin-bottom: 15px;
                            }

                            .footer {
                                margin-top: 30px;
                                font-size: 13px;
                                color: #CCCCCC;
                                text-align: center;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='container'>
                            <div class='header'>
                                <h1>SpaVita</h1>
                                <p class='title'>Confirmation de votre réservation</p>
                            </div>
                            <div class='details'>
                                Bonjour <strong>{$user_name}</strong>,<br><br>
                                Nous vous confirmons la réservation suivante :<br>
                                <strong>Date :</strong> {$date}<br><br>
                                <ul>{$soinHtml}</ul>
                                Nous avons hâte de vous accueillir pour un moment de bien-être.
                            </div>
                            <div class='footer'>
                                &copy; " . date('Y') . " SpaVita - Beauté & Soin
                            </div>
                        </div>
                    </body>
                    </html>
                    ";

                    // Envoi de l’e-mail
                    EmailService::envoyerEmail($user_email, $subject, $message);

                    // Si requête AJAX (fetch / JS), retour JSON
                    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                        echo 'ok';
                        exit;
                    } else {
                        header('Location: index.php?page=confirmation');
                        exit;
                    }
                } else {
                    $_SESSION['error'] = "Erreur lors de la réservation.";
                }
            } else {
                $_SESSION['error'] = "Données manquantes.";
            }
        }

        $soinModel = new Soin();
        $soins = $soinModel->getAllSoins();
        require_once __DIR__ . '/../views/reservation.php';
    }
}