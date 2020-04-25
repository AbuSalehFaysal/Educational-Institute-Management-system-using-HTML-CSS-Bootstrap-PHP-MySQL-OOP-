<?php 

	namespace apps\libs\database; 
	use mysqli;

	abstract class Database {
		
		//server info
		private $host = 'localhost';
		private $user = 'root';
		private $pass = '';
		private $db = 'ac';

		//connnection
		protected function conn(){
			return new mysqli($this -> host, $this -> user, $this -> pass, $this -> db );
		}

	}


 ?>