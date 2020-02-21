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
        private $email;
        

        function getEmail() {
            return $this->email;
        }

        function setEmail($email) {
            $this->email = $email;
        }

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
        public function initCompte($idCompte)
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
                $this->dateDebutBan = $ligneResultat["dateDebutBan"];
                $this->dateFinBan = $ligneResultat["dateFinBan"];
                $this->motDePasse = $ligneResultat["motDePasse"];
            }
        }
        public static function identification($mdp,$login)
        {
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("SELECT * FROM Compte WHERE motDePasse = ? AND login = ?");
            $state->bindParam(1,$mdp);
            $state->bindParam(2,$login);
            $state->execute();
            $resultat = $state->fetchAll();
            foreach ($resultat as $ligneResultat) 
            {
                $user = new Compte();
                $user->setIdCompte($ligneResultat["idCompte"]);
                $user->setNomCompte($ligneResultat["nomCompte"]);
                $user->setIdMessage($ligneResultat["idMessage"]);
                $user->setDateCreation($ligneResultat["dateCreation"]);
                $user->setLogin($ligneResultat["login"]);
                $user->setMotDePasse($ligneResultat["motDePasse"]);
                return $user;
            }
            return null;
        }
        public static function findFilDeDiscussion()
        {
            $tab= array();
            $connex=DatabaseLinker::getConnexion();
            $state=$connex->prepare("SELECT * FROM Compte");
            $state->execute();
            $result = $state->fetchALL();
            foreach ($result as $ligneResult) 
            {
                $findFilDeDiscussion = new Timbre();
                $findFilDeDiscussion->setIdCompte($ligneResult["idCompte"]);
                $findFilDeDiscussion->setNomCompte($ligneResult["titre"]);
                $findFilDeDiscussion->setMotDePasse($ligneResult["motDePasse"]);
                $findFilDeDiscussion->setDateCreation($ligneResult["dateCreation"]);
                $findFilDeDiscussion->setIdMessage($ligneResult["idMessage"]);
                $findFilDeDiscussion->setDateDebutBan($ligneResult["dateDebutBan"]);
                $findFilDeDiscussion->setDateFinBan($ligneResult["dateFinBan"]);
                $tab[] = $findFilDeDiscussion;
            }
            return $tab;
        }
    }
    
    
    
?>
