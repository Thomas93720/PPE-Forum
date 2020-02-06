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
        public function getCompteWithId($idCompte)
        {
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("SELECT * FROM Compte WHERE idCompte=?");
            $state->bindParam(1,$idCompte);
            $state->execute();
            $resultat = $state->fetchAll();
            foreach ($resultat as $ligneResultat) 
            {
                $this->idCompte = $ligneResultat["idCompte"];
                $this->nomCompte = $ligneResultat["nomCompte"];
                $this->idMessage= $ligneResultat["idMessage"];
                $this->dateCreation = $ligneResultat["dateCreation"];
                $this->login = $ligneResultat["login"];
                $this->isCompteBanni = $ligneResultat["isCompteBanni"];
                $this->dateDebutBan = $ligneResultat["dateDebutBan"];
                $this->dateFinBan = $ligneResultat["dateFinBan"];
                $this->motDePasse = $ligneResultat["motDePasse"];
            }
        }
        public static function getAllCompte($typeTri)
        {
            $tab= array();
            $connex=DatabaseLinker::getConnexion();
            $state=$connex->prepare("SELECT * FROM Compte ORDER BY ".$typeTri);
            $state->execute();
            $result = $state->fetchALL();
            foreach ($result as $ligneResult) 
            {
                $user = new Compte();
                $user->setIdCompte($ligneResult["idCompte"]);
                $user->setNomCompte($ligneResult["nomCompte"]);
                $user->setDateCreation($ligneResult["dateCreation"]);
                $user->setIdMessage($ligneResult["idMessage"]);
                $user->setMotDePasse($ligneResult["motDePasse"]);
                $user->setLogin($ligneResult["login"]);
                $user->setIsCompteBanni($ligneResult["isCompteBanni"]);
                $user->setDateDebutBan($ligneResult["dateDebutBan"]);
                $user->setDateFinBan($ligneResult["dateFinBan"]);
                $tab[] = $user;
            }
            return $tab;
        }
    }      
?>
