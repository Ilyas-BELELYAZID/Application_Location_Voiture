<?php
require_once '../core/Controller.php';

class autresController extends Controller {

    public function profilePhotoForm() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) $this->view("Autres/changeProfilePhoto");
        else $this->view("auth/formLogin");
    }

    public function updateProfileForm() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) {
            $profile = $this->profile();
            global $erreur, $success;
            $this->view("Autres/changeProfileForm", ['error' => $erreur, 'success' => $success, 'email' => $profile['email'], 'nom' => $profile['nom'], 'prenom' => $profile['prenom'], 'cin' => $profile['CIN'], 'pht' => $profile['pht']]);
        }
        else $this->view("auth/formLogin");
    }

    public function profileForm() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) {
            $id = $_SESSION['loginSuccess'];
            $locationModel = $this->model("locationModel");
            $res = $locationModel->getByIdUser($id);
            $profile = $this->profile();
            $this->view("Autres/profileForm", ['res' => $res, 'email' => $profile['email'], 'nom' => $profile['nom'], 'prenom' => $profile['prenom'], 'role' => $profile['role'], 'cin' => $profile['CIN'], 'pht' => $profile['pht']]);
        }
        else $this->view("auth/formLogin");
    }

    public function profilePhoto() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess']) && isset($_POST['changePht'])) {
            $id = $_SESSION['loginSuccess'];
            $pht = $_FILES['pht'];
            $size = $_POST['MAX_FILE_SIZE'];
            $phtSize = $_FILES['pht']['size'];

            $profileModel = $this->model("userModel");
            $user = $profileModel->getByID($id);
            if(isset($pht)) {
                if($size >= $phtSize) {
                    $phtPath = $_FILES['pht']['tmp_name']; 
                    $newName = uniqid("voiture_", false);
                    move_uploaded_file($phtPath, "uploads/imagesProfile/$newName");
                    if(!empty($user['pht'])) unlink("uploads/imagesProfile/" . $user['pht']);
                    $valid = $profileModel->updateUser($id, null, null, null, null, null, $newName);
                    if($valid) $this->view("Autres/changeProfilePhoto", ['success' => "Votre photo profile change avec success"]);
                    else $this->view("Autres/changeProfilePhoto", ['error' => "Il y a eu une erreur lors de changement votre photo profile."]);
                    exit();
                }
                else $this->view("Autres/changeProfilePhoto", ['error' => "La taille de photo profile ne peut pas dépasser 3Mo !!"]);
            }
            
        }
        else $this->view("Autres/changeProfilePhoto");
    }

    public function updateProfile() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess']) && isset($_POST['updateProfile'])) {
            $id = $_SESSION['loginSuccess'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $cin = $_POST['CIN'];
            $email = $_POST['email'];

            $profileModel = $this->model("userModel");
            $user = $profileModel->getByID($id);

            if(isset($nom) && isset($prenom) && isset($cin) && isset($email)) {
                $valid = $profileModel->updateUser($id, $email, null, $nom, $prenom, $cin, null);
                global $erreur, $success;
                if($valid) {
                    $erreur = null;
                    $success = "Vos informations changent sans erreur!!";
                }
                else {
                    $erreur = "Le CIN ou l'email est déjà existe !!";
                    $success = null;
                }
                $this->updateProfileForm();
            }
        }
        else $this->view("Autres/changeProfileForm");
    }

    public function profile() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) {
            $id = $_SESSION['loginSuccess'];

            $profileModel = $this->model("userModel");
            $user = $profileModel->getByID($id);
            return $user;
        }
    }
}

?>