<?php
class Comment extends Model{
    
    public function __construct(){
        // Table par défaut du modèle
        $this->table = "comments";

        // Connexion à la base de données
        $this->getConnection();
    }
    
    /**
     * Cette méthode récupére les commentaires
     *
     * @return void
     */
    function getComments($id){
        $sql = "SELECT * FROM '".$this->table."' WHERE chapitre_id = '".$id."'  ORDER BY comment_date DESC";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC); 
    }
    
    /**
     * Cette méthode permmet de poster un commentaire
     *
     * @param  mixed $chapitre_id
     * @param  mixed $first_name
     * @param  mixed $last_name
     * @param  mixed $comment
     *
     * @return void
     */
    /* function addComment($chapitre_id, $first_name, $last_name, $comment){
        $sql = 'INSERT INTO comments(chapitre_id, first_name, last_name, comment) VALUES(?, ?, ?, ?)';
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC); 
    } */
} 