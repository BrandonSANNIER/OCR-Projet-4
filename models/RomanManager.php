<?php
class RomanManager extends Model{
    
    public function __construct(){
        // Table par défaut du modèle
        $this->table = "romans";

        // Connexion à la base de données
        $this->getConnection();
    }

    /**
     * Retourne un roman en fonction de son id
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function findById(string $id){
        $sql = "SELECT * FROM ".$this->table." WHERE `id`='".$id."'";
        $query = $this->_connexion->prepare($sql);
        $query->execute(); 
    }
    
    /**
     * Cette méthode permet d"ajouter un roman
     *
     * @param  mixed $title
     * @param  mixed $resum
     * @param  mixed $src
     * @return void
     */
    public function addRoman($title, $resum, $src){
        try{
            $title = htmlspecialchars($title);

            $resum = htmlspecialchars($resum);

            $src = htmlspecialchars($src);

            $result = $this->_connexion->prepare("
                INSERT INTO ".$this->table." (title, resum, src) 
                VALUES (:title, :resum, :src)
                ");
            $result->execute(array(
                ':title' => $title,
                ':resum' => $resum,
                ':src' => $resum
            ));
        }catch (PDOException $Exception){
            var_dump($Exception);
        }
    }
        
    /**
     * Cette méthode permet d"editer un roman
     *
     * @param  mixed $id
     * @param  mixed $title
     * @param  mixed $resum
     * @param  mixed $src
     * @return void
     */
    public function editRoman($id, $title, $resum, $src){
        try{
            $title = htmlspecialchars($title);

            $resum = htmlspecialchars($resum);

            $src = htmlspecialchars($src);

            $result = $this->_connexion->prepare("
                UPDATE ".$this->table." 
                SET title = :title, resum = :resum, src = :src
                WHERE id = '".$id."'
                ");
                $result->execute(array(
                    ':title' => $title,
                    ':resum' => $resum,
                    ':src' => $resum
                ));
        }
        catch (PDOException $Exception){
            var_dump($Exception);
        }
    }

    /**
     * Cette méthode permet de supprimer un roman
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteRoman($id){
        $sql = "DELETE FROM ".$this->table." WHERE `id`='".$id."'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
    }
}