<?php 

	namespace apps\libs\students;
	use apps\libs\database\Database;
	class Student extends Database{
		public function addNewStudent($sname, $roll, $reg, $board ,$ins, $sphotot, $u_pic_name) {
			$sql = "INSERT INTO students_info (stu_name, stu_roll, reg, board, institute,  stu_pic) VALUES ('$sname','$roll','$reg','$board','$ins', '$u_pic_name')";
			$data = parent::conn() -> query($sql);
			move_uploaded_file($sphotot, 'assets/photos/student/'.$u_pic_name);
			if ($data) {
				# code...
				return "<p class='alert alert-success'>Information added successfully !<button class='close' data-dismiss='alert'>&times;</button></p>";
			}
		}

	}


 ?>