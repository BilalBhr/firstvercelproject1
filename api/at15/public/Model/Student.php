<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student
 *
 * @author Admin
 */
class Student {
    //declaration des attributs
    
    private $nom,$prenom,$ville,$image;
    
    // constructeur 
    
    function __construct($nom, $prenom, $ville, $image) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->ville = $ville;
        $this->image = $image;
    }

    
    // accesseurs et modificateurs 
    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getVille() {
        return $this->ville;
    }

    function getImage() {
        return $this->image;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }

    function setImage($image) {
        $this->image = $image;
    }

 
    
    
    
    
    
    
}
