<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration | PHP</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
	<?php
    if(isset($_POST['create'])){
        $studentname =$_POST['studentname'];
        $email       =$_POST['email'];
        $department  =$_POST['department'];
        $passwords    =$_POST['password'];

        $sql = "INSERT INTO users(studentname, email, department, password ) VALUES(?,?,?,?) ";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute($studentname, $email, $department, $password);
        if(result){
            echo "Successfully saved";

        }
        else{
            echo "There were errors in saving the data";
        }

         echo $studentname ," " , $email , $department , " " ,$password ;

    }
	?>	
</div>

<div>
	<form action="registration.php" method="post">
		<div class="container">

			<div class="row">
				<div class="col-sm-3">
					<h1>Registration</h1>
					<p>Fill up the form with correct values.</p>
					<hr class="mb-3">
					<label for="studentname"><b>Student Name</b></label>
					<input class="form-control" id="studentname" type="text" name="studentname" required>

                    <label for="email"><b>Email Address</b></label>
					<input class="form-control" id="email"  type="email" name="email" required>

					<label for="department"><b>Department</b></label>
					<input class="form-control" id="department"  type="text" name="department" required>

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
					<hr class="mb-3">
					<input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
				</div>
			</div>
		</div>
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){


			var studentname 	= $('#studentname').val();
			var email 		= $('#email').val();
            var department	= $('#department').val();
			var password 	= $('#password').val();


				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'process.php',
					data: {studentname: studentname,email: email,department: department,password: password},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': 'Successfully Registered',
								'type': 'success'
								})

					},
					error: function(data){
						Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
								})
					}
				});


			}else{

			}





		});		


	});

</script>
</body>
</html>