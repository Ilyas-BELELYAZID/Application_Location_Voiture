<?php
class locationModel{
    private $pdo;

    public function __construct() {
        require_once("../config/config.php");
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $req = $this->pdo->prepare("SELECT * FROM location");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $req = $this->pdo->prepare("SELECT * FROM location WHERE idLoc = ?");
        $req->execute([$id]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getByImmatriculation($immatriculation) {
        $req = $this->pdo->prepare("SELECT * FROM location WHERE immatriculation = ?");
        $req->execute([$immatriculation]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getByIdUser($id) {
        $req = $this->pdo->prepare("SELECT * FROM location WHERE idUser = ?");
        $req->execute([$id]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function addLocation($immatriculation, $idUser, $nbJours, $dateRetrait, $dateDepot, $adresseRetrait, $adresseDepot) {
        $req = $this->pdo->prepare(query: 'INSERT INTO location (immatriculation, idUser, nbJours, date_retrait, date_depot, adresse_retrait, adresse_depot) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $params = array($immatriculation, $idUser, $nbJours, $dateRetrait, $dateDepot, $adresseRetrait, $adresseDepot);
        return $req->execute(params);
    }

    public function updateLocation($id) {
        $req = $this->pdo->prepare("UPDATE location SET louer = '0' WHERE idLoc = ?");
        return $req->execute([$id]);
    }
}
?>