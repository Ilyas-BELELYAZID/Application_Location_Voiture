<?php
require_once '../app/controllers/Voiture.php';
require_once '../core/Controller.php';

class eLocationController extends Controller {

    public function addVoitureForm() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) $this->view("eLocation/addVoitureForm");
        else $this->view("auth/formLogin");
    }

    public function updateVoitureForm() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) $this->view("eLocation/updateVoitureForm");
        else $this->view("auth/formLogin");
    }

    public function acceuilForm() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) $this->view("eLocation/indexForm");
        else $this->view("auth/formLogin");
    }

    public function servicesForm() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) $this->view("eLocation/servicesForm");
        else $this->view("auth/formLogin");
    }

    public function contactForm() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) $this->view("eLocation/contactForm");
        else $this->view("auth/formLogin");
    }

    public function carsForm() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) $this->view("eLocation/carsForm");
        else $this->view("auth/formLogin");
    }

    public function deleteForm() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) $this->view("eLocation/deleteVoiture");
        else $this->view("auth/formLogin");
    }

    public function deleteRentForm() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) $this->view("eLocation/deleteRent");
        else $this->view("auth/formLogin");
    }

    public function addVoiture() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess']) && isset($_POST['add'])) {
            $marque = $_POST['marque'];
            $modele = $_POST['modele'];
            $immatriculation = $_POST['immatriculation'];
            $prixLoc = $_POST['prixLoc'];
            $nbPortes = $_POST['nbPortes'];
            $place = $_POST['place'];
            $pht = $_FILES['pht'];
            $size = $_POST['MAX_FILE_SIZE'];
            $phtSize = $_FILES['pht']['size'];

            if(isset($marque) && isset($modele) && isset($immatriculation) && isset($prixLoc) && isset($nbPortes) && isset($pht) && isset($place)) {
                $userModel = $this->model("voitureModel");

                if($phtSize <= $size) {
                    $phtPath = $_FILES['pht']['tmp_name'];
                    $newName = uniqid('voiture_', false);
                    move_uploaded_file($phtPath, "uploads/imagesVoiture/$newName");

                    $valid = $userModel->addVoiture($marque, $modele, $immatriculation, $prixLoc, $nbPortes, $newName, $place);
                    if($valid) $this->view("eLocation/addVoitureForm", ['success' => "Votre voiture enregistré avec success"]);
                    else $this->view("eLocation/addVoitureForm", ['error' => "Votre voiture n'est pas enregistré du à l'immatriculation, qui doit étre unique pour chaque voiture."]);
                    exit();
                }
                else $this->view("eLocation/addVoitureForm", ['error' => "La taille de photo ne peut pas dépasser 3Mo !!"]);
            }
        }
        else $this->view("eLocation/addVoitureForm");
    }

    public function updateVoiture() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess']) && isset($_POST['update'])) {
            unlink($_POST['pht1']);
            $marque = $_POST['marque'];
            $modele = $_POST['modele'];
            $immatriculation = $_POST['immatriculation'];
            $prixLoc = $_POST['prixLoc'];
            $nbPortes = $_POST['nbPortes'];
            $place = $_POST['place'];
            $pht = $_FILES['pht'];
            $size = $_POST['MAX_FILE_SIZE'];
            $phtSize = $_FILES['pht']['size'];

            if(isset($immatriculation)) {
                $userModel = $this->model("voitureModel");

                if($phtSize <= $size) {
                    $phtPath = $_FILES['pht']['tmp_name'];
                    $newName = uniqid('voiture_', false);
                    move_uploaded_file($phtPath, "uploads/imagesVoiture/$newName");

                    $valid = $userModel->addVoiture($marque, $modele, $immatriculation, $prixLoc, $nbPortes, $newName, $place);
                    if($valid) $this->view("eLocation/updateVoitureForm", ['success' => "Votre voiture enregistré avec success"]);
                    else $this->view("eLocation/updateVoitureForm", ['error' => "Votre voiture n'est pas enregistré du à l'immatriculation, qui doit étre unique pour chaque voiture."]);
                    exit();
                }
                else $this->view("eLocation/updateVoitureForm", ['error' => "La taille de photo ne peut pas dépasser 3Mo !!"]);
            }
        }
        else $this->view("eLocation/updateVoitureForm");
    }

    public function deleteRent() {

    }

    public function deleteVoiture() {
        
    }

    public function index() {

    }
}

?>