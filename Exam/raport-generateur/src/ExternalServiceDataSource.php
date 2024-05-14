<?php

class ExternalServiceDataSource extends DataSource {
    public function fetchData() {
        echo "Récupération des données du service de billetterie externe pour les billets en cours...\n";
        
        return [
            ['Ticket ID' => 1, 'Status' => 'Open', 'Description' => 'Mdp oublie'],
            ['Ticket ID' => 2, 'Status' => 'Open', 'Description' => 'Port bloqué'],
            ['Ticket ID' => 3, 'Status' => 'Open', 'Description' => 'Error 500 apres validation du panier'],
            ['Ticket ID' => 4, 'Status' => 'Open', 'Description' => 'Impossible de se connecter au compte client'],
            ['Ticket ID' => 5, 'Status' => 'Open', 'Description' => 'Erreur de paiement'],
        ];
    }
}
