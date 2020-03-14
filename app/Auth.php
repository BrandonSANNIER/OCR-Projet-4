<?php
class Auth {
    static function est_connecte (): bool {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return !empty($_SESSION['connecte']);
    }
    
    static function forcer_utilisateur_connecte (): void {
        if(!SELF::est_connecte()) {
            header('Location: /jean-forteroche/login');
            exit();
        }
    }
}
