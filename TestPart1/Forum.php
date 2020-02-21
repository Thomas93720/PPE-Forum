<?php
	include("HeaderForum.php");
	include("data/compte.php");
	include("data/message.php");
	include("datamanagers/DatabaseLinker.php");
	include("datamanagers/fildediscussionManager.php");
	

	if (!empty($_GET["index"])) 
	{
		session_start();  
		if(isset($_SESSION["idUser"]))  
		{
			include("BarreDeNavCo.php"); 
			$utilisateur = new Compte();
			$utilisateur->initCompte($_SESSION["idUser"]);
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
				?>
				<form method="POST">
					<div class="postCom">
						<textarea></textarea>
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
			<label class="messageCo"><a href="indexLogin.php">Inscrive-vous </a>ou ><a href="indexLogin.php">connectez-vous pour commenter</a></label>
			<?php
		}
?>
<?php
	}
	include("footer.php");
	?>
