<?php
require_once '../app/controllers/IVehicule.php';

abstract class Voiture implements IVehicule {
    protected $marque;
    protected $modele;
    protected $immatriculation;
    protected $nbLocations;
    protected $prixLocation;
    protected $louer;
    protected $montant=1000;

    public function __construct($marque, $modele, $immatriculation, $nbLocations, $prixLocation, $louer) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->immatriculation = $immatriculation;
        $this->nbLocations = $nbLocations;
        $this->prixLocation = $prixLocation;
        $this->louer = $louer;
    }

    public function getMarque() {
        return $this->marque;
    }
    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function getModele() {
        return $this->modele;
    }
    public function setModele($modele) {
        $this->modele = $modele;
    }

    public function getImmatriculation() {
        return $this->immatriculation;
    }
    public function setImmatriculation($immatriculation) {
        $this->immatriculation = $immatriculation;
    }

    public function getNbLocations() {
        return $this->nbLocations;
    }
    public function setNbLocations($nbLocations) {
        $this->nbLocations = $nbLocations;
    }

    public function getPrixLocation() {
        return $this->prixLocation;
    }
    public function setPrixLocation($prixLocation) {
        $this->prixLocation = $prixLocation;
    }

    public function isLouer() {
        if($this->louer) return true;
        return false;
    }
    public function setLouer($louer) {
        $this->louer = $louer;
    }

    public function getType() {
        return "Voiture";
    }

    public function calculerTarif(int $nbJours) {
        return $this->prixLocation * $nbJours;
    }

    public function estRentable() {
        if($this->calculerTarif(5) > $this->montant) return true;
        return false;
    }

    public function afficherInfosGenerales() {
        return "Marque: " . $this->marque . ", Modéle: " . $this->modele . ", Immatriculation: " . $this->immatriculation . ", Nombre de locations: " . $this->nbLocations . ", Prix locations: " . $this->prixLocation . ", et Louer: " . $this->isLouer();
    }

    public abstract function addVoiture();
    public abstract function updateVoiture();
}

?>