<?php
	include("HeaderForum.php");
	include("datamanagers/compteManager.php");
	include("datamanagers/messageManager.php");
	include("datamanagers/DatabaseLinker.php");
	include("datamanagers/fildediscussionManager.php");
	
	
	if (!empty($_GET["index"])) 
	{
		session_start();  
		if(isset($_SESSION["idUser"]))  
		{
			if (!empty($_POST["delete"])) 
			{
				messageManager::deleteMessage($_POST["delete"]);
			}
			if (!empty($_POST["bandef"])) 
			{
				compteManager::banCompteDef($_POST["bandef"]);

			}
			$utilisateur = new Compte();
			$utilisateur->initCompte($_SESSION["idUser"]);
			$nom = $utilisateur->getNomCompte();
			include("BarreDeNavCo.php");
			?>
				<?php
					/*<div class="gauche">
					<div class="profilCard">
				        <div class="Container">
					        <h4 class="TitreProfil">Mon profile</h4>
					        <p class="Avatar"><img src="https://www.shareicon.net/data/2016/09/01/822739_user_512x512.png" class="imageCercle" alt="pp"></p>
					        <hr>
					        <p><i class="description"></i><i class="fas fa-address-card"></i><?php echo ' '.$utilisateur->getNomCompte(); ?></i></p>
					        <p><i class="description"><i class="far fa-calendar-alt"></i><?php echo ' '.$utilisateur->getDateCreation(); ?></i></p>
					        <p><i class="description"><i class="fas fa-comments"></i><?php echo ' '.$utilisateur->getIdMessage().' messages'; //mettre un count(methode)?></i>
					        </p> 
				        </div>
			        </div>
				</div>*/
			$id = $_GET["index"];
			$fildediscussion = new FilDeDiscussion();
			$fildediscussion->getIdFilDeDiscussionWithId($id);
			$createur = FilDeDiscussion::getCreateurWithId($id);
			if (!empty($_POST["message"]))
			{
				$msg = new Message();
				$msg->setLibelle($_POST["message"]);
				$msg->setIdAuteur($_SESSION["idUser"]);
				$msg->setIdFilDeDiscussion($id);
				messageManager::insertMessage($msg);
			} 
			if ($_GET["index"])
			{ 
				echo '<h1>';
				if ($fildediscussion->getIsFilDeDiscussionClos())
				{
					echo "[Résolu] ";
				} 
				echo $fildediscussion->getTitreFilDeDiscussion().'</h1>';
				$msg = fildediscussionManager::findAllMessage($id);
				echo '<p>Crée par : <a style="color: white; text-decoration: none;" href="profil.php?idProfil='.$fildediscussion->getIdCreateur().'">'.$createur->getNomCompte().'</a></p>';
				echo '<p>le : '.$fildediscussion->getDateCreation().'</p>';
				echo '<p>'.sizeof($msg)." message(s)".'</p>';
				echo '<hr>';
				echo "<br>";
				$user = new Compte();
				
				foreach ($msg as $linemsg) 
				{
			    	?>
			    	<div class="messages"><br>
			  			<div class="topMsg">
					        <img src="https://www.shareicon.net/data/2016/09/01/822739_user_512x512.png" alt="Avatar" class="avatar">
					        <div class="titreNomCompte"><a style="color: black; text-decoration: none;"<?php echo 'href="profil.php?idProfil='.$linemsg->getIdAuteur().'"'?><h4><?php $user->initCompte($linemsg->getIdAuteur()); echo ' '.$user->getNomCompte(); ?></h4></a></div><br>
					        <?php
						        if ($utilisateur->getIsCompteAdmin())
						        {

									echo '
									<form method="POST">
										<div>
											<button name = "delete" value = "'.$linemsg->getIdMessage().'"><i class="fas fa-minus"></i> Supprimer</button>
											<button name = "modif" value="'.$linemsg->getIdMessage().'"><i class="fas fa-pen"></i> Modifier</button>';
											if ($utilisateur->getIdCompte()!=$user->getIdCompte()) 
											{
												echo '<a href="bantemp.php?idCompte='.$linemsg->getIdAuteur().'"><i class="fas fa-user-times"></i> bannir temporairement</a>';
												echo '<button name ="bandef" value = "'.$linemsg->getIdAuteur().'"><i class="fas fa-user-slash"></i> bannir def</button>';
											}
										echo '</div>
									</form>';
								}
								elseif ($utilisateur->getIdCompte()==$user->getIdCompte()) 
								{

									echo '<form method="POST">
											<div>
												<button name = "delete" value = "'.$linemsg->getIdMessage().'"><i class="fas fa-minus"></i> Supprimer</button>
												<button name = "modif" value="'.$linemsg->getIdMessage().'"> Modifier</button>
											</div>
										</form>';
								}
					        ?>
					    </div>
				        <hr>
				        <div = class="contentMsg">
				        	<p><?php echo $linemsg->getLibelle(); ?></p>
				        	<div class="leftBouton">
					        	<div class="bouton">
				        			<button type="button"><i class="fa fa-thumbs-up"></i> Utile</button> 
				        			<button type="button"><i class="fas fa-thumbs-down"></i> Inutile</button> 
				        		</div>
				        	</div>
				        </div>
			    	</div>
			    	<?php
				}
				?>
				<?php 
				if ($fildediscussion->getIsFilDeDiscussionClos()) 
				{
					?>
					<img src="image/resolu.png">
					<?php
				}
				else
				{
					?>
					<h2>Ajouter un commmentaire</h2>
					<form method="POST">
						<div class="postCom">
							<textarea name="message"></textarea>
							<br>
							<button>Commenter</button>
							<br>
						</div>
					</form>
				<?php
				}
				?>
				

			<?php
			}
		}
		elseif(!isset($_SESSION["idUser"]))
		{
			include("BarreDeNavNonCo.php");
			$id = $_GET["index"];
			$fildediscussion = new FilDeDiscussion();
			$fildediscussion->getIdFilDeDiscussionWithId($id);
			$createur = FilDeDiscussion::getCreateurWithId($id);
			if ($_GET["index"])
			{ 
				echo '<h1>';
				if ($fildediscussion->getIsFilDeDiscussionClos())
				{
					echo "[Résolu] ";
				} 
				echo $fildediscussion->getTitreFilDeDiscussion().'</h1>';
				$msg = fildediscussionManager::findAllMessage($id);
				echo '<p>Crée par : <a style="color: white; text-decoration: none;" href="profil.php?idProfil='.$fildediscussion->getIdCreateur().'">'.$createur->getNomCompte().'</a></p>';
				echo '<p>le : '.$fildediscussion->getDateCreation().'</p>';
				echo '<p>'.sizeof($msg)." message(s)".'</p>';
				echo '<hr>';
				echo "<br>";
				$utilisateur = new Compte();
				
				foreach ($msg as $linemsg) 
				{
			    	?>
			    	<div class="messages"><br>
			  			<div class="topMsg">
					        <img src="https://www.shareicon.net/data/2016/09/01/822739_user_512x512.png" alt="Avatar" class="avatar">
					        <div class="titreNomCompte"><a style="color: black; text-decoration: none;"<?php echo 'href="profil.php?idProfil='.$linemsg->getIdAuteur().'"'?><h4><?php $utilisateur->initCompte($linemsg->getIdAuteur()); echo ' '.$utilisateur->getNomCompte(); ?></h4></a></div><br>
					    </div>
				        <hr>
				        <div = class="contentMsg">
				        	<p><?php echo $linemsg->getLibelle(); ?></p>
				        	<div class="leftBouton">
					        	<div class="bouton">
					        		<?php //echo $linemsg->get ?>
				        			<button type="button"><i class="fa fa-thumbs-up"></i> Utile</button> 
				        			<button type="button"><i class="fas fa-thumbs-down"></i> Inutile</button> 
				        		</div>
				        	</div>
				        </div>
			    	</div>
			    	<?php
				}
				
			}
			?>
			<p class="messageCo"><a href="indexLogin.php">Inscrivez-vous </a>ou <a href="indexLogin.php">connectez-vous </a>pour commenter</p>
			<?php
		}
?>
<?php
	}
	include("footer.php");
	?>
