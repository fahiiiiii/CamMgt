<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	$firstname 		= $_POST['studentname'];
	$email 			= $_POST['email'];
    $department 	= $_POST['department'];
	$passwords		= sha1($_POST['password']);

		$sql = "INSERT INTO users (studentname, email, department,password) VALUES(?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$studentname, $email, $department, $password]);
		
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}
?>