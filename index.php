<?php
// Constante contenant le chemin vers la racine publique
define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

// Modèle et le contrôleur principaux
require_once(ROOT.'app/Auth.php');
require_once(ROOT.'app/Model.php');
require_once(ROOT.'app/Controller.php');

// Sépare les paramètres et met dans le tableau $params
$params = explode('/', $_GET['p']);

// Si au moins 1 paramètre existe
if($params[0] != ""){
    // Sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
    $controller = ucfirst($params[0]);

    // Sauvegarde le 2ème paramètre dans $action si il existe, sinon index
    $action = isset($params[1]) ? $params[1] : 'index';

    // Appelle du contrôleur
    require_once(ROOT.'controllers/'.$controller.'.php');

    // Instancie le contrôleur
    $controller = new $controller();

    if(method_exists($controller, $action)){
        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller,$action], $params);
        // Appelle la méthode $controller->$action();
    }else{
        // Envoie du code réponse 404
        http_response_code(404);
        require_once(ROOT.'views/errors/404.phtml');
    }
}else{
    // Si aucun paramètre n'est défini
    // Appelle du contrôleur par défaut
    require_once(ROOT.'controllers/Home.php');

    // Instancie le contrôleur
    $controller = new Home();

    // Appelle de la méthode index
    $controller->index();
}

