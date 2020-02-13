<?php
	class DatabaseLinker
	{
		private static $URL = 'mysql:host=localhost;dbname=PPE;charset=utf8';
		private static $id = 'root';
		private static $mdp = 'root';
		private static $PDO;
		
		public static function getConnexion()
		{
			if(empty(DatabaseLinker::$PDO))
			{
				DatabaseLinker::$PDO = new PDO(DatabaseLinker::$URL, DatabaseLinker::$id, DatabaseLinker::$mdp);
			}
			return DatabaseLinker::$PDO;
		}
	}
?>