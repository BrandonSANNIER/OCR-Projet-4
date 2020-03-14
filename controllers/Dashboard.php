<?php
require_once("app/Auth.php");
Auth::forcer_utilisateur_connecte();

class Dashboard extends Controller{
    public function index(){
        // Envoie les données à la vue index
        $this->renderAdmin('dashboard');
    }
}