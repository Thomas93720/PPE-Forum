<?php
    include("data/fildediscussion.php");
    class fildediscussionManager
    {
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
            }
            return $fil;
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