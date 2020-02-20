<?php
class Chapitre extends Model{
    
    public function __construct(){
        // Table par défaut du modèle
        $this->table = "chapitres";

        // Connexion à la base de données
        $this->getConnection();
    }

    /**
     * Retourne un article en fonction de son slug
     *
     * @param string $slug
     * 
     * @return void
     */
    public function findBySlug(string $slug, $id){
        $sql = "SELECT *, DATE_FORMAT(date, '%d %M, %Y') AS 'date_formater' FROM ".$this->table." WHERE `slug`='".$slug."' AND `id`='".$id."'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);  
    }
}