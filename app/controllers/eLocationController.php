<?php
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
        if(isset($_SESSION['loginSuccess'])) {
            $voitureModel = $this->model("voitureModel");
            $res = $voitureModel->getAll();
            $this->view("eLocation/indexForm", ['res' => $res]);
        }
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
        if(isset($_SESSION['loginSuccess'])) {
            $voitureModel = $this->model("voitureModel");
            $res = $voitureModel->getAll();
            $this->view("eLocation/carsForm", ['res' => $res]);
        }
        else $this->view("auth/formLogin");
    }

    public function deleteForm() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) {
            $voitureModel = $this->model("voitureModel");
            $res = $voitureModel->getAll();
            $this->view("eLocation/deleteVoiture", ['res' => $res]);
        }
        else $this->view("auth/formLogin");
    }

    public function deleteRentForm() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) {
            $userModel = $this->model("userModel");
            $voitureModel = $this->model("voitureModel");
            $locationModel = $this->model("locationModel");
            $us = $voitureModel->getAll();
            $res = $voitureModel->getAll();
            $req = $locationModel->getAll();
            $this->view("eLocation/deleteRent", ['res' => $res, 'req' => $req, 'us' => $us]);
        }
        else $this->view("auth/formLogin");
    }

    public function addVoiture() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess']) && isset($_POST['add'])) {
            $marque = $_POST['marque'];
            $modele = $_POST['modele'];
            $nbVoitures = $_POST['nbVoitures'];
            $prixLoc = $_POST['prixLoc'];
            $nbPortes = $_POST['nbPortes'];
            $place = $_POST['place'];
            $pht = $_FILES['pht'];
            $size = $_POST['MAX_FILE_SIZE'];
            $phtSize = $_FILES['pht']['size'];

            if(isset($marque) && isset($modele) && isset($nbVoitures) && isset($prixLoc) && isset($nbPortes) && isset($pht) && isset($place)) {
                $userModel = $this->model("voitureModel");

                if($phtSize <= $size) {
                    $phtPath = $_FILES['pht']['tmp_name'];
                    $newName = uniqid('voiture_', false);
                    move_uploaded_file($phtPath, "uploads/imagesVoiture/$newName");

                    $valid = $userModel->addVoiture($marque, $modele, $prixLoc, $nbPortes, $newName, $place, $nbVoitures);
                    if($valid) $this->view("eLocation/addVoitureForm", ['success' => "Votre voiture enregistré avec success"]);
                    else $this->view("eLocation/addVoitureForm", ['error' => "Votre voiture n'est pas enregistré du à le modéle, qui doit étre unique pour chaque voiture."]);
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
            
            $marque = $_POST['marque'];
            $modele = $_POST['modele'];
            $nbVoitures = $_POST['nbVoitures'];
            $prixLoc = $_POST['prixLoc'];
            $nbPortes = $_POST['nbPortes'];
            $place = $_POST['place'];
            $pht = $_FILES['pht'];
            $size = $_POST['MAX_FILE_SIZE'];
            $phtSize = $_FILES['pht']['size'];
            

            $userModel = $this->model("voitureModel");
            $valid = $userModel->getByModele($modele);

            if(isset($modele) && isset($valid)) {
                if($phtSize <= $size) {
                    $id = $valid['idVoiture'];
                    if($pht && $id) {
                        $chemin = "uploads/imagesVoiture/" . $valid['pht'];
                        unlink($chemin);
                        $phtPath = $_FILES['pht']['tmp_name'];
                        $newName = uniqid('voiture_', false);
                        move_uploaded_file($phtPath, "uploads/imagesVoiture/$newName");
                    }
                    $valid = $userModel->updateVoiture($id, $marque, $modele, $prixLoc, $nbPortes, $newName, null, $place, $nbVoitures);
                    if($valid) $this->view("eLocation/updateVoitureForm", ['success' => "Votre voiture enregistré avec success"]);
                    else $this->view("eLocation/updateVoitureForm", ['error' => "Votre voiture n'est pas enregistré du à l'immatriculation, qui doit étre unique pour chaque voiture."]);
                    exit();
                }
                else $this->view("eLocation/updateVoitureForm", ['error' => "La taille de photo ne peut pas dépasser 3Mo !!"]);
            }
            else $this->view("eLocation/updateVoitureForm", ['error' => "Le modéle n'existe pas !!"]);
        }
        else $this->view("eLocation/updateVoitureForm");
    }

    public function deleteRent() {
        
    }

    public function deleteVoiture() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) {
            $id = $_GET['voiture'];

            $voitureModel = $this->model("voitureModel");

            $valid = $voitureModel->deleteVoiture($id);
            if($valid) {
                $voitureModel = $this->model("voitureModel");
                $res = $voitureModel->getAll();
                $this->view("eLocation/deleteVoiture", ['success' => "La voiture a été supprimer avec success !!", 'res' => $res]);
            }
        }
        else $this->view("eLocation/deleteVoiture");
    }

    public function index() {
        if(session_status() === PHP_SESSION_NONE) session_start();
        if(isset($_SESSION['loginSuccess'])) {
            
        }
        else $this->view("eLocation/indexForm");
    }
}

?>