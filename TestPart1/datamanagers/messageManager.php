<?php
    include_once("data/message.php");
    class messageManager
    {
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
        public static function deleteMessageFromFilDeDiscussion($idFilDeDiscussion)
        {
            
            $connex=DatabaseLinker::getConnexion();
            $state=$connex->prepare("DELETE FROM Message WHERE idFilDeDiscussion = ?");
            $state->bindParam(1,$idFilDeDiscussion);
            $state->execute();
        }
        public static function insertMessage($message)
        {
            $content = $message->getLibelle();
            $idAuteur = $message->getIdAuteur();
            $idFilDeDiscussion = $message->getIdFilDeDiscussion();
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("INSERT INTO Message(idAuteur,dateEnvoi,libelle,idFilDeDiscussion) VALUES(?,CURDATE(),?,?)");
            $state->bindParam(1,$idAuteur);
            $state->bindParam(2,$content);
            $state->bindParam(3,$idFilDeDiscussion);
            $state->execute();
        }
        public static function deleteMessage($idMessage)
        {
            $bdd=DatabaseLinker::getConnexion();
            $state = $bdd->prepare("DELETE FROM Message WHERE idMessage = ?");
            $state->bindParam(1,$idMessage);
            $state->execute();
        }
    }
?>