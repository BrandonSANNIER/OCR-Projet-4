<?php
class Comment extends Model{
    
    public function __construct(){
        // Table par défaut du modèle
        $this->table = "comments";

        // Connexion à la base de données
        $this->getConnection();
    }

    function addComment($datas){
        $first_name = htmlspecialchars($datas['first_name']);
        $last_name = htmlspecialchars($datas['last_name']);
        $comment = htmlspecialchars($datas['comment']);
        $chapitre_id = htmlspecialchars($datas['id_chapt']);
        $ins = $this->_connexion->query("INSERT INTO comments (`id`, `chapitre_id`, `first_name`, `last_name`, `comment`) 
        VALUES (null, '".$chapitre_id."', '".$first_name."', '".$last_name."', '".$comment."')");
    }
    
    /**
     * Cette méthode récupére les commentaires
     *
     * @return void
     */
    function getComments($id){
        $sql = "SELECT * FROM ".$this->table." WHERE chapitre_id='".$id."' ORDER BY $id DESC";
        $query = $this->_connexion->query($sql);
        $arrayComments = array();
        while($test = $query->fetch(PDO::FETCH_ASSOC))
        {
            array_push($arrayComments, array('data' => ((array)$test)));
        }
        return $arrayComments; 
    }
} 