<?php
class Home extends Controller{

    /**
     * Cette méthode affiche la liste des romans
     *
     * @return void
     */
    public function index(){
        // Instancie le modèle "Roman"
        $this->loadModel("Roman");

        // Stocke la liste des romans dans $romans
        $romans = $this->Roman->getAll();
        
        // Envoie les données à la vue index
        $this->render('home', compact('romans'));
    }
}