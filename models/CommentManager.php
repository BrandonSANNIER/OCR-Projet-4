<?php
class CommentManager extends Model{
    
    public function __construct(){
        // Table par défaut du modèle
        $this->table = "comments";

        // Connexion à la base de données
        $this->getConnection();
    }

    /**
     * Cette méthode permet d'ajouter un commentaire
     *
     * @param  mixed $datas
     *
     * @return void
     */
    public function addComment($datas){
        $chapitre_id = htmlspecialchars($datas['id_chapt']);
        $first_name = htmlspecialchars($datas['first_name']);
        $last_name = htmlspecialchars($datas['last_name']);
        $comment = htmlspecialchars($datas['comment']);
        $ins = $this->_connexion->query("INSERT INTO ".$this->table." (`id`, `chapitre_id`, `first_name`, `last_name`, `comment`) 
        VALUES (null, '".$chapitre_id."', '".$first_name."', '".$last_name."', '".$comment."')");
    }
    
    /**
     * Cette méthode permet de récupére les commentaires du chapitre
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function getComments($id){
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