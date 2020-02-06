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
        
        public function getIdCompte() {
            return $this->idCompte;
        }

        public function getIsCompteBanni() {
            return $this->isCompteBanni;
        }

        public function getDateDebutBan() {
            return $this->dateDebutBan;
        }

        public function getDateFinBan() {
            return $this->dateFinBan;
        }

        public function getMotDePasse() {
            return $this->motDePasse;
        }

        public function getLogin() {
            return $this->login;
        }

        public function getDateCreation() {
            return $this->dateCreation;
        }

        public function getNomCompte() {
            return $this->nomCompte;
        }

        public function getIdMessage() {
            return $this->idMessage;
        }

        public function getConnexion() {
            return $this->connexion;
        }

        public function setIdCompte($idCompte) {
            $this->idCompte = $idCompte;
        }

        public function setIsCompteBanni($isCompteBanni) {
            $this->isCompteBanni = $isCompteBanni;
        }

        public function setDateDebutBan($dateDebutBan) {
            $this->dateDebutBan = $dateDebutBan;
        }

        public function setDateFinBan($dateFinBan) {
            $this->dateFinBan = $dateFinBan;
        }

        public function setMotDePasse($motDePasse) {
            $this->motDePasse = $motDePasse;
        }

        public function setLogin($login) {
            $this->login = $login;
        }

        public function setDateCreation($dateCreation) {
            $this->dateCreation = $dateCreation;
        }

        public function setNomCompte($nomCompte) {
            $this->nomCompte = $nomCompte;
        }

        public function setIdMessage($idMessage) {
            $this->idMessage = $idMessage;
        }

        public function setConnexion($connexion) {
            $this->connexion = $connexion;
        }
        
    }      
?>
