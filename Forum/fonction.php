<?php
	include("fonction.php");
	ini_set('memory_limit', '1024M');
	class fonction
	{
		public static function getAuteurWithIdMessage($idMessage)
		{
			$bdd=DatabaseLinker::getConnexion();
	        $state = $bdd->prepare("SELECT * FROM FilDeDiscussion ");
	        $state->bindParam(1,$idFilDeDiscussion);
	        $state->execute();
	        $resultat = $state->fetchAll();
	        foreach ($resultat as $ligneResultat) 
	        {
	            $this->idFilDeDiscussion = $ligneResultat["idFilDeDiscussion"];
	            $this->setDateCreation = $ligneResultat["setDateCreation"];
	            $this->setTitreFilDeDiscussion = $ligneResultat["titreFilDeDiscussion"];
	            $this->setThemeFilDeDiscussion = $ligneResultat["Theme"];
	            $this->setIsFilDeDiscussionClos = $ligneResultat["isFilDeDiscussionClos"];
	        }
		}
		
	}
	?>

	<?php
		//deconnexion
	   session_start();
	   
	   if(session_destroy()) 
	   {
	      header("Location: login.php");
	   }
	?>
?>