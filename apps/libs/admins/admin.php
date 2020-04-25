<?php 

	namespace apps\libs\admins; 
	use apps\libs\database\Database;

	class Admin extends Database {
		
		public function adminRegistration($name, $uname, $email, $pass) {
			$sql = "INSERT INTO user (user_name, user_uname, user_email, user_pass, user_status) VALUES ('$name','$uname','$email','$pass', 'inactive')";
			$data = parent::conn() -> query($sql);
			if ($data) {
				# code...
				return true;
			} else {
				# code...
				return false;
			}
			
		}

		public function checkUsername($uname) {
			$sql = "SELECT * FROM user WHERE user_uname='$uname'";
			$data = parent::conn() -> query($sql);
			$user_count = $data -> num_rows;
			if ($user_count > 0) {
				# code...
				return false;
			} else {
				# code...
				return true;
			}
			
		}

		public function checkEmail($email) {
			$sql = "SELECT * FROM user WHERE user_email='$email'";
			$data = parent::conn() -> query($sql);
			$email_count = $data -> num_rows;
			if ($email_count > 0) {
				# code...
				return false;
			} else {
				# code...
				return true;
			}
		}

		public function userLogin($euname, $pass) {
			$sql = "SELECT * FROM user WHERE user_uname='$euname' OR user_email='$euname' ";
			$data = parent::conn() -> query($sql);
			$single_data = $data -> fetch_assoc();
			$count = $data -> num_rows;
			if ($count == 1) {
				# code...
				if ( $pass == $single_data['user_pass'] ) {
					# code...
					$_SESSION['user_id'] = $single_data['user_id'];
					$_SESSION['user_name'] = $single_data['user_name'];
					header("location:dashboard.php");
				} else {
					# code...
					return "<p class='alert alert-danger'>Pasword is wrong!<button class='close' data-dismiss='alert'>&times;</button></p>";
				}
				
			} else {
				# code...
				
				return "<p class='alert alert-danger'>Username or Email is wrong!<button class='close' data-dismiss='alert'>&times;</button></p>";
			}
		}

		

	}


 ?>