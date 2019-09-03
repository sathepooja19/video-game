<!DOCTYPE html>
<html>
<head>
	<title>Post Something</title>

	<style>
	 .login
	{
		background: rgba(211,211,211,0.5);
		padding: 30px;
	}


	.login-box
	{
		max-width: 50px;
		float: none;
		margin: 150px auto;
		box-shadow: 0px 0px 

	}
	form,.content{
	width: 50%;
	margin: 0px auto;
	padding: 20px;
	border-width: 200px;	
	border-radius: 10px;
	border:1px solid black;
	}
.input-group{
	margin: 10px 0px 10px 0px;

}
label{
	display: white;
	text-align: left;
	margin: 3px;
}
input{
	height: 30px;
	width: 20%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border:3px solid black;
	
	}

	.btn
{
  background-color: black;  

  padding: 14px 14px;
  text-align: center;
  text-decoration: none;
  
  width:250px;

}
 


	</style>
</head>
<body>
	<?php
	include 'navbar.php';
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	    $sql=mysqli_query($conn,"SELECT * FROM postinfo WHERE id='$id'");
	    $num_rows=mysqli_num_rows($sql);
	    if ($num_rows>0) {
	    	while ($row=$sql->fetch_assoc()) {
	    		$id=$row['id'];
	    		$title=$row['title'];
	    		$image=$row['image'];
	    		$content=$row['content'];
			}
	    }
	}

	?>
		<div class="from-group">
	
	<form method="POST" action="" enctype="multipart/form-data">
		<center><h1>Edit post</h1></center>
		<label>title</label>
		<input type="text" name="title" value="<?php echo $title ?>"><br><br>
		<?php echo "<img src= data:image/jpg;base64,$image width='5%' height='5%'>";?>
		<label>Image</label>
		<input type="file" name="image"><br><br>
        <label>Contents</label>
		<textarea name="content" ><?php echo $content ?></textarea><br><br>
		<input type="submit" name="submit" value="Edit">

	</form>

	<?php
	include'conn.php';

	if(isset ($_POST['submit'])){
		$title=$_POST['title'];
		$content=$_POST['content'];
	    $datep= date('y-m-d');
		
		$imagepath=$_FILES['image']['tmp_name'];
		 echo "title : ".$title;
		 echo "<br>";
		 echo "content : ".$content;
		 echo "<br>";
		 echo "datep : ".$datep;
		 echo "<br>";
		 echo "image : ".$imagepath;
		 echo "<br>";
		 
		 if($imagepath){

		 	$binary =fread(fopen($imagepath, 'r'),filesize($imagepath));
		 	$picture =base64_encode($binary);

		 	echo $picture;
		 	
		 	$update=mysqli_query($conn,"UPDATE publish SET title='$title',image='$picture',content='$content',datep='$datep' WHERE id='$id'");
		 	if($update){
		 		echo"good";
		 		echo "<script language='Javascript'>";
		 		echo "document.location.replace('./page.php')";
		 		echo "</script>";


		 	}
		 	else{
		 		echo ("error".mysqli_error($conn));
		 	}

		 }
		 else{
		 	$update=mysqli_query($conn,"UPDATE publish SET title='$title',content='$content',datep='$datep' WHERE id='$id'");
		 	if($update){
		 		echo"good";
		 		echo "<script language='Javascript'>";
		 		echo "document.location.replace('./page.php')";
		 		echo "</script>";


		 	}
		 	else{
		 		echo ("error".mysqli_error($conn));
		 	}
		 	}

			}
?>


</body>
</html>
