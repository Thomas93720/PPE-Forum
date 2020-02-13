<?php
    include("data/compte.php");

    class CompteManager
    {
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