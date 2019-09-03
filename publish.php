<!DOCTYPE html>
<html>
<head>
	<title>Publish </title>
	<link rel="stylesheet" type="text/css" href="publish.css">
</head>
<body>

	<?php
	 include 'navbar.php';
    ?>
	<form method="POST" action="" enctype="multipart/form-data">
		<center><h1>Make a news</h1></center>
		<div class="from-group">
		<label>Title</label>
		<input type="text" name="title"placeholder="Title" class="form-control" required /><br><br>
		<label>Image</label>
		<input type="file" name="image"><br><br>
	    <label>Content</label>
		<textarea name="content" placeholder="Contents" class="form-control" required /></textarea><br><br>
		<label>Link</label>
		<input type="url" name="link"placeholder="Link" class="form-control" required /><br><br>
		<div class="btn">
		<input type="submit" name="submit" value="Publish"></div></b></center>
	</form>
	<?php
    require 'conn.php';
	if(isset ($_POST['submit']))
	{
		//$userid=$_POST['userid'];
		$title=addslashes($_POST['title']);
		$content=addslashes($_POST['content']);
		$link=$_POST['link'];
	    $datep= date('y-m-d');
		$imagepath=$_FILES['image']['tmp_name'];
		 if($imagepath)
		  {

		 	$binary =fread(fopen($imagepath, 'r'),filesize($imagepath));
		 	$picture =base64_encode($binary);		 	
		 	$insert=mysqli_query($conn,"INSERT INTO publish(title, image, content,link,datep) VALUES ('$title','$picture','$content','$link','$datep')");
		 	if($insert)
		 	{
		 		echo"good";
		 		echo "<script language='Javascript'>";
		 		echo "document.location.replace('./page1.php')";
		 		echo "</script>";
		 	}
		 	else
		 	{
		 		echo  $conn->error;
		 	} 
		 }
	}
?>
</body>
</html>