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
        public static function banCompteDef($idCompte)
        {
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("UPDATE Compte SET isCompteBanni = 1 WHERE idCompte = ?");
            $state->bindParam(1,$idCompte);
            $state->execute();
        }
        public static function banCompteTemp($idCompte,$raison,$dateFin)
        {
            $bdd=DatabaseLinker::getConnexion($dateFin,$idCompte,$raison);
            $state = $bdd->prepare("UPDATE Compte SET dateDebutBan = CURDATE(),dateFinBan=? ,isCompteBanni=1,raisonBan = ? WHERE idCompte = ?");
            $state->bindParam(1,$dateFin);
            $state->bindParam(2,$raison);
            $state->bindParam(3,$idCompte);
            $state->execute();
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
                $this->cheminPhoto = $ligneResultat["cheminPhoto"];
                $this->biographie = $ligneResultat["biographie"];
            }
        }
        public static function cheminPhoto($idCompte,$cheminPhoto)
        {
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("UPDATE Compte SET cheminPhoto = ? WHERE idCompte = ?");
            $state->bindParam(1,$cheminPhoto);
            $state->bindParam(2,$idCompte);
            $state->execute();
        }
        public static function isCompteBan($idCompte)
        {
            $use = new Compte();
            $use->initCompte($idCompte);
            if ($use->getIsCompteBanni()) 
            {
                return 1;
            }
            return 0;
        }
        public static function isCompteAdmin($idCompte)
        {
            $use = new Compte();
            $use->initCompte($idCompte);
            if ($use->getIsCompteAdmin()) 
            {
                return 1;
            }
            return 0;
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
                $user->setBiographie($ligneResultat["biographie"]);
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
                $findFilDeDiscussion = new fildediscussion();
                $findFilDeDiscussion->setIdCompte($ligneResult["idCompte"]);
                $findFilDeDiscussion->setNomCompte($ligneResult["titre"]);
                $findFilDeDiscussion->setMotDePasse($ligneResult["motDePasse"]);
                $findFilDeDiscussion->setDateCreation($ligneResult["dateCreation"]);
                $findFilDeDiscussion->setIdMessage($ligneResult["idMessage"]);
                $findFilDeDiscussion->setDateDebutBan($ligneResult["dateDebutBan"]);
                $findFilDeDiscussion->setDateFinBan($ligneResult["dateFinBan"]);
                $findFilDeDiscussion->setBiographie($ligneResultat["biographie"]);
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
            $state = $bdd->prepare("INSERT INTO Compte(nomCompte, email, motDePasse, dateCreation, login)VALUES (?,?,?, CURDATE(), ?)");
            $nomCompte = $compte->getNomCompte();
            $login = $compte->getLogin();
            $email = $compte->getEmail();
            $mdp = $compte->getMotDePasse();
            $state->bindParam(1, $nomCompte);
            $state->bindParam(2, $email);
            $state->bindParam(3, $mdp);
            $state->bindParam(4, $login);

            $state->execute();
        }
        public static function getCompteWithId($id)
        {
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("SELECT * FROM Compte WHERE idCompte = ?");
            $state->bindParam(1, $id);
             $state->execute();

            $resultat = $state->fetchAll();
            $compte = new Compte();
            foreach ($resultat as $ligneResultat) 
            {
                $compte->setIdCompte($ligneResultat["idCompte"]);
                $compte->setNomCompte($ligneResultat["nomCompte"]);
                $compte->setIdMessage($ligneResultat["idMessage"]);
                $compte->setDateCreation($ligneResultat["dateCreation"]);
                $compte->setLogin($ligneResultat["login"]);
                $compte->setDateDebutBan($ligneResultat["dateDebutBan"]);
                $compte->setDateFinBan($ligneResultat["dateFinBan"]);
                $compte->setMotDePasse($ligneResultat["motDePasse"]);
                $compte->setBiographie($ligneResultat["biographie"]);
            }
            return $compte;
        }
    }
?>