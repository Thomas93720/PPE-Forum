<?php
    class Compte
    {
        private $idCompte;
        private $isCompteBanni;
        private $dateDebutBan;
        private $dateFinBan;
        private $motDePasse;
        private $login;
        private $dateCreation;
        private $nomCompte;
        private $idMessage;
        private $connexion;

        function getIdCompte() {
            return $this->idCompte;
        }

        function getIdCompteBanni() {
            return $this->idCompteBanni;
        }

        function getDateDebutBan() {
            return $this->dateDebutBan;
        }

        function getDateFinBan() {
            return $this->dateFinBan;
        }

        function getMotDePasse() {
            return $this->motDePasse;
        }

        function getLogin() {
            return $this->login;
        }

        function getDateCreation() {
            return $this->dateCreation;
        }

        function getNomCompte() {
            return $this->nomCompte;
        }

        function getIdMessage() {
            return $this->idMessage;
        }

        function getConnexion() {
            return $this->connexion;
        }

        function setIdCompte($idCompte) {
            $this->idCompte = $idCompte;
        }

        function setIdCompteBanni($idCompteBanni) {
            $this->idCompteBanni = $idCompteBanni;
        }

        function setDateDebutBan($dateDebutBan) {
            $this->dateDebutBan = $dateDebutBan;
        }

        function setDateFinBan($dateFinBan) {
            $this->dateFinBan = $dateFinBan;
        }

        function setMotDePasse($motDePasse) {
            $this->motDePasse = $motDePasse;
        }

        function setLogin($login) {
            $this->login = $login;
        }

        function setDateCreation($dateCreation) {
            $this->dateCreation = $dateCreation;
        }

        function setNomCompte($nomCompte) {
            $this->nomCompte = $nomCompte;
        }

        function setIdMessage($idMessage) {
            $this->idMessage = $idMessage;
        }

        function setConnexion($connexion) {
            $this->connexion = $connexion;
        }
        
    }
?>
