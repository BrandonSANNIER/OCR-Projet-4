<?php
class Roman extends Model{
    
    public function __construct(){
        // Table par défaut du modèle
        $this->table = "romans";

        // Connexion à la base de données
        $this->getConnection();
    }
}