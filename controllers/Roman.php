<?php
require_once("app/Auth.php");
Auth::forcer_utilisateur_connecte();

class Roman extends Controller{
    
    public function index(){
        // Instancie le modèle "Roman"
        $this->loadModel("RomanManager");
        
        // Stocke la liste des romans dans $romans
        $romans = $this->RomanManager->getAll();

        // Envoie les données à la vue index
        $this->renderAdmin('roman_manager', compact('romans'));
    }
    
    /**
     * Méthode qui permet de supprimer un roman à partir de l'id
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteRoman($id){
        $this->loadModel('RomanManager');
        $this->RomanManager->deleteRoman($id);
        header('Location: /jean-forteroche/roman');
    }

    /**
     * Méthode qui permet d'ajouter un roman à partir de l'id
     *
     * @return void
     */
    public function addRoman(){
        $this->loadModel('RomanManager');

        if(!empty($_POST['submit_roman']) AND !empty($_POST['title']) AND !empty($_POST['resum']) AND !empty($_POST['src'])) {
            $title = $_POST['title'];
            $resum = $_POST['resum'];
            $src = $_POST['src'];
            $this->RomanManager->addRoman($title, $resum, $src);  
            header('Location: /jean-forteroche/roman');
        }

        $this->renderAdmin('add_roman');
    }
    
    /**
     * Méthode qui permet de modifier un roman à partir de l'id
     *
     * @param  mixed $id
     * @return void
     */
    public function editRoman(string $id){
        $this->loadModel('RomanManager');

        $romans = $this->RomanManager->findById($id);
        
        if(!empty($_POST['id']) AND !empty($_POST['submit_roman']) AND !empty($_POST['title']) AND !empty($_POST['resum']) AND !empty($_POST['src'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $resum = $_POST['resum'];
            $src = $_POST['src'];
            $this->RomanManager->editRoman($id, $title, $resum, $src);
            header('Location: /jean-forteroche/roman');
        }

        $this->renderAdmin('edit_roman', compact('romans'));
    }

    /**
     * Méthode qui permet d'afficher les chapitres à partir de l'id
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function chapitre(string $id){
        $this->loadModel('RomanManager');
        $this->loadModel('ChapitreManager');

        $romans = $this->RomanManager->findById($id);
        $chapitres = $this->ChapitreManager->getChapitre($id);

        $this->renderAdmin('chapitre_manager', compact('romans', 'chapitres'));
    }

    /**
     * Méthode qui permet d'ajouter un chapitre à partir de l'id
     *
     * @return void
     */
    public function addChapitre(){
        $this->loadModel('ChapitreManager');

        var_dump(!empty($_POST['submit_chapitre']), !empty($_POST['title']), !empty($_POST['slug']), !empty($_POST['resum']), !empty($_POST['content']), !empty($_POST['src']), !empty($_POST['src_full']));
        
        if(!empty($_POST['submit_chapitre']) AND !empty($_POST['title']) AND !empty($_POST['slug']) AND !empty($_POST['resum']) AND !empty($_POST['content']) AND !empty($_POST['src']) AND !empty($_POST['src_full'])) {
            $title = $_POST['title'];
            $slug = $_POST['slug'];
            $resum = $_POST['resum'];
            $content = $_POST['content'];
            $src = $_POST['src'];
            $src_full = $_POST['src_full'];
            $this->ChapitreManager->addChapitre($title, $slug, $resum, $content, $src, $src_full);
            /* header('Location: /jean-forteroche/roman/chapitre/'.$chapitre['id'].''); */
        }
        
        $this->renderAdmin('add_chapitre');
    }

    /**
     * Méthode qui permet de modifier un chapitre à partir de l'id
     *
     * @param  mixed $id
     * @return void
     */
    public function editChapitre(string $id){
        $this->loadModel('ChapitreManager');

        $chapitres = $this->ChapitreManager->findById($id);
        if(!empty($_POST['id']) AND !empty($_POST['submit_chapitre']) AND !empty($_POST['title']) AND !empty($_POST['slug']) AND !empty($_POST['resum']) AND !empty($_POST['content']) AND !empty($_POST['src']) AND !empty($_POST['src_full'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $slug = $_POST['slug'];
            $resum = $_POST['resum'];
            $content = $_POST['content'];
            $src = $_POST['src'];
            $src_full = $_POST['src_full'];
            $this->ChapitreManager->editChapitre($id, $title, $slug, $resum, $content, $src, $src_full);
        }

        $this->renderAdmin('edit_chapitre', compact('chapitres'));
    }
}