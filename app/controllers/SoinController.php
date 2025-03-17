<?php
require_once __DIR__ . '/../models/Soin.php';

class SoinController {
    private $model;

    public function __construct() {
        $this->model = new Soin();
    }

    public function soins() {
        $limit = 10; // Nombre d'éléments par page

        // Récupérer le numéro de page pour la pagination avec le paramètre "p"
        $page = isset($_GET['p']) && is_numeric($_GET['p']) && $_GET['p'] > 0 ? (int)$_GET['p'] : 1;
        $offset = ($page - 1) * $limit; // Calculer l'offset

        // Récupérer les soins avec pagination
        $soins = $this->model->getAllSoins($limit, $offset);

        // Calculer le nombre total de soins pour la pagination
        $totalServices = count($this->model->getAllSoins());
        $totalPages = ceil($totalServices / $limit);

        if (!$soins) {
            echo "Aucun soin trouvé.";
            exit;
        }

        require_once __DIR__ . '/../views/soins.php'; // Passer totalPages à la vue
        $data = [
            'soins' => $soins,
            'totalPages' => $totalPages
        ];
    }
}
