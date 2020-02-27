<?php
	include("header.php");
	include("datamanagers/DatabaseLinker.php");
	include("data/fildediscussion.php");
	include("data/compte.php");
	include("data/message.php");
?>
<?php
	session_start();
	if (isset($_SESSION["idUser"])) 
	{
		include("BarreDeNavCo.php");
?>
		<div class="page">
		<div class="contentPage">
			<div class="milieu">
		        <?php
		        	$typeTriFilDeDiscussion = "dateOuverture ASC";
					$tabFilDeDiscussion = FilDeDiscussion::getAllFilDeDiscussion($typeTriFilDeDiscussion);
					$taille = sizeof($tabFilDeDiscussion)/6;
					$reste = fmod(sizeof($tabFilDeDiscussion),6);
					if (empty($_GET["pages"])|| $_GET["pages"]=="1")
					{
						for ($i=1; $i < 12; $i++) 
			            { 
							$fildediscussion = new FilDeDiscussion();
							$fildediscussion->getIdFilDeDiscussionWithId($i);
							$createur = FilDeDiscussion::getCreateurWithId($i);
					        echo '<a class="lien" href="Forum.php?index='.$fildediscussion->getIdFilDeDiscussion().'">';
								echo '<div class="box">';
									echo '<div class="Content">';
										echo '<img class="imageTheme" src="image/Theme/'.$fildediscussion->getThemeFilDeDiscussion().'.png">';
										echo '<div>';
											echo '<div class="titre">'.$fildediscussion->getTitreFilDeDiscussion().'</div>';
											echo '<div class="sousTitre">'.'Créateur : '.$createur->getNomCompte().'<br> Thème : '.$fildediscussion->getThemeFilDeDiscussion().'<br> date ouverture : '.$fildediscussion->getDateCreation().'</div>';
										echo '</div>
									</div>
								</div>
							</a>';
						}
					}
					$cpt=12;
					if (!empty($_GET["pages"])) 
					{
						if ($_GET["pages"]=="2") 
						{
							for ($i=$cpt; $i < $cpt+12; $i++) 
				            { 
								$fildediscussion = new FilDeDiscussion();
								$fildediscussion->getIdFilDeDiscussionWithId($i);
								$createur = FilDeDiscussion::getCreateurWithId($i);
								if (!empty($fildediscussion->getIdFilDeDiscussion())) 
								{
									echo '<a class="lien" href="Forum.php?index='.$fildediscussion->getIdFilDeDiscussion().'">';
										echo '<div class="box">';
											echo '<div class="Content">';
												echo '<img class="imageTheme" src="image/Theme/'.$fildediscussion->getThemeFilDeDiscussion().'.png">';
												echo '<div>';
													echo'<div class="titre">'.$fildediscussion->getTitreFilDeDiscussion().'</div>';
													echo '<div class="sousTitre">'.'Créateur : '.$createur->getNomCompte().'<br> Thème : '.$fildediscussion->getThemeFilDeDiscussion().'<br> date ouverture : '.$fildediscussion->getDateCreation().'</div>';
												echo '</div>
											</div>
										</div>
									</a>';
								}
						        
							}
						}
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
	else
	{
		include("BarreDeNavNonCo.php");
	?>
	<div class="page">
		<div class="contentPage">
			<div class="milieu">
		        <?php
		        	$typeTriFilDeDiscussion = "dateOuverture ASC";
					$tabFilDeDiscussion = FilDeDiscussion::getAllFilDeDiscussion($typeTriFilDeDiscussion);
					$taille = sizeof($tabFilDeDiscussion)/6;
					$reste = fmod(sizeof($tabFilDeDiscussion),6);
					if (empty($_GET["pages"])|| $_GET["pages"]=="1")
					{
						for ($i=1; $i < 12; $i++) 
			            { 
							$fildediscussion = new FilDeDiscussion();
							$fildediscussion->getIdFilDeDiscussionWithId($i);
							$createur = FilDeDiscussion::getCreateurWithId($i);
					        echo '<a class="lien" href="Forum.php?index='.$fildediscussion->getIdFilDeDiscussion().'">';
								echo '<div class="box">';
									echo '<div class="Content">';
										echo '<img class="imageTheme" src="image/Theme/'.$fildediscussion->getThemeFilDeDiscussion().'.png">';
										echo '<div>';
											echo'<div class="titre">'.$fildediscussion->getTitreFilDeDiscussion().'</div>';
											echo '<div class="sousTitre">'.'Créateur : '.$createur->getNomCompte().'<br> Thème : '.$fildediscussion->getThemeFilDeDiscussion().'<br> date ouverture : '.$fildediscussion->getDateCreation().'</div>';
										echo '</div>
									</div>
								</div>
							</a>';
						}
					}
					$cpt=12;
					if (!empty($_GET["pages"])) 
					{
						if ($_GET["pages"]=="2") 
						{
							for ($i=$cpt; $i < $cpt+12; $i++) 
				            { 
								$fildediscussion = new FilDeDiscussion();
								$fildediscussion->getIdFilDeDiscussionWithId($i);
								$createur = FilDeDiscussion::getCreateurWithId($i);
								if (!empty($fildediscussion->getIdFilDeDiscussion())) 
								{
									echo '<a class="lien" href="Forum.php?index='.$fildediscussion->getIdFilDeDiscussion().'">';
										echo '<div class="box">';
											echo '<div class="Content">';
												echo '<img class="imageTheme" src="image/Theme/'.$fildediscussion->getThemeFilDeDiscussion().'.png">';
												echo '<div>';
													echo'<div class="titre">'.$fildediscussion->getTitreFilDeDiscussion().'</div>';
													echo '<div class="sousTitre">'.'Créateur : '.$createur->getNomCompte().'<br> Thème : '.$fildediscussion->getThemeFilDeDiscussion().'<br> date ouverture : '.$fildediscussion->getDateCreation().'</div>';
												echo '</div>
											</div>
										</div>
									</a>';
								}
						        
							}
						}
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