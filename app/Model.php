<?php
abstract class Model{
    // Informations de la base de données
    private $host = "localhost";
    private $db_name = "jean_forteroche";
    private $username = "root";
    private $password = "";

    // Propriété qui contiendra l'instance de la connexion
    protected $_connexion;

    // Propriétés permettant de personnaliser les requêtes
    public $table;
    public $id;

    /**
     * Fonction d'initialisation de la base de données
     *
     * @return void
     */
    public function getConnection(){
        // Supprime la connexion précédente
        $this->_connexion = null;

        // Connecter à la bdd
        try{
            $this->_connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->_connexion->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }
    }

    /**
     * Méthode permettant d'obtenir un enregistrement de la table choisie en fonction d'un id
     *
     * @return void
     */
    public function getOne($id){
        $sql = "SELECT *, DATE_FORMAT(date, '%D %b %Y') AS 'date_formater' FROM ".$this->table." WHERE id=".$this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();    
    }

    /**
     * Méthode permettant d'obtenir tous les enregistrements de la table choisie
     *
     * @return void
     */
    public function getAll(){
        $sql = "SELECT *, DATE_FORMAT(date, '%d %M, %Y') AS 'date_formater' FROM ".$this->table;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    /**
     * Méthode permettant d'obtenir un nombre limité de table
     *
     * @param string $limit
     * @return void
     */
    public function getLimited(string $limit){
        $sql = "SELECT *, DATE_FORMAT(date, '%D %b %Y') AS 'date_formater' FROM".$this->table."ORDER BY id=".$this->id."DESC LIMIT ".$limit;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();  
    }
}