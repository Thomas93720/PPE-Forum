<?php
    class fildediscussionManager
    {
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

        
        public static function CreateNewFilSQL($fildediscute)
        {
            $bdd = DatabaseLinker::getConnexion();
            $state = $bdd->prepare("INSERT INTO fildediscussion(idFilDeDiscussion, titreFilDeDiscussion, isFilDeDiscussionClos, dateOuverture, Theme, idCreateur) VALUES(?, ?, ?, ?, ?, ?);");

            $state->bindParam(1, $fildediscute->getIdFilDeDiscussion());
            $state->bindParam(2, $fildediscute->getTitreFilDeDiscussion());
            $state->bindParam(3, $fildediscute->getIsFilDeDiscussionClos());
            $state->bindParam(4, $fildediscute->getDateCreation());
            $state->bindParam(5, $fildediscute->getThemeFilDeDiscussion());
            $state->bindParam(6, $fildediscute->getIdCreateur());
            $state->execute();
        }
        
        public static function CreateNewFil($ID, $Titre, $Theme, $IDcompte)
        {
            $fildediscute = new FilDeDiscussion();
            
            $fildediscute->setIdFilDeDiscussion($ID);
            $fildediscute->setTitreFilDeDiscussion($Titre);
            $fildediscute->setIsFilDeDiscussionClos(false);
            $fildediscute->setDateCreation(curdate());
            $fildediscute->setThemeFilDeDiscussion($Theme);
            $fildediscute->setIdCreateur($IDcompte);
            
            CreateNewFilSQL($fildediscute);
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
    }

?>
