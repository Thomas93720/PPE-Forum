<?php
	include("HeaderForum.php");
	include("data/compte.php");
	include("datamanagers/messageManager.php");
	include("datamanagers/DatabaseLinker.php");
	include("datamanagers/fildediscussionManager.php");
	

	if (!empty($_GET["index"])) 
	{
		session_start();  
		if(isset($_SESSION["idUser"]))  
		{
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
			if (!empty($_POST["delete"])) {
				echo 'test';
			}
			if ($_GET["index"])
			{ 
				echo '<h1>'.$fildediscussion->getTitreFilDeDiscussion().'</h1>';
				$msg = fildediscussionManager::findAllMessage($id);
				echo '<p>Crée par : '.$createur->getNomCompte().'</p>';
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
					        <div class="titreNomCompte"><h4><?php $user->initCompte($linemsg->getIdAuteur()); echo ' '.$user->getNomCompte(); ?></h4></div><br>
					        <?php
						        if ($utilisateur->getIsCompteAdmin())
						        {
									echo '
									<form method="POST">
										<div>
										<button name="delete"><i class="fas fa-minus"></i> Supprimer</button>
										<button name ="ban" ><i class="fas fa-user-times"></i> bannir temporairement</button>
										<button name ="ban" ><i class="fas fa-user-slash"></i> bannir def</button>
										</div>
									</form>';
								}
								elseif ($utilisateur->getIdCompte()==$user->getIdCompte()) 
								{
									echo '<button name="delete"><i class="fas fa-minus"></i> Supprimer</button>';
								}
					        ?>
					    </div>
				        <hr>
				        <div = class="contentMsg">
				        	<p><?php echo $linemsg->getLibelle(); ?></p>
				        	<div class="leftBouton">
					        	<div class="bouton">
				        			<button type="button"><i class="fa fa-thumbs-up"></i> Merci</button> 
				        		</div>
				        	</div>
				        </div>
			    	</div>
			    	<?php
				}
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
				echo '<h1>'.$fildediscussion->getTitreFilDeDiscussion().'</h1>';
				$msg = fildediscussionManager::findAllMessage($id);
				echo '<p>Crée par : '.$createur->getNomCompte().'</p>';
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
					        <div class="titreNomCompte"><h4><?php $utilisateur->initCompte($linemsg->getIdAuteur()); echo ' '.$utilisateur->getNomCompte(); ?></h4></div><br>
					    </div>
				        <hr>
				        <div = class="contentMsg">
				        	<p><?php echo $linemsg->getLibelle(); ?></p>
				        	<div class="leftBouton">
					        	<div class="bouton">
				        			<button type="button"><i class="fa fa-thumbs-up"></i> Merci</button> 
				        		</div>
				        	</div>
				        </div>
			    	</div>
			    	<?php
				}
				
			}
			?>
			<p class="messageCo"><a href="indexLogin.php">Inscrivez-vous </a>ou <a href="indexLogin.php">connectez-vous pour commenter</a></p>
			<?php
		}
?>
<?php
	}
	include("footer.php");
	?>
