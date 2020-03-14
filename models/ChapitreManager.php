<?php
class ChapitreManager extends Model{
    
    public function __construct(){
        // Table par défaut du modèle
        $this->table = "chapitres";

        // Connexion à la base de données
        $this->getConnection();
    }

    /**
     * Retourne un chapitre en fonction de son id
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function findById(string $id){
        $sql = "SELECT * FROM ".$this->table." WHERE `id`='".$id."'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);  
    }

    /**
     * 
     * Retourne un chapitre en fonction de son slug
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

    /**
     * Récupére un chapitre en fonction de son id
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function getChapitre($id){
        $sql = "SELECT * FROM ".$this->table." WHERE roman_id='".$id."' ORDER BY $id";
        $query = $this->_connexion->query($sql);
        $arrayComments = array();
        while($d = $query->fetch(PDO::FETCH_ASSOC))
        {
            array_push($arrayComments, array('data' => ((array)$d)));
        }
        return $arrayComments; 
    }
        
    /**
     * Cette méthode permet d"ajouter un chapitre
     *
     * @param  mixed $title
     * @param  mixed $slug
     * @param  mixed $resum
     * @param  mixed $content
     * @param  mixed $src
     * @param  mixed $src_full
     * @return void
     */
    public function addChapitre($title, $slug, $resum, $content, $src, $src_full){
        try{
            $title = htmlspecialchars($title);

            $slug = htmlspecialchars($slug);

            $resum = htmlspecialchars($resum);

            $content = htmlspecialchars($content);

            $src = htmlspecialchars($src);

            $src_full = htmlspecialchars($src_full);

            var_dump($title ,$slug ,$resum ,$content ,$src ,$src_full );
            $result = $this->_connexion->prepare("
                INSERT INTO ".$this->table." (title, slug, resum, content, src, src_full) 
                VALUES (:title, :slug, :resum, :content, :src, :src_full)
                ");
            $result->execute(array(
                ':title' => $title,
                ':slug' => $slug,
                ':resum' => $resum,
                ':content' => $content,
                ':src' => $src,
                ':src_full' => $src_full
            ));
            var_dump($result);
        }
        catch (PDOException $Exception){
            var_dump($Exception);
        }
    }
        
    /**
     * Cette méthode permet d"editer un chapitre
     *
     * @param  mixed $id
     * @param  mixed $title
     * @param  mixed $resum
     * @param  mixed $src
     * @return void
     */
    public function editChapitre($id, $title, $slug, $resum, $content, $src, $src_full){
        try{
            $title = htmlspecialchars($title);

            $slug = htmlspecialchars($slug);

            $resum = htmlspecialchars($resum);

            $content = htmlspecialchars($content);

            $src = htmlspecialchars($src);
            $src_full = htmlspecialchars($src_full);

            $result = $this->_connexion->query("
                UPDATE ".$this->table." 
                SET title = '".$title."', slug = '".$slug."', resum = '".$resum."', content = '".$content."', src = '".$src."', src_full = '".$src_full."' 
                WHERE id = '".$id."'
                ");
        }
        catch (PDOException $Exception){
            var_dump($Exception);
        }
    }
}