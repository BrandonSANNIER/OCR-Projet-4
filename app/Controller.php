<?php
abstract class Controller{
    /**
     * Afficher une vue
     *
     * @param string $fichier
     * @param array $data
     * @return void
     */
    public function render(string $fichier, array $data = []){
        extract($data);

        ob_start();

        // Génèration de la vue
        require_once(ROOT.'views/elements/'.$fichier.'.phtml');

        // Stocke le contenu dans $content
        $content = ob_get_clean();

        // Affichage du layout
        require_once(ROOT.'views/layout/default.phtml');
    }

    /**
     * Permet de charger un modèle
     *
     * @param string $model
     * @return void
     */
    public function loadModel(string $model){
        // Cherche le fichier correspondant au modèle souhaité
        require_once(ROOT.'models/'.$model.'.php');
        
        // Crée une instance de ce modèle.
        $this->$model = new $model();
    }

    /**
     * Afficher une vue pour la section Admin
     *
     * @param string $fichier
     * @param array $data
     * @return void
     */
    public function renderAdmin(string $fichier, array $data = []){
        extract($data);

        ob_start();

        // Génèration de la vue
        require_once(ROOT.'views/elements/admin/'.$fichier.'.phtml');

        // Stocke le contenu dans $content
        $content = ob_get_clean();

        // Affichage du layout
        require_once(ROOT.'views/layout/admin.phtml');
    }
}