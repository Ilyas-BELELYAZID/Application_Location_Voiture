<?php
require_once '../core/Controller.php';

class authController extends Controller {

    public function login() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        session_unset();
        session_destroy();
        $this->view("auth/formLogin");
    }
    
    public function signUp() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        session_unset();
        session_destroy();
        $this->view("auth/formSignup");
    }

    public function changePassword() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) $this->view("auth/changePasswordForm");
        else $this->view("auth/formLogin");
    }

    public function authenticate() {
        if(isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            $userModel = $this->model("userModel");
            $user = $userModel->getByEmailPassword($email, $password);
        
            if ($user) {
                if(session_status() === PHP_SESSION_NONE) session_start();
                $_SESSION['loginSuccess'] = $user['idUser'];

                $locationModel = $this->model("locationModel");
                $res = $locationModel->getByIdUser($_SESSION['loginSuccess']);
                foreach($res as $req) {
                    if ((date('Y-m-d') > $req['date_depot']) && $req['louer'] != "0") {
                        $_SESSION['error'] = "Retourner";
                    }
                }
                
                $_SESSION['role'] = $user['role'];
                if($_SESSION['role'] == "admin") header("Location: index.php?controller=eLocation&action=addVoitureForm");
                else header("Location: index.php?controller=eLocation&action=acceuilForm");
                exit();
            } else {
                $this->view("auth/formLogin", ['error' => "Votre Email et/ou mot de passe n'est pas correct"]);
            }
        }
        else $this->view("auth/formLogin");
    }

    public function creatAccount() {
        if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['CIN'])) {
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $cin = $_POST['CIN'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = $this->model("userModel");
            $userClient = $userModel->addUser($email, $password, $nom, $prenom, $cin);

            if($userClient) {
                header('Location: index.php?controller=auth&action=login');
                exit();
            }
            else {
                $this->view("auth/formSignup", ['error' => "Votre Email et/ou CIN est déjà enregistrer"]);
            }
        }
        else $this->view("auth/formSignup");
    }

    public function updatePassword() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess']) && isset($_POST['change'])) {
            $oldPass = $_POST['oldPass'];
            $newPass1 = $_POST['newPass1'];
            $newPass2 = $_POST['newPass2'];

            if(($newPass1 === $newPass2) && isset($oldPass) && isset($newPass1) && isset($newPass2)) {
                $userModel = $this->model("userModel");

                $id = $_SESSION['loginSuccess'];
                $user = $userModel->getByID($id);

                if($user['password'] === hash("sha256", $oldPass)) {
                    $valid = $userModel->updateUser($id, null, $newPass1);
                    if($valid) $this->view("auth/changePasswordForm", ['success' => "Le mot de passe change avec success"]);
                    exit();
                }
                else $this->view("auth/changePasswordForm", ['error' => "Votre ancien mot de passe n'est pas correcte"]);
            }
        }
        else $this->view("auth/changePasswordForm");
    }

    public function logout() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        session_unset();
        session_destroy();
        header("Location: index.php?controller=auth&action=login");
    }
}
?>