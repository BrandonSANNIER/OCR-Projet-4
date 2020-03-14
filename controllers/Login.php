<?php
class Login extends Controller{
    public function index(){
        $this->user_login();
        require_once("views/elements/admin/login.phtml");
    }

    public function user_login(){
        $erreur = null;
        $password = '$2y$12$kFmdCaTmmKgXzq3.MIbhSOu5XZxmG7btrUPBgkC/0nrB2/TBLEC8.';
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            if ($_POST['username'] === 'admin' && password_verify($_POST['password'], $password)) {
                session_start();
                $_SESSION['connecte'] = 1;
                header('Location: /jean-forteroche/dashboard');
                exit();
            } else {
                $erreur = "Identifiants incorrects";
            }
        }

        require_once 'app/Auth.php';
        if (Auth::est_connecte()) {
            header('Location: /jean-forteroche/dashboard');
            exit();
        }
    }
}