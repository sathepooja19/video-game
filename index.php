
<?php
include 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>First Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/menu.css">
		<link rel="stylesheet" href="css/w3.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/gallery.css">
		<link rel="stylesheet" href="css/pagination.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="s.css">
</head>
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

/*.mySlides
{
	float: none;
	size: cover;
	width: 99px;
	height: 400px;
}*/
</style>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
				<img src="./image/logo.jpg" class="pic" width="60%" height="50%">
			</div>
			<div class="col-sm-4">
				<p class="slogan"><i class="fa fa-gamepad" aria-hidden="true"></i> The fastest, most powerful, game console on earth.<i class="fa fa-gamepad" aria-hidden="true"></i></p>
			</div>
			<div class="col-sm-3">
				<p class="email">Email:videog@gmail.com</p>
			</div>
			<div class="col-sm-3">
			    <p class="tel">Telephone: 9921832954</p>
		    </div>
		</div>
	</div><br><br>

	<!--img src="images/m2.jpg" height="400px;" width="1299px" -->
<div class="slide">
	<div class="w3-content w3-section" style="max-width:500px">
  <img class="mySlides" src="./image/game1.jpg" >
  <img class="mySlides" src="./image/game4.jpg" height="600px;" width="1299px">
  <img class="mySlides" src="./image/game2.jpg" height="600px;" width="1299px">
  <img class="mySlides" src="./image/game5.jpg" height="600px;" width="1299px">
  <img class="mySlides" src="./image/game3.png" height="600px;" width="1299px">
  
  
</div>
</div>
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
</div>
<br>

<br>
<br>


	 <center><h1> News...</h1></center>
    <div class = "container">
     <div class="log">

<?php
	include 'conn.php';


	$select=mysqli_query($conn,"SELECT * FROM publish");
	$rows = mysqli_num_rows($select);

	if($rows){
		$i=0;

		while($news=mysqli_fetch_assoc($select))
		{
	
			$title=$news['title'];
			$image=$news['image'];
			$content=$news['content'];
			$content = substr($content,0,600).'...';
			$link=$news['link'];
			$datep=$news['datep'];
			//echo' <div class="gallery">';
    	  	echo' <div class="desc"><h3>'.$title.'</h3></div>';
   			echo "<center><img src= data:image/jpg;base64,$image  width='4%' height='4%'>'</center>";
   			
 			echo' <div class="desc">'.$content.'</div>';
 			echo '<div class="desc">Date: '.$datep.'</div>';
 			echo'<div class="desc"><h3><a href='.$link.'>More Details</a></h3></div>';
			echo '</div>';
 			echo"<br>";
 			

		}
		}else{
              echo "<center>";
              echo "<font color = 'red'>";
              echo "NO POST YET !";
              echo "</font>";
              echo "</center>";
          }
	

?>

	

</body>
</html>