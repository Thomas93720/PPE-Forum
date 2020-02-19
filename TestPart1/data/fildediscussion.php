<?php
    class FilDeDiscussion
    {
        private $idFilDeDiscussion;
        private $isFilDeDiscussionClos;
        private $titreFilDeDiscussion;
        private $dateCreation;
        private $theme;
        
        public function getIsFilDeDiscussionClos() {
            return $this->FilDeDiscussionClos;
        }

        public function setIsFilDeDiscussionClos($FilDeDiscussionClos) {
            $this->FilDeDiscussionClos = $FilDeDiscussionClos;
        }

        public function getIdFilDeDiscussion() {
            return $this->idFilDeDiscussion;
        }

        public function getTitreFilDeDiscussion() {
            return $this->titreFilDeDiscussion;
        }

        public function getDateCreation() {
            return $this->dateCreation;
        }
        public function getThemeFilDeDiscussion() {
            return $this->theme;
        }

        public function setIdFilDeDiscussion($idFilDeDiscussion) {
            $this->idFilDeDiscussion = $idFilDeDiscussion;
        }

        public function setTitreFilDeDiscussion($titreFilDeDiscussion) {
            $this->titreFilDeDiscussion = $titreFilDeDiscussion;
        }

        public function setDateCreation($dateCreation) {
            $this->dateCreation = $dateCreation;
        }

        public function setThemeFilDeDiscussion($theme) {
            $this->theme = $theme;
        }
        public function getIdFilDeDiscussionWithId($idFilDeDiscussion)
        {
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("SELECT * FROM FilDeDiscussion WHERE idFilDeDiscussion=?");
            $state->bindParam(1,$idFilDeDiscussion);
            $state->execute();
            $resultat = $state->fetchAll();
            foreach ($resultat as $ligneResultat) 
            {
                $this->idFilDeDiscussion = $ligneResultat["idFilDeDiscussion"];
                $this->dateCreation = $ligneResultat["dateOuverture"];
                $this->titreFilDeDiscussion = $ligneResultat["titreFilDeDiscussion"];
                $this->theme = $ligneResultat["Theme"];
                $this->isFilDeDiscussionClos = $ligneResultat["isFilDeDiscussionClos"];
            }
        }
        public static function getAllFilDeDiscussion($typeTri)
        {
            $tab= array();
            $connex=DatabaseLinker::getConnexion();
            $state=$connex->prepare("SELECT * FROM FilDeDiscussion ORDER BY ".$typeTri);
            $state->execute();
            $result = $state->fetchALL();
            foreach ($result as $ligneResult) 
            {
                $user = new FilDeDiscussion();
                $user->setIdFilDeDiscussion($ligneResult["idFilDeDiscussion"]);
                $user->setDateCreation($ligneResult["dateOuverture"]);
                $user->setTitreFilDeDiscussion($ligneResult["titreFilDeDiscussion"]);
                $user->setThemeFilDeDiscussion($ligneResult["Theme"]);
                $user->setIsFilDeDiscussionClos($ligneResult["isFilDeDiscussionClos"]);
                $tab[] = $user;
            }
            return $tab;
        }      
        public static function getCreateurWithId($idCreateur)
        {
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("SELECT nomCompte FROM Compte INNER JOIN FilDeDiscussion ON FilDeDiscussion.idCreateur = Compte.idCompte WHERE idFilDeDiscussion=?");
            $state->bindParam(1,$idCreateur);
            $state->execute();
            $resultat = $state->fetchAll();
            $compte = new Compte();
            foreach ($resultat as $ligneResultat) 
            {
                $compte->setNomCompte($ligneResultat["nomCompte"]);
            }
            return $compte;
        }
    }
?>