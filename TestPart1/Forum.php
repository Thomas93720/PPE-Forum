<?php
	include("HeaderForum.php");
	include("datamanagers/DatabaseLinker.php");
	include("datamanagers/fildediscussionManager.php");
	include("data/compte.php");
	include("data/message.php");
	if (!empty($_GET["index"])) 
	{
		session_start();  
		if(isset($_SESSION["idUser"]))  
		{
			include("BarreDeNavCo.php"); 
			$utilisateur = new Compte();
			$utilisateur->initCompte($_SESSION["idUser"]);
			$id = $_GET["index"];
			$fildediscussion = new FilDeDiscussion();
			$fildediscussion->getIdFilDeDiscussionWithId($id);
			$createur = FilDeDiscussion::getCreateurWithId($id);
			$message = new Message();
			$message->findMessageWithIdFilDeDiscussion(1);
			echo $message->getIdMessage();
			if ($_GET["index"])
			{ 
				echo '<h1>'.$fildediscussion->getTitreFilDeDiscussion().'</h1>';

				echo '<p>Crée par : '.$createur->getNomCompte().'</p>';
				echo '<hr>';
			}
			?>
		<div>
			<div class="page">
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
				?>
			  	<div class="milieu">
			  		<div class="messages"><br>
			  			<div class="topMsg">
					        <img src="https://www.shareicon.net/data/2016/09/01/822739_user_512x512.png" alt="Avatar" class="avatar">
					        <div class="titreNomCompte"><h4><?php echo ' '.$utilisateur->getNomCompte(); ?></h4></div><br>
					    </div>
				        <hr>
				        <div = class="contentMsg">
				        	<p><?php echo $message->getIdMessage(); ?></p>
				        	<div class="leftBouton">
					        	<div class="bouton">
				        			<button class="bouton" type="button"><i class="fa fa-thumbs-up"></i>  PoceBlo</button> 
				        			<button class="bouton" type="button"><i class="fa fa-comment"></i>  Commenter</button> 
				        		</div>
				        	</div>
				        </div>
			    	</div>
			  		<div class="messages"><br>
			  			<div class="topMsg">
					        <img src="https://www.shareicon.net/data/2016/09/01/822739_user_512x512.png" alt="Avatar" class="avatar">
					        <div class="titreNomCompte"><h4><?php echo ' '.$utilisateur->getNomCompte(); ?></h4></div><br>
					    </div>
				        <hr>
				        <div = class="contentMsg">
				        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				        	<div class="leftBouton">
					        	<div class="bouton">
				        			<button type="button"><i class="fa fa-thumbs-up"></i>  PoceBlo</button> 
				        			<button type="button"><i class="fa fa-comment"></i>  Commenter</button> 
				        		</div>
				        	</div>
				        </div>
			    	</div>
			  	</div>
			  	</div>
		  		<div class="droite">
		  		</div>
			</div>
		</div>
		<?php
		}
		elseif(!isset($_SESSION["idUser"]))
		{
			include("BarreDeNavNonCo.php");
			$id = $_GET["index"];
			$fildediscussion = new FilDeDiscussion();
                        $fildediscussion = fildediscussionManager::getFilDeDiscussionWithId($id);
                        $createur = fildediscussionManager::getCreateurWithId($id);
			$message = new Message();
			$message->findMessageWithIdFilDeDiscussion(1);
			echo $message->getIdMessage();
			if ($_GET["index"])
			{ 
				echo '<h1>'.$fildediscussion->getTitreFilDeDiscussion().'</h1>';

				echo '<p>Crée par : '.$createur->getNomCompte().'</p>';
				echo '<hr>';
			}
		}
	}
	?>
