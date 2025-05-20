<?php
class SessionManager{
    public static function start_secure_session(int $session_duration) {
        // Utiliser HTTPS uniquement
        if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
            header("HTTP/1.1 403 Forbidden");
            exit("Access is only allowed via HTTPS.");
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params([
                'lifetime' => $session_duration,
                'path' => '/',
                'domain' => '',
                'secure' => true,       // Cookies uniquement via HTTPS
                'httponly' => true,     // Empêche les scripts d'y accéder
                'samesite' => 'Strict'  // Protection contre les attaques CSRF
            ]);
            session_start();
        }
    
        if (isset($_SESSION['last_activity'])) {
            $inactive_duration = time() - $_SESSION['last_activity'];
    
            if ($inactive_duration > $session_duration) {
                session_unset();
                session_destroy();
                header('Location: index.php?controller=auth&action=login'); 
                exit();
            }
        }
    
        $_SESSION['last_activity'] = time();
    }

    public static function set($key, $value) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return $_SESSION[$key] ?? null;
    }

    public static function destroy() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();
    }
}

?>