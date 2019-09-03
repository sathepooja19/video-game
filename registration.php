<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="p1.css">
	<title>registration form</title>
</head>
<body>
	<div class="container">
		<div class="login-box">
			<div class="row">
				<div class="col-md-6">
	<center><h1>Registration Form</h1></center>
			<div class="form-group">
	<form method="POST" action="" enctype="multipart/form-data">

		<label>Username</label><br><br>
		<input type="text" name="username"placeholder="Username" class="form-control" required /><br><br>

		<label>Email</label><br><br>
		<input type="email" name="email"placeholder="Email" class="form-control" required/><br><br>
		
		<label>ProfileImage</label><br><br>
		<input type="file" name="image"><br><br>
       
        <label>Password</label><br><br>
		 <input type="password" name="password1" placeholder="Password" class="form-control" required /><br><br>
		
		<label>Confirm password</label><br><br>
		<input type="password" name="password2" placeholder="Confirm Password" class="form-control" required /><br><br>
		
		<div class="btn">
		<b><input type="submit" name="submit" value="Registration"></b></div>

	</form>
</div>
</div>
</div>
</div>
</div>



<?php
include 'conn.php';
if(isset ($_POST['submit'])){
		//declare variables who hold data from the form fields
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password1'];
		$confirompassword=$_POST['password2'];
		$datev= date('y-m-d');
		if($password==$confirompassword){// check if password are the same




		$imagepath=$_FILES['image']['tmp_name'];
		/* be sure we have all data
		 echo "username : ".$username;
		 echo "<br>";
		 echo "email : ".$email;
		 echo "<br>";
		 echo "password1 : ".$password;
		 echo "<br>";
		 echo "password2 : ".$confirompassword;
		 echo "<br>";
		 echo "date : ".$dater;
		 echo "<br>";
		 echo "image : ".$imagepath;
		 echo "<br>";
		 */
		 $password=md5($password);

		 if($imagepath){

		 	$binary =fread(fopen($imagepath, 'r'),filesize($imagepath));//see the content of the image
		 	$picture =base64_encode($binary);//convert image into base64

		 	//echo $picture;// display base64 image for checking
		 	//insert data into table
		 	$insert=mysqli_query($conn,"INSERT INTO admin(username, email, password, image, datev) VALUES ('$username','$email','$password','$picture','$datev')");
		 	if($insert){// if the query has been executed
		 		echo"good";
		 		echo "<script language='Javascript'>";
		 		echo "document.location.replace('./login.php')";
		 		echo "</script>";


		 	}
		 	else{
		 		echo ("error".mysqli_error($conn));//if the query didn't worked
		 	}

		 }
		 else{
		 	echo "choose your image profile";// if no image selected
		 }




	}
}else{
	echo "password not the same";// if password are not the same
}

?>

</body>
</html>