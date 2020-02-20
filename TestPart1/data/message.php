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
        

    }
?>
