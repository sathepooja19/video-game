
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="p1.css">
	<title>Login Page</title>
</head>
<body>
		<div class="container">
			<div class="login-box">
			<div class="row">
				<div class="col-md-6">

							<center><h1>Login Page</h1></center>
								<div class="form-group">
									<form method="post" action="" enctype="multipart/form-data">
										
										<label>Username : </label>
											<input type="text" name="username" placeholder="Username" class="form-control" required />
												<br>
												<br>
												<br>
										<label>Password : </label>
											<input type="password" name="password" placeholder="Password" class="form-control" required />

											<br>
											<br>

										<center><div class="btn">
											<b><input type="submit" name="submit" value="Login"></b></center>
											
										</div>
										</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>



	<?php

		//Make Connection
			include 'conn.php';

			if(isset($_POST['submit']))
			{
				// create variables to store value
				$username=$_POST['username'];
				$password=md5($_POST['password']);

				echo "username : ".$username;
				 echo "<br>";

				  echo "password : ".$password;
		 		  echo "<br>";

				$insert=mysqli_query($conn,"SELECT * FROM admin WHERE username='$username' AND password='$password'");
		 	if($insert){// if the query has been executed
		 		echo "string";
				$row=$insert->fetch_assoc();
				$userid=$row['id'];
				echo $userid; 
				//$_SESSION['userid']=$userid;
		 		echo"inserted Successfully";
		 		echo "<script language='Javascript'>";
		 		echo "document.location.replace('./index.php')";
		 		echo "</script>";

			}

			else
			{
				echo ("error".mysqli_error($conn));//if the query didn't worked
		 	}
		 	
		 }
			
			


	?>	