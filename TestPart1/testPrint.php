<?php
	include("header.php");
	include("datamanagers/DatabaseLinker.php");
	include("datamanagers/messageManager.php");
	include("datamanagers/fildediscussionManager.php");

	$msg = fildediscussionManager::p();
?>