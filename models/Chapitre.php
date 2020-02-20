<?php
class Chapitre extends Model{
    
    public function __construct(){
        // Table par défaut du modèle
        $this->table = "chapitres";

        // Connexion à la base de données
        $this->getConnection();
    }

    public function findById(string $id){
        $sql = "SELECT *, DATE_FORMAT(date, '%d/%m/%Y') AS 'date_formater' FROM ".$this->table." WHERE `id`='".$id."'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);  
    }

    /**
     * 
     * Retourne un article en fonction de son slug
     *
     * @param string $slug
     * 
     * @return void
     */
    public function findBySlug(string $slug){
        $sql = "SELECT *, DATE_FORMAT(date, '%d/%m/%Y') AS 'date_formater' FROM ".$this->table." WHERE `slug`='".$slug."'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);  
    }
}