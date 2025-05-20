<?php

interface IVehicule {

    public function getType();
    public function calculerTarif(int $nbJours);
    public function estRentable();
    public function afficherInfosGenerales();

}

?>