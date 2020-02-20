<?php
class Chapitres extends Controller{

    /**
     * Cette méthode affiche la liste des Chapitres
     *
     * @return void
     */
    public function index(){
        // Instancie le modèle "Chapitre"
        $this->loadModel("Chapitre");

        // Stocke la liste des chapitre dans $chapitress
        $chapitres = $this->Chapitre->getAll();

        // Envoie les données à la vue index
        $this->render('chapitre', compact('chapitres'));
    }

    /**
     * Méthode affiche un chapitre à partir de son slug
     *
     * @param string $slug
     * 
     * @return void
     */
    public function lecture(string $slug){
        // Instancie le modèle "Chapitre" et "Comment"
        $this->loadModel('Chapitre');
        $this->loadModel('Comment');

        // Stocke les commentaire dans $comments et
        // le slug dans $chapitre
        $chapitre = $this->Chapitre->findBySlug($slug);
        $comments = $this->Comment->getComments($id);

        $this->addComment();

        $this->render('lecture', compact('chapitre', 'comments'));
    }

    public function addComment(){

        if(isset($_POST['submit_commentaire'])) {
            if(isset($_POST['first_name'], $_POST['last_name'], $_POST['comment']) AND !empty($_POST['first_name']) AND !empty($_POST['first_name']) AND !empty($_POST['comment'])) {
                $first_name = htmlspecialchars($_POST['first_name']);
                $last_name = htmlspecialchars($_POST['last_name']);
                $comment = htmlspecialchars($_POST['comment']);
                $ins = $bdd->prepare('INSERT INTO comment (first_name, last_name, comment, chapitre_id) VALUES (?,?,?,?)');
                $ins->execute(array($first_name, $last_name, $commentaire, $chapitre_id));
                $_msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";
            }
        }
    }
}