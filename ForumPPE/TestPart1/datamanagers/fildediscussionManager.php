<?php
    include("data/fildediscussion.php");
    class fildediscussionManager
    {
        public static function deleteFilDeDiscussion($idFilDeDiscussion)
        {
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("DELETE FROM FilDeDiscussion WHERE idFilDeDiscussion = ?");
            $state->bindParam(1,$idFilDeDiscussion);
            $state->execute();
        }

        public static function cloreFil($idFilDeDiscussion)
        {
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("UPDATE FilDeDiscussion SET isFilDeDiscussionClos = 1 WHERE idFilDeDiscussion = ?");
            $state->bindParam(1,$idFilDeDiscussion);
            $state->execute();
        }

        public static function reouvrirFil($idFilDeDiscussion)
        {
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("UPDATE FilDeDiscussion SET isFilDeDiscussionClos = 0 WHERE idFilDeDiscussion = ?");
            $state->bindParam(1,$idFilDeDiscussion);
            $state->execute();
        }

        public static function gelLastIdFilDeDiscussion()
        {
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("SELECT * FROM FilDeDiscussion ORDER BY idFilDeDiscussion DESC LIMIT 1");
            $state->execute();
            $resultat = $state->fetchAll();
            foreach ($resultat as $lineResultat) 
            {
                $t = $lineResultat["idFilDeDiscussion"];
            }
            return $t;
        }

        public static function getFilDeDiscussionWithId($idFilDeDiscussion)
        {
            $fil = new fildediscussion();
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("SELECT * FROM FilDeDiscussion WHERE idFilDeDiscussion=?");
            $state->bindParam(1,$idFilDeDiscussion);
            $state->execute();
            $resultat = $state->fetchAll();
            foreach ($resultat as $ligneResultat) 
            {
                $fil->setIdFilDeDiscussion($ligneResultat["idFilDeDiscussion"]);
                $fil->setDateCreation($ligneResultat["dateOuverture"]);
                $fil->setTitreFilDeDiscussion($ligneResultat["titreFilDeDiscussion"]);
                $fil->setThemeFilDeDiscussion($ligneResultat["Theme"]);
                $fil->setIsFilDeDiscussionClos($ligneResultat["isFilDeDiscussionClos"]);
                $fil->setIdCreateur($ligneResultat["idCreateur"]);
            }
            return $fil;
        }
        public static function findAllMessage($idFilDeDiscussion)
        {
            $tab= array();
            $connex=DatabaseLinker::getConnexion();
            $state=$connex->prepare("SELECT * FROM Message WHERE idFilDeDiscussion=?");
            $state->bindParam(1,$idFilDeDiscussion);
            $state->execute();
            $result = $state->fetchALL();
            foreach ($result as $ligneResultat) 
            {
                $message = new Message();
                $message->setIdMessage($ligneResultat["idMessage"]);
                $message->setDateEnvoi($ligneResultat["dateEnvoi"]);
                $message->setLibelle($ligneResultat["libelle"]);
                $message->setTitreMessage($ligneResultat["titreMessage"]);
                $message->setIdFilDeDiscussion($ligneResultat["idFilDeDiscussion"]);
                $message->setIdAuteur($ligneResultat["idAuteur"]);
                $tab[] = $message;
            }
            return $tab;
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
        public static function getCreateurWithId($idFilDeDiscussion)
        {
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("SELECT nomCompte FROM Compte INNER JOIN FilDeDiscussion ON FilDeDiscussion.idCreateur = Compte.idCompte WHERE idFilDeDiscussion=?");
            $state->bindParam(1,$idFilDeDiscussion);
            $state->execute();
            $resultat = $state->fetchAll();
            $compte = new Compte();
            foreach ($resultat as $ligneResultat) 
            {
                $compte->setNomCompte($ligneResultat["nomCompte"]);
            }
            return $compte;
        }
        public static function CreateNewFil($titreFilDeDiscussion,$Theme,$idCreateur)
        {
            $fildediscute = new fildediscussion();
            
            $bdd = DatabaseLinker::getConnexion();
            $state = $bdd->prepare("INSERT INTO FilDeDiscussion(titreFilDeDiscussion,dateOuverture,Theme,idCreateur) Values (?,CURDATE(),?,?)");
            $state->bindParam(1, $titreFilDeDiscussion);
            $state->bindParam(2, $Theme);
            $state->bindParam(3,$idCreateur);
            $state->execute();
            $resultats = $state->fetchAll();
            foreach ($resultats as $lineResultat)
            {
                $this->idFilDeDiscussion = $lineResultat["idFilDeDiscussion"];
                $this->Theme = $lineResultat["Theme"];
                $this->dateOuverture = $lineResultat["dateOuverture"];
                $this->idCreateur = $lineResultat["idCreateur"];
            }
        }
        public static function RechercheBarre($recherche)
        {
            $demande = "%".$recherche."%";
            $tab= array();
            $connex=DatabaseLinker::getConnexion();
            $state=$connex->prepare('SELECT * FROM FilDeDiscussion WHERE titreFilDeDiscussion LIKE ?');
            $state->bindParam(1,$demande);
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
        
    }
?>