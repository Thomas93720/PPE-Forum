<?php
	include("header.php");
	include("datamanagers/DatabaseLinker.php");
	include("datamanagers/fildediscussionManager.php");
	include("datamanagers/compteManager.php");
	include("datamanagers/messageManager.php");
?>
<?php
	session_start();
	if (isset($_SESSION["idUser"])) 
	{
		include("BarreDeNavCo.php");
?>
		<?php
		if (!empty($_POST["delete"])) 
		{
			fildediscussionManager::deleteFilDeDiscussion($_POST["delete"]);
			messageManager::deleteMessageFromFilDeDiscussion($_POST["delete"]);
		}
		if (!empty($_POST["clore"])) 
		{
			fildediscussionManager::cloreFil($_POST["clore"]);
		}
		?>
		<FORM method="GET" class="formTri">
			<SELECT name="typeTri" size="1">
				<OPTION>-- Trier --
				<OPTION value="date">Date
				<OPTION value="nom">Nom
				<OPTION value = "theme">Theme
			</SELECT>
			<input type="submit" name="trier">
		</FORM>
		<div class="page">
		<div class="contentPage">
			<div class="milieu">
		        <?php
		        $typeTriFilDeDiscussion = "dateOuverture ASC";
		        if (!empty($_GET["typeTri"])){
		        	switch($_GET["typeTri"]) 
		        	{
		        		case "date" :
		        			$typeTriFilDeDiscussion = "dateOuverture ASC";
		        			break;
		        		case "nom" :
		        			$typeTriFilDeDiscussion = "titreFilDeDiscussion ASC";
		        			break;
		        		case "theme" :
		        			$typeTriFilDeDiscussion = "Theme ASC";
		        			break;
		        	}
		        }
					$tabFilDeDiscussion = FilDeDiscussion::getAllFilDeDiscussion($typeTriFilDeDiscussion);
					$taille = sizeof($tabFilDeDiscussion)/6;
					 	if(isset($_POST["recherche"])) 
	                    {
	                      if(!empty($_POST["q"]))  
	                      {     
	                        $tabFilDeDiscussion = fildediscussionManager::RechercheBarre($_POST["q"]);
	                      }
	                    }

					//$reste = fmod(sizeof($tabFilDeDiscussion),6);
					if (sizeof($tabFilDeDiscussion)==0&&empty($_POST["q"])) 
					{
						echo "<h1>Il n'y a plus aucun fils de discussion actuellement !</h1>";
						echo '<a href = "AjoutFilDeDiscussion.php"><h2>Créez-en un des maintenant</h2>';
					}
					else if(sizeof($tabFilDeDiscussion)==0&&!empty($_POST["q"]))
					{
						echo "<h1>Aucun fil de discussion contenant : ".$_POST["q"]." n'as été trouvé </h1>";
					}
						foreach ($tabFilDeDiscussion as $fildediscussion)
			            { 
		            		$createur = FilDeDiscussion::getCreateurWithId($fildediscussion->getIdFilDeDiscussion());
					        echo '<a class="lien" href="Forum.php?index='.$fildediscussion->getIdFilDeDiscussion().'">';
								echo '<div class="box">';
									echo '<div class="Content">';
										echo '<img class="imageTheme" src="image/Theme/'.$fildediscussion->getThemeFilDeDiscussion().'.png">';
										echo '<div>';
											$fdd = new FilDeDiscussion();
											$fdd->getIdFilDeDiscussionWithId($fildediscussion->getIdFilDeDiscussion());
											echo '<div class="titre">';
											if ($fdd->getIsFilDeDiscussionClos()) 
											{
												echo "[Résolu] ";
											}
											echo $fildediscussion->getTitreFilDeDiscussion().'</div>';
											echo '<div class="sousTitre">'.'Créateur : '.$createur->getNomCompte().'<br> Thème : '.$fildediscussion->getThemeFilDeDiscussion().'<br> Date Création : '.$fildediscussion->getDateCreation().'</div>';
										echo '</div>
									</div>
								</div>
							</a>';
							if (compteManager::isCompteAdmin($_SESSION["idUser"]))
							{
								?>
								<form method="POST">
									<button name="delete" <?php echo 'value="'.$fildediscussion->getIdFilDeDiscussion().'"'?>><i class="fas fa-trash-alt"></i> Supprimer</button>
									<button name="clore"  <?php echo 'value="'.$fildediscussion->getIdFilDeDiscussion().'"'?>><i class="far fa-window-close"></i> Clore</button>
								</form>
								<?php
							}
							else if ($_SESSION["idUser"]==$fildediscussion->getIdCreateur())
							{
								?>
								<form method="POST">
									<button name="delete" <?php echo 'value="'.$fildediscussion->getIdFilDeDiscussion().'"'?>><i class="fas fa-trash-alt"></i> Supprimer</button>
								</form>
								<?php
							}
		            	}
					?>
				
			</div>
			<div class="bas">
			<?php  
		  	/*for ($i=1; $i < $nbpages+1; $i++) 
		  	{ 
		  		echo '<a href="index.php?pages='.$i.'" class="nbPages">'.$i.'</a>';
		  	}*/
			?>
		</div>
		</div>
	</div>
			<?php
	}
	else
	{
		include("BarreDeNavNonCo.php");
	?>
		<FORM method="GET" class="formTri">
			<SELECT name="typeTri" size="1">
				<OPTION>-- Trier --
				<OPTION value="date">Date
				<OPTION value="nom">Nom
				<OPTION value = "theme">Theme
			</SELECT>
			<input type="submit" name="trier">
		</FORM>

		<div class="page">
		<div class="contentPage">
			<div class="milieu">
		        <?php
		        $typeTriFilDeDiscussion = "dateOuverture ASC";
		        if (!empty($_GET["typeTri"])){
		        	switch($_GET["typeTri"]) 
		        	{
		        		case "date" :
		        			$typeTriFilDeDiscussion = "dateOuverture ASC";
		        			break;
		        		case "nom" :
		        			$typeTriFilDeDiscussion = "titreFilDeDiscussion ASC";
		        			break;
		        		case "theme" :
		        			$typeTriFilDeDiscussion = "Theme ASC";
		        			break;
		        	}
		        }
					$tabFilDeDiscussion = FilDeDiscussion::getAllFilDeDiscussion($typeTriFilDeDiscussion);
     
                    if(isset($_POST["recherche"])) 
                    {
                      if(!empty($_POST["q"]))  
                      {     
                        $tabFilDeDiscussion = fildediscussionManager::RechercheBarre($_POST["q"]);
                      }
                    }

					$taille = sizeof($tabFilDeDiscussion)/6;
					$reste = fmod(sizeof($tabFilDeDiscussion),6);
					if (sizeof($tabFilDeDiscussion)==0&&empty($_POST["q"])) 
					{
						echo "<h1>Il n'y a plus aucun fils de discussion actuellement !</h1>";
					}
					else if(sizeof($tabFilDeDiscussion)==0&&!empty($_POST["q"]))
					{
						echo "<h1>Aucun fil de discussion contenant : ".$_POST["q"]." n'as été trouvé </h1>";
					}
						foreach ($tabFilDeDiscussion as $fildediscussion)
			            { 
		            		$createur = FilDeDiscussion::getCreateurWithId($fildediscussion->getIdFilDeDiscussion());
					        echo '<a class="lien" href="Forum.php?index='.$fildediscussion->getIdFilDeDiscussion().'">';
								echo '<div class="box">';
									echo '<div class="Content">';
										echo '<img class="imageTheme" src="image/Theme/'.$fildediscussion->getThemeFilDeDiscussion().'.png">';
										echo '<div>';
											$fdd = new FilDeDiscussion();
											$fdd->getIdFilDeDiscussionWithId($fildediscussion->getIdFilDeDiscussion());
											echo '<div class="titre">';
											if ($fdd->getIsFilDeDiscussionClos()) 
											{
												echo "[Résolu] ";
											}
											echo $fildediscussion->getTitreFilDeDiscussion().'</div>';
											echo '<div class="sousTitre">'.'Créateur : '.$createur->getNomCompte().'<br> Thème : '.$fildediscussion->getThemeFilDeDiscussion().'<br> Date Création : '.$fildediscussion->getDateCreation().'</div>';
										echo '</div>
									</div>
								</div>
							</a>';
					}
					 
					$nbpages = $taille;
						
					?>
				
			</div>
			<div class="bas">
			<?php  
		  	for ($i=1; $i < $nbpages+1; $i++) 
		  	{ 
		  		echo '<a href="index.php?pages='.$i.'" class="nbPages">'.$i.'</a>';
		  	}
			?>
		</div>
		</div>
	</div>
	<?php
	}
	?>
<?php
	include("footer.php");
?>