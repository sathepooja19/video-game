<html>
	<head>
		<title>pid</title>
		<style>
			input[type="text"]{
				margin-left: 10%;
			}
			input[type="submit"]{
				margin-left: 10%;
				background-color:lime;
			}
		</style>
	</head>
	<body>
		<form action="" method="POST" enctype="" style="width:30%;height:40%;background-image:linear-gradient(pink,white);margin-left:30%;margin-top:10%;"><br>
			<label style="margin-left:10%;"> News id:</label><br><br>
			<input type="text" name="pid"><br><br>
			<input type="submit" name="submit" value="submit">
		</form>
		<?php

			if(isset($_POST['submit']))
			{
				$pid=$_POST['pid'];
				session_start();
				$_SESSION['newid']=$pid;
				echo "<script>";
				echo "document.location.replace('./new.php')";
				echo "</script>";
			}
		?>
	</body>
</html>