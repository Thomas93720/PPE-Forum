<?php
    include_once("data/compte.php");
    class compteManager
    {
        
        public static function getIdCompteRegister($compte)
        {
            $login = $compte->getLogin();
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("SELECT idCompte FROM Compte WHERE login LIKE ?");
            $state->bindParam(1,$login);

            $state->execute();

            $resultat = $state->fetchAll();

            foreach ($resultat as $ligneResultat) 
            {
                $compte->setIdCompte = $ligneResultat["idCompte"];
                $id = $ligneResultat["idCompte"];
            }
            return $id;
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
        public static function findFilDeDiscussion($typeTri)
        {
            $tab= array();
            $connex=DatabaseLinker::getConnexion();
            $state=$connex->prepare("SELECT * FROM Compte ORDER BY ".$typeTri);
            $state->execute();
            $result = $state->fetchALL();
            foreach ($result as $ligneResult) 
            {
                $findFilDeDiscussion = new fildediscussion();
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
        
        public static function VerifNewId($login)
        {
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("SELECT * FROM Compte WHERE  nomCompte LIKE ?");
            $state->bindParam(1,$login);
            $state->execute();
            $resultat = $state->fetchAll();
            if(empty($resultat))
            {
                $valide = true;
            }
            else
            {
                $valide = false;
            }
            return $valide;
        }
        
        public static function CreateNewCompte($compte)
        {
            $bdd=DatabaseLinker::getConnexion();
            $nomCompte = $compte->getNomCompte();
            $login = $compte->getLogin();
            $email = $compte->getEmail();
            $mdp = $compte->getMotDePasse();
            $state = $bdd->prepare("INSERT INTO compte(nomCompte, email, motDePasse, dateCreation, login)VALUES (?,?,?, CURDATE(), ?)");
            $state->bindParam(1, $nomCompte);
            $state->bindParam(2, $email);
            $state->bindParam(3, $mdp);
            $state->bindParam(4, $login);
            
            $state->execute();
        }
        
    }
?>