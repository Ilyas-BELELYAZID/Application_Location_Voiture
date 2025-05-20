<?php
class voitureModel{
    private $pdo;

    public function __construct() {
        require_once("../config/config.php");
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $req = $this->pdo->prepare("SELECT * FROM voiture");
        $req->execute();
        return $req->fetchAll();
    }

    public function getById($id) {
        $req = $this->pdo->prepare("SELECT * FROM voiture WHERE idVoiture = ?");
        $req->execute([$id]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getByModele($modele) {
        $req = $this->pdo->prepare("SELECT * FROM voiture WHERE modele = ?");
        $req->execute([$modele]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function addVoiture($marque, $modele, $prixLocation, $nbPortes, $pht, $place, $nbVoitures) {
        $req = $this->pdo->prepare(query: 'INSERT INTO voiture (marque, modele, prixLocation, nbPortes, pht, place, nbVoitures) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $params = array($marque, $modele, $prixLocation, $nbPortes, $pht, $place, $nbVoitures);
        try {
            $req->execute($params);
            return true;
        } catch (PDOException) {
            return false;
        }
    }

    public function updateVoiture($id, $marque = null, $modele = null, $prixLocation = null, $nbPortes = null, $pht = null, $louer = null, $place = null, $nbVoitures = null) {
        $valid = $valid1 = $valid2 = $valid3 = $valid4 = $valid5 = $valid6 = $valid7 = $valid8 = true;
        if($marque) {
            $req = $this->pdo->prepare('UPDATE voiture SET marque = ? WHERE idVoiture = ?');
            $params = array($marque, $id);
            $valid1 = $req->execute($params);
        }
        if ($modele) {
            $req = $this->pdo->prepare('UPDATE voiture SET modele = ? WHERE idVoiture = ?');
            $params = array($modele , $id);
            $valid2 = $req->execute($params);
        }
        if ($prixLocation) {
            $req = $this->pdo->prepare('UPDATE voiture SET prixLocation = ? WHERE idVoiture = ?');
            $params = array($prixLocation, $id);
            $valid4 = $req->execute($params);
        }
        if ($nbPortes) {
            $req = $this->pdo->prepare('UPDATE voiture SET nbPortes = ? WHERE idVoiture = ?');
            $params = array($nbPortes, $id);
            $valid5 = $req->execute($params);
        }
        if ($pht) {
            $req = $this->pdo->prepare('UPDATE voiture SET pht = ? WHERE idVoiture = ?');
            $params = array($pht, $id);
            $valid6 = $req->execute($params);
        }
        if ($louer) {
            $req = $this->pdo->prepare('UPDATE voiture SET louer = ? WHERE idVoiture = ?');
            $params = array($louer, $id);
            $valid7 = $req->execute($params);
        }
        if ($place) {
            $req = $this->pdo->prepare('UPDATE voiture SET louer = ? WHERE idVoiture = ?');
            $params = array($place, $id);
            $valid8 = $req->execute($params);
        }
        if ($nbVoitures) {
            $req = $this->pdo->prepare('UPDATE voiture SET nbVoitures = ? WHERE idVoiture = ?');
            $params = array($nbVoitures, $id);
            $valid3 = $req->execute($params);
        }
        $valid = $valid1 && $valid2 && $valid3 && $valid4 && $valid5 && $valid6 && $valid7 && $valid8;
        return $valid;
    }

    public function deleteVoiture($id) {
        $req = $this->pdo->prepare("DELETE FROM voiture WHERE idVoiture = ?");
        return $req->execute([$id]);
    }
}
?>