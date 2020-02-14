<?php
    class Message
    {
        private $idMessage;
        private $libelle;
        private $dateEnvoi;
        private $titreMessage;
        private $idFilDeDiscussion;
        
        function getIdMessage() {
            return $this->idMessage;
        }

        function getLibelle() {
            return $this->libelle;
        }

        function getDateEnvoi() {
            return $this->dateEnvoi;
        }

        function getTitreMessage() {
            return $this->titreMessage;
        }

        function getIdFilDeDiscussion() {
            return $this->idFilDeDiscussion;
        }

        function setIdMessage($idMessage) {
            $this->idMessage = $idMessage;
        }

        function setLibelle($libelle) {
            $this->libelle = $libelle;
        }

        function setDateEnvoi($dateEnvoi) {
            $this->dateEnvoi = $dateEnvoi;
        }

        function setTitreMessage($titreMessage) {
            $this->titreMessage = $titreMessage;
        }

        function setIdFilDeDiscussion($idFilDeDiscussion) {
            $this->idFilDeDiscussion = $idFilDeDiscussion;
        }
        public function getIdMessageWithId($idMessage)
        {
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("SELECT * FROM Message WHERE idMessage=?");
            $state->bindParam(1,$idMessage);
            $state->execute();
            $resultat = $state->fetchAll();
            foreach ($resultat as $ligneResultat) 
            {
                $this->idMessage = $ligneResultat["idMessage"];
                $this->dateEnvoi = $ligneResultat["dateEnvoi"];
                $this->libelle = $ligneResultat["libelle"];
                $this->titreMessage = $ligneResultat["titreMessage"];
                $this->idFilDeDiscussion = $ligneResultat["idFilDeDiscussion"];
            }
        }
        public static function getAllMessage($typeTri)
        {
            $tab= array();
            $connex=DatabaseLinker::getConnexion();
            $state=$connex->prepare("SELECT * FROM Message ORDER BY ".$typeTri);
            $state->execute();
            $result = $state->fetchALL();
            foreach ($result as $ligneResult) 
            {
                $msg = new Message();
                $msg->setIdMessage($ligneResult["idMessage"]);
                $msg->setDateEnvoi($ligneResult["dateEnvoi"]);
                $msg->setLibelle($ligneResult["libelle"]);
                $msg->setTitreMessage($ligneResult["titreMessage"]);
                $msg->setIdFilDeDiscussion($ligneResult["idFilDeDiscussion"]);
                $tab[] = $msg;
            }
            return $tab;
        }

    }
?>
