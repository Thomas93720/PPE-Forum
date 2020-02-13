<?php
	include("HeaderForum.php");
	include("datamanagers/DatabaseLinker.php");
	include("data/fildediscussion.php");
	include("data/compte.php");
	include("data/message.php");
	if (!empty($_GET["index"])) 
	{
		include("BarreDeNavNonCo.php");
		$id = $_GET["index"];
		$fildediscussion = new FilDeDiscussion();
		$fildediscussion->getIdFilDeDiscussionWithId($id);
		$createur = FilDeDiscussion::getCreateurWithId($id);
		if ($_GET["index"]) 
		echo '<h1>'.$fildediscussion->getTitreFilDeDiscussion().'</h1';
	?>
		<div>
			<a href="#"><div class="polaroid">
				<?php
					$DernierFilDeDiscussion = new FilDeDiscussion();
					$DernierFilDeDiscussion->getIdFilDeDiscussionWithId(1);
					echo '<h1>'.$DernierFilDeDiscussion->getTitreFilDeDiscussion().'</h1>';
				?>
			  <div class="container">
			    <p>Dernier forum</p>
			  </div>
			</div>
		</div></a>
	<?php
	}
?>