<?php
    include("data/fildediscussion.php");
	
    class FilDeDiscussion
    {
        private $idFilDeDiscussion;
        private $isFilDeDiscussionClos;
        private $titreFilDeDiscussion;
        private $dateCreation;
        private $theme;
        private $idCreateur;
        
        function getIdCreateur() {
            return $this->idCreateur;
        }

        function setIdCreateur($idCreateur) {
            $this->idCreateur = $idCreateur;
        }

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
        
        
    }
?>