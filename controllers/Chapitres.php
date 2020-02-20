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
     * Méthode qui permet d'afficher un chapitre à partir de son slug
     *
     * @param string $slug
     * 
     * @return void
     */
    public function lecture(string $slug){
        // Instancie le modèle "Chapitre" et "Comment"
        $this->loadModel('Chapitre');
        $this->loadModel('Comment');

        // Stocke les commentaires dans $comments et
        // le slug dans $chapitre
        $chapitre = $this->Chapitre->findBySlug($slug);
        $comments = $this->Comment->getComments($chapitre['id']);

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
        $this->loadModel('Chapitre');
        $this->loadModel('Comment');

        // Si le formulaire et remplie
        if(!empty($_POST['submit_comment']) AND !empty($_POST['first_name']) AND !empty($_POST['last_name']) AND !empty($_POST['comment']) AND !empty($_POST['id_chapt'])) {
            $this->Comment->addComment($_POST);
            $chapitre = $this->Chapitre->findById($_POST['id_chapt']);
            header('Location: lecture/'.$chapitre['slug'].'');
        }  
    }
}