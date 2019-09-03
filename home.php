
<!DOCTYPE html>
<html>
<head>
	<title> News </title>
	

<style>
	div.desc {
  padding: 15px;
  text-align: center;
  font-weight: bold;
  float:none;
 }

div.img {

  width: 348px;
  height: 300px;
} 	

img{
	float:none;
	margin: 10px;
	width: 350px;
  height: 230px;
}

div .gallery
{
	height: 500px;
	width:400px;
	float:left;
}
</style>

</head>
<body>
<?php
	include 'conn.php';

		$result=mysqli_query($conn,"SELECT * FROM publish");
		$rows=mysqli_num_rows($result);
	if($rows)
	{
		$i=0;
		while ($news=mysqli_fetch_assoc($result)) {
			$userid=$news['userid'];
			$title=$news['title'];
			$image=$news['image'];
			$content=$news['content'];
			$content = substr($content,0,600).'...';
			$link=$news['link'];

			//echo' <div class="gallery">';
    	  	echo' <div class="desc"><h3>'.$title.'</h3></div>';
   			echo "<img src= data:image/jpg;base64,$image  width='4%' height='4%'>'";
 		echo' <div class="desc">'.$content.'</div>';
 			echo"<br>";
 			echo'<div class="desc"><h3><a href='.$link.'>More Details</a></h3></div>';
			echo '</div>';
		}
		}/*else{
              echo "<center>";
              echo "<font color = 'red'>";
              echo "NO POST YET !";
              echo "</font>";
              echo "</center>";
          }*/
	

?>

</body>
</html>