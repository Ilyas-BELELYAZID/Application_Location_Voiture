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

    public function getByImmaticulation($immatriculation) {
        $req = $this->pdo->prepare("SELECT * FROM voiture WHERE immatriculation = ?");
        $req->execute([$immatriculation]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function addVoiture($marque, $modele, $immatriculation, $prixLocation, $nbPortes, $pht, $place) {
        $req = $this->pdo->prepare(query: 'INSERT INTO voiture (marque, modele, immatriculation, prixLocation, nbPortes, pht, place) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $params = array($marque, $modele, $immatriculation, $prixLocation, $nbPortes, $pht, $place);
        try {
            $req->execute($params);
            return true;
        } catch (PDOException) {
            return false;
        }
    }

    public function updateVoiture($id, $marque = null, $modele = null, $immatriculation = null, $prixLocation = null, $nbPortes = null, $pht = null, $louer = null, $place = null) {
        $valid = $valid1 = $valid2 = $valid3 = $valid4 = $valid5 = $valid6 = $valid7 = $valid8 = true;
        if($marque) {
            $req = $this->pdo->prepare('UPDATE users SET marque = ? WHERE idVoiture = ?');
            $params = array($marque, $id);
            $valid1 = $req->execute($params);
        }
        if ($modele) {
            $req = $this->pdo->prepare('UPDATE users SET modele = ? WHERE idVoiture = ?');
            $params = array(SHA2($modele, 256), $id);
            $valid2 = $req->execute($params);
        }
        if ($immatriculation) {
            $req = $this->pdo->prepare('UPDATE users SET immatriculation = ? WHERE idVoiture = ?');
            $params = array($immatriculation, $id);
            try {
                $req->execute($params);
                $valid3 = true;
            } catch (PDOException) {
                $valid3 = false;
            }
        }
        if ($prixLocation) {
            $req = $this->pdo->prepare('UPDATE users SET prixLocation = ? WHERE idVoiture = ?');
            $params = array($prixLocation, $id);
            $valid4 = $req->execute($params);
        }
        if ($nbPortes) {
            $req = $this->pdo->prepare('UPDATE users SET nbPortes = ? WHERE idVoiture = ?');
            $params = array($nbPortes, $id);
            $valid5 = $req->execute($params);
        }
        if ($pht) {
            $req = $this->pdo->prepare('UPDATE users SET pht = ? WHERE idVoiture = ?');
            $params = array($pht, $id);
            $valid6 = $req->execute($params);
        }
        if ($louer) {
            $req = $this->pdo->prepare('UPDATE users SET louer = ? WHERE idVoiture = ?');
            $params = array($louer, $id);
            $valid7 = $req->execute($params);
        }
        if ($place) {
            $req = $this->pdo->prepare('UPDATE users SET louer = ? WHERE idVoiture = ?');
            $params = array($place, $id);
            $valid8 = $req->execute($params);
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