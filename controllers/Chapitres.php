<?php
class Chapitres extends Controller{

    /**
     * Cette méthode affiche la liste des Chapitres
     *
     * @return void
     */
    public function index(){
        // Instancie le modèle "Chapitre"
        $this->loadModel("ChapitreManager");

        // Stocke la liste des chapitre dans $chapitress
        $chapitres = $this->ChapitreManager->getAll();

        // Envoie les données à la vue index
        $this->render('chapitre', compact('chapitres'));
    }

    /**
     * Méthode qui permet d'afficher un chapitre à partir de son slug
     *
     * @param string $slug
     * 
     * @return void
     */
    public function lecture(string $slug){
        // Instancie le modèle "Chapitre" et "Comment"
        $this->loadModel('ChapitreManager');
        $this->loadModel('CommentManager');

        // Stocke les commentaires dans $comments et
        // le slug dans $chapitre
        $chapitre = $this->ChapitreManager->findBySlug($slug);
        $comments = $this->CommentManager->getComments($chapitre['id']);

        // Inctencie la fonction pour ajouter un commentaire
        $this->addComment();

        $this->render('lecture', compact('chapitre', 'comments'));
    }

    /**
     * Cette methode permet d'ajouter un commentaire
     *
     * @return void
     */
    public function addComment(){
        // Instancie le modèle "Chapitre" et "Comment"
        $this->loadModel('ChapitreManager');
        $this->loadModel('CommentManager');

        // Si le formulaire et remplie
        if(!empty($_POST['submit_comment']) AND !empty($_POST['first_name']) AND !empty($_POST['last_name']) AND !empty($_POST['comment']) AND !empty($_POST['id_chapt'])) {
            $this->CommentManager->addComment($_POST);
            $chapitre = $this->ChapitreManager->findById($_POST['id_chapt']);
            header('Location: lecture/'.$chapitre['slug'].'');
        }  
    }
}